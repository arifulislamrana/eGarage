<?php

namespace App\Http\Controllers\Employee;

use Exception;
use App\Utility\ILogger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\EmployeeRepository\IEmployeeRepository;
use Illuminate\Support\Facades\Auth;

class EmployeeProfileController extends Controller
{
    public $logger;
    public $employeeRepo;

    public function __construct(ILogger $logger, IEmployeeRepository $employeeRepository)
    {
        $this->logger = $logger;
        $this->employeeRepo = $employeeRepository;
    }

    public function show()
    {
       try
        {
            $employee = $this->employeeRepo->find(Auth::guard('employee')->id());

            if (empty($employee))
            {
                return redirect()->back()->withErrors(['invalid' => 'Employee does not exist']);
            }

            return view('employee_dashboard.profile', compact('employee'));
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show employee profile", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show employee profile']);
        }
    }
}
