<?php

namespace App\Http\Controllers\Employee;

use Exception;
use App\Utility\ILogger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repository\TaskRepository\ITaskRepository;
use App\Repository\BookingRepository\IBookingRepository;
use App\Repository\EmployeeRepository\IEmployeeRepository;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public $logger;
    public $bookingRepository;
    public $taskRepository;

    public function __construct(ILogger $logger, IBookingRepository $bookingRepository, ITaskRepository $taskRepository)
    {
        $this->logger = $logger;
        $this->bookingRepository = $bookingRepository;
        $this->taskRepository = $taskRepository;
    }

    public function booking(Request $request)
    {
       try
        {
            $bookings = $this->bookingRepository->getPagiantedBookings($request->search);
            $fees = array();

            foreach ($bookings as $booking)
            {
                $fee = 0;

                foreach ($booking->services as $service)
                {
                    $fee = $fee + $service->fee;
                }

                $fees[$booking->id] = $fee;

                $fee = 0;
            }

            return view('employee_dashboard.booking_list', compact(['bookings', 'fees']));
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show bookings", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show bookings']);
        }
    }

    public function show($id)
    {
        try
        {
            $booking = $this->bookingRepository->find($id);
            $services = $booking->services;
            $totalFee = 0;

            foreach ($services as $service)
            {
                $totalFee = $totalFee + $service->fee;
            }

            return view('employee_dashboard.show_booking', [
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

    public function approve(string $id)
    {
        try
        {
            $booking = $this->bookingRepository->find($id);
            $services = $booking->services;

            DB::beginTransaction();
            $task = $this->taskRepository->create([
                        'user_id' => $booking->user->id,
                        'employee_id' => Auth::guard('employee')->id(),
                        'status' => 'approved',
                        'service_time' => $booking->arrival_time,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);

            $task->services()->attach($services);
            $this->bookingRepository->destroy($id);
            DB::commit();

            return redirect()->route('employee.booking')->with(['message' => 'Booking approved']);
        }
        catch (Exception $e)
        {
            $this->logger->write("Booking can not be approved from employee site", "error", $e);

            return redirect()->back()->with(['message' => 'Booking can not be approved']);
        }
    }
}
