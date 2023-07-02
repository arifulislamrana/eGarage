<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Utility\ILogger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\BookingRepository\IBookingRepository;

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

            return view('admin_dashboard.booking_list', compact(['bookings', 'fees']));
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

            return view('admin_dashboard.show_booking', [
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

    public function destroy(string $id)
    {
        try
        {
            $booking = $this->bookingRepository->find($id);
            $booking->services()->detach();

            $this->bookingRepository->destroy($id);

            return redirect()->route('admin.booking')->with(['message' => 'Booking deleted']);
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to delete Booking", "error", $e);

            return redirect()->back()->with(['message' => 'Booking can not be deleted']);
        }
    }
}
