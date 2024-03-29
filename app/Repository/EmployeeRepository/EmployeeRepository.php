<?php
namespace App\Repository\EmployeeRepository;

use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use App\Repository\BaseRepository\BaseRepository;
use App\Repository\EmployeeRepository\IEmployeeRepository;

class EmployeeRepository extends BaseRepository implements IEmployeeRepository {

    public function __construct(Employee $model)
    {
        parent::__construct($model);
    }

    public function getPagiantedEmployees($search)
    {
        if ($search != null)
        {
            $employees = $this->model->where('name','LIKE','%'.$search.'%')->paginate(10);

            return $employees;
        }
        return $this->model->orderBy('id', 'desc')->paginate(10);
    }

    public function getEmployeeByEmail($email)
    {
        return $this->model->where('email', $email)->first();
    }

    public function getTaskAssignee()
    {
        return $this->model->where('designation', 'Senior Engineer')->orWhere('designation', 'Junior Engineer')->orWhere('designation', 'Junior Mechanic')->orWhere('designation', 'Senior Mechanic')->orWhere('designation', 'Trainee')->get();
    }

    public function getBestEmployee()
    {
        $employeeWithMostTasks = $this->model
                                    ->join('tasks', 'employees.id', '=', 'tasks.employee_id')
                                    ->select('employees.id', 'employees.name', DB::raw('COUNT(tasks.id) as task_count'))
                                    ->groupBy('employees.id', 'employees.name')
                                    ->orderByDesc('task_count')
                                    ->first();

        return $employeeWithMostTasks;
    }

    public function getBestFourEmployee()
    {
        $bestFourEmployee = $this->model
                                    ->join('tasks', 'employees.id', '=', 'tasks.employee_id')
                                    ->select('employees.id', 'employees.name', 'employees.designation', 'employees.image' , DB::raw('COUNT(tasks.id) as task_count'))
                                    ->groupBy('employees.id', 'employees.name', 'employees.designation', 'employees.image')
                                    ->orderByDesc('task_count')
                                    ->take(4)
                                    ->get();

        return $bestFourEmployee;
    }
}
