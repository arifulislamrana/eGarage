<?php

namespace App\Http\Controllers\Front;

use Exception;
use App\Utility\ILogger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

    public function index()
    {
        try
        {
            $services = $this->serviceRepository->getAll();

            return view('booking', compact('services'));
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show create_booking form", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show create_booking form']);
        }
    }
}
