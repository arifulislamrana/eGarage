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
            //dd( $this->model->where('name','LIKE','%'.$search.'%')->get());
            $employees = $this->model->where('name','LIKE','%'.$search.'%')->paginate(10);

            return $employees;
        }
        return $this->model->paginate(15);
    }
}
