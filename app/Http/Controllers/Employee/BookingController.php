<?php

namespace App\Http\Controllers\Employee;

use Exception;
use App\Utility\ILogger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\BookingRepository\IBookingRepository;
use App\Repository\EmployeeRepository\IEmployeeRepository;

class BookingController extends Controller
{
    public $logger;
    public $bookingRepository;

    public function __construct(ILogger $logger, IBookingRepository $bookingRepository)
    {
        $this->logger = $logger;
        $this->bookingRepository = $bookingRepository;
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
}
