<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Utility\ILogger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\EmployeeRepository\IEmployeeRepository;

class EmployeeController extends Controller
{
    public $logger;
    public $employeeRepo;

    public function __construct(ILogger $logger, IEmployeeRepository $employeeRepository)
    {
        $this->logger = $logger;
        $this->employeeRepo = $employeeRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try
        {
            $employees = $this->employeeRepo->getPagiantedEmployees($request->search);

            return view('admin_dashboard.employee_list', compact('employees'));
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show employee list", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show employee list']);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try
        {
            return view('admin_dashboard.create_employee');
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show create_employee form", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show create_employee form']);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try
        {
            $this->employeeRepo->destroy($id);

            return redirect()->route('employees.index')->with(['message' => 'Employee deleted']);
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to delete Employee", "error", $e);

            return redirect()->back()->with(['message' => 'Employee can not be deleted']);
        }
    }
}
