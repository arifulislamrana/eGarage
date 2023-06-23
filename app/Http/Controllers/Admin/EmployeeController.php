<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Utility\ILogger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateEmployee;
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
    public function store(CreateEmployee $request)
    {
        try
        {
            if ($request->password != $request->cpassword)
            {
                return redirect()->back()->withErrors(['invalid' => 'PassWord and Confirm PassWord Should Be Same']);
            }

            if ($this->employeeRepo->getEmployeeByEmail($request->email) != null)
            {
                return redirect()->back()->withErrors(['invalid' => 'This email already been used']);
            }

            $temp = explode('@', $request->email)[0];
            $imageName = $temp.time().rand(99, 100000000).'.'.$request->file('image')->extension();
            $imagePath = "\\".str_replace('/', "\\",config('app.employeeImagePath'))."\\".$imageName;

            $this->employeeRepo->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'image' => $imagePath,
                'phone' => $request->phone,
            ]);

            $request->file('image')->move(public_path(config('app.employeeImagePath')), $imageName);

            return redirect()->route('employees.index')->with(['message' => 'Employee data stored successfully']);
        }
        catch (Exception $e)
        {
            $this->logger->write("error", "Failed to Strore Employee Data", $e);

            return redirect()->back()->withErrors(['invalid' => 'data could not be saved. Please try again']);
        }
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
