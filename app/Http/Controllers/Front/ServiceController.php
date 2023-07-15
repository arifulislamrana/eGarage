<?php

namespace App\Http\Controllers\Front;

use Exception;
use App\Utility\ILogger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\ServiceRepository\IServiceRepository;
use App\Repository\EmployeeRepository\IEmployeeRepository;

class ServiceController extends Controller
{
    public $logger;
    public $serviceRepository;
    public $employeeRepository;

    public function __construct(ILogger $logger, IServiceRepository $serviceRepository, IEmployeeRepository $employeeRepository)
    {
        $this->logger = $logger;
        $this->serviceRepository = $serviceRepository;
        $this->employeeRepository = $employeeRepository;
    }

    public function index()
    {
        try
        {
            $services = $this->serviceRepository->getBestFourServices();
            $allServices = $this->serviceRepository->getAll();
            $i = 0.1;
            $j = 0;

            return view('service', compact('allServices','services', 'j'));
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show service", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show data']);
        }
    }
}
