<?php
namespace App\Repository\EmployeeRepository;

use App\Repository\BaseRepository\IBaseRepository;

interface IEmployeeRepository extends IBaseRepository
{
    public function getPagiantedEmployees($search);
    public function getEmployeeByEmail($email);
}
