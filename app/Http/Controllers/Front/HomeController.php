<?php

namespace App\Http\Controllers\Front;

use Exception;
use App\Utility\ILogger;
use App\Http\Controllers\Controller;
use App\Repository\EmployeeRepository\IEmployeeRepository;
use App\Repository\ServiceRepository\IServiceRepository;

class HomeController extends Controller
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
            $employees = $this->employeeRepository->getBestFourEmployee();
            $allServices = $this->serviceRepository->getAll();
            $i = 0.1;
            $j = 0;

            return view('welcome', compact('allServices','services', 'employees', 'i', 'j'));
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show home", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show data']);
        }
    }
}
