<?php

namespace App\Http\Controllers\User;

use Exception;
use Carbon\Carbon;
use App\Models\Booking;
use App\Utility\ILogger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBooking;
use App\Http\Requests\UpdateBooking;
use Illuminate\Support\Facades\Auth;
use App\Repository\TaskRepository\ITaskRepository;
use App\Repository\BookingRepository\IBookingRepository;
use App\Repository\ServiceRepository\IServiceRepository;

class BookingController extends Controller
{
    public $logger;
    public $serviceRepository;
    public $bookingRepository;
    public $taskRepository;

    public function __construct(ILogger $logger, IServiceRepository $serviceRepository,
                            IBookingRepository $bookingRepository, ITaskRepository $taskRepository)
    {
        $this->logger = $logger;
        $this->serviceRepository = $serviceRepository;
        $this->taskRepository = $taskRepository;
        $this->bookingRepository = $bookingRepository;
    }

    public function create()
    {
        try
        {
            $services = $this->serviceRepository->getAll();

            return view('user_dashboard.create_booking', compact('services'));
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show create_booking form", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show create_booking form']);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateBooking $request)
    {
        try
        {
            $dateToCompare = Carbon::parse($request->delivery_date);

            if (!$dateToCompare->greaterThan(Carbon::now()))
            {
                return redirect()->back()->withErrors(['invalid' => 'Selected date and time invalid']);
            }

            if ($this->bookingRepository->doesBookingExist())
            {
                return redirect()->back()->withErrors(['invalid' => 'You already have a booking. To create new booking, delete previous one either update previous one.']);
            }

            $services = $this->serviceRepository->findServices($request->services);
            $booking = $this->bookingRepository->storeBookingDataAndMakeRelationWithServices($request, $services);

            return redirect()->route('user.booking')->with(['message' => 'booking data stored successfully']);
        }
        catch (Exception $e)
        {
            $this->logger->write("error", "Failed to Strore booking Data", $e);

            return redirect()->back()->withErrors(['invalid' => 'data could not be saved. Please try again']);
        }
    }

    public function myBooking()
    {
        try
        {
            $booking = $this->bookingRepository->getBooking();
            $services = $booking->services;
            $totalFee = 0;

            foreach ($services as $service)
            {
                $totalFee = $totalFee + $service->fee;
            }

            return view('user_dashboard.my_booking', [
                'booking' => $booking,
                'services' => $services,
                'totalFee' => $totalFee,
            ]);
        }
        catch (Exception $e)
        {
            $this->logger->write("error", "Failed to show booking Data", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show booking Data. create a booking first']);
        }
    }

    public function edit($id)
    {
        try
        {
            if(empty($this->bookingRepository->getBooking()))
            {
                return redirect()->back();
            }

            $booking = $this->bookingRepository->find($id);
            $services = $this->serviceRepository->getAll();
            $selectedServices = $booking->services;

            return view('user_dashboard.edit_booking', compact(['booking', 'services', 'selectedServices']));
        }
        catch (Exception $e)
        {
            $this->logger->write("error", "Failed to show edit booking form", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show edit booking form']);
        }
    }

    public function update(UpdateBooking $request, $id)
    {
        try
        {
            $services = $this->serviceRepository->findServices($request->services);
            $booking = $this->bookingRepository->updateBookingDataAndMakeRelationWithServices($request, $id, $services);

            return redirect()->route('user.booking')->with(['message' => 'booking data updated successfully']);
        }
        catch (Exception $e)
        {
            $this->logger->write("error", "Failed to update booking data", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to update booking data']);
        }
    }

    public function destroy(string $id)
    {
        try
        {
            $this->bookingRepository->destroy($id);

            return redirect()->route('booking.create')->with(['message' => 'booking deleted. Create new booking']);
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to delete booking", "error", $e);

            return redirect()->back()->with(['message' => 'booking can not be deleted']);
        }
    }

    public function approvedBooking(Request $request)
    {
        try
        {
            $approvedBookings =  $this->taskRepository->approvedTasksOfUser($request->search);

            $approvedBookingsFees = array();

            foreach ($approvedBookings as $task)
            {
                $fee = 0;

                foreach ($task->services as $service)
                {
                    $fee = $fee + $service->fee;
                }

                $approvedBookingsFees[$task->id] = $fee;

                $fee = 0;
            }

            return view('user_dashboard.approved_booking', compact('approvedBookings', 'approvedBookingsFees'));
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to approved booking", "error", $e);

            return redirect()->back()->with(['message' => 'Failed to approved booking']);
        }
    }

    public function doneBooking(Request $request)
    {
        try
        {
            $doneServices =  $this->taskRepository->doneTasksOfUser($request->search);

            $doneServicesFees = array();

            foreach ($doneServices as $task)
            {
                $fee = 0;

                foreach ($task->services as $service)
                {
                    $fee = $fee + $service->fee;
                }

                $doneServicesFees[$task->id] = $fee;

                $fee = 0;
            }

            return view('user_dashboard.done_service', compact('doneServices', 'doneServicesFees'));
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to done services of user", "error", $e);

            return redirect()->back()->with(['message' => 'Failed to show done services']);
        }
    }

    public function show($id)
    {
        try
        {
            $task = $this->taskRepository->find($id);

            if (empty($task))
            {
                return redirect()->back()->withErrors(['invalid' => 'Servicing data does not exist']);
            }

            $totalFee = 0;

            foreach ($task->services as $service)
            {
                $totalFee = $totalFee + $service->fee;
            }

            return view('user_dashboard.show_service', compact('task', 'totalFee'));
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show servicing data", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show servicing data']);
        }
    }
}
