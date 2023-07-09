<?php

namespace App\Http\Controllers\Employee;

use App\Utility\ILogger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repository\EmployeeRepository\IEmployeeRepository;

class DashboardController extends Controller
{
    public $logger;
    public $employeeRepo;

    public function __construct(ILogger $logger, IEmployeeRepository $employeeRepository)
    {
        $this->logger = $logger;
        $this->employeeRepo = $employeeRepository;
    }

    public function dashboard()
    {
        $employee = $this->employeeRepo->find(Auth::guard('employee')->id());

        $currentDateTime = now();
        $previousDateTime = $employee->joining_date;
        $diff = $currentDateTime->diff($previousDateTime);

        return view('employee_dashboard.employee_dashboard', compact('diff'));
    }
}
