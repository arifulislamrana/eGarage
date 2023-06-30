<?php

namespace App\Http\Controllers\User;

use Exception;
use App\Utility\ILogger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBooking;
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
            $services = $this->serviceRepository->findServices($request->services);
            $booking = $this->bookingRepository->storeBookingDataAndMakeRelationWithServices($request, $services);

            return redirect()->route('user.profile')->with(['message' => 'booking data stored successfully']);
        }
        catch (Exception $e)
        {
            $this->logger->write("error", "Failed to Strore booking Data", $e);

            return redirect()->back()->withErrors(['invalid' => 'data could not be saved. Please try again']);
        }
    }
}
