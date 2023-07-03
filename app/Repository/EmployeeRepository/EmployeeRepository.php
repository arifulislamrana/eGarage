<?php
namespace App\Repository\EmployeeRepository;

use App\Models\Employee;
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
}
