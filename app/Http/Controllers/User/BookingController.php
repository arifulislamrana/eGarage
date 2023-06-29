<?php

namespace App\Http\Controllers\User;

use Exception;
use App\Utility\ILogger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBooking;
use App\Repository\ServiceRepository\IServiceRepository;

class BookingController extends Controller
{
    public $logger;
    public $serviceRepository;

    public function __construct(ILogger $logger, IServiceRepository $serviceRepository)
    {
        $this->logger = $logger;
        $this->serviceRepository = $serviceRepository;
    }

    public function create()
    {
        try
        {
            $services = $this->serviceRepository->getAll();
dd($services);
            return view('user_dashboard.create_booking', compact('services'));
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show create_product form", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show create_product form']);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateBooking $request)
    {
        try
        {
            return redirect()->route('products.index')->with(['message' => 'product data stored successfully']);
        }
        catch (Exception $e)
        {
            $this->logger->write("error", "Failed to Strore product Data", $e);

            return redirect()->back()->withErrors(['invalid' => 'data could not be saved. Please try again']);
        }
    }
}
