<?php

namespace App\Http\Controllers\User;

use Exception;
use App\Utility\ILogger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\BookingRepository\IBookingRepository;

class DashboardController extends Controller
{
    public $logger;
    public $bookingRepository;

    public function __construct(ILogger $logger, IBookingRepository $bookingRepository)
    {
        $this->logger = $logger;
        $this->bookingRepository = $bookingRepository;
    }

    public function dashboard()
    {
        try
        {
            $targetDate = $this->bookingRepository->getBooking()->arrival_time;
            
            return view('user_dashboard.user_dashboard', compact('targetDate'));
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show user dashboard", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show user dashboard']);
        }
    }
}
