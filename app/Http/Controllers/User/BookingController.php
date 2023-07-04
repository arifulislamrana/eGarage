<?php

namespace App\Http\Controllers\User;

use Exception;
use App\Utility\ILogger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBooking;
use App\Http\Requests\UpdateBooking;
use App\Models\Booking;
use App\Repository\BookingRepository\IBookingRepository;
use App\Repository\ServiceRepository\IServiceRepository;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public $logger;
    public $serviceRepository;
    public $bookingRepository;

    public function __construct(ILogger $logger, IServiceRepository $serviceRepository, IBookingRepository $bookingRepository)
    {
        $this->logger = $logger;
        $this->serviceRepository = $serviceRepository;
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
            $this->logger->write("Failed to delete Task", "error", $e);

            return redirect()->back()->with(['message' => 'Product can not be Task']);
        }
    }
}
