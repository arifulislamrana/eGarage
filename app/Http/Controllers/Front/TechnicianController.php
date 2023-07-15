<?php

namespace App\Http\Controllers\Front;

use Exception;
use App\Utility\ILogger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\EmployeeRepository\IEmployeeRepository;

class TechnicianController extends Controller
{
    public $logger;
    public $serviceRepository;
    public $employeeRepository;

    public function __construct(ILogger $logger, IEmployeeRepository $employeeRepository)
    {
        $this->logger = $logger;
        $this->employeeRepository = $employeeRepository;
    }

    public function index()
    {
        try
        {
            $employees = $this->employeeRepository->getBestFourEmployee();
            $i = 0.1;

            return view('technician', compact('employees', 'i'));
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show technician", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show data']);
        }
    }
}
