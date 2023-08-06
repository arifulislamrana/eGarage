<?php
namespace App\Repository\TaskRepository;

use App\Models\Task;
use App\Repository\BaseRepository\BaseRepository;
use App\Repository\TaskRepository\ITaskRepository;
use Illuminate\Support\Facades\Auth;

class TaskRepository extends BaseRepository implements ITaskRepository
{
    public $paginate = 5;

    public function __construct(Task $model)
    {
        parent::__construct($model);
    }

    public function approvedTasks($search)
    {
        if ($search != null)
        {
            return $this->model->join('employees', 'tasks.employee_id', '=', 'employees.id')->where('employees.name','LIKE','%'.$search.'%')->select('tasks.*')->paginate($this->paginate);
        }

        return $this->model->where('status', 'approved')->paginate($this->paginate);
    }

    public function doneTasks($search)
    {
        if ($search != null)
        {
            return $this->model->join('employees', 'tasks.employee_id', '=', 'employees.id')->where('employees.name','LIKE','%'.$search.'%')->select('tasks.*')->paginate($this->paginate);
        }

        return $this->model->where('status', 'done')->paginate($this->paginate);
    }

    public function undoneTasks($search)
    {
        if ($search != null)
        {
            return $this->model->join('employees', 'tasks.employee_id', '=', 'employees.id')->where('employees.name','LIKE','%'.$search.'%')->select('tasks.*')->paginate($this->paginate);
        }

        return $this->model->where('status', 'undone')->paginate($this->paginate);
    }

    public function approvedTasksCount()
    {
        return $this->model->where('status', 'approved')->count();
    }

    public function doneTasksCount()
    {
        return $this->model->where('status', 'done')->count();
    }

    public function undoneTasksCount()
    {
        return $this->model->where('status', 'undone')->count();
    }

    public function getDoneTaskWithoutPagination()
    {
        return $this->model->where('status', 'done')->get();
    }

    public function approvedTasksOfUser($search)
    {
        if ($search != null)
        {
            return $this->model->join('employees', 'tasks.employee_id', '=', 'employees.id')->where('user_id', Auth::id())->where('employees.name','LIKE','%'.$search.'%')->select('tasks.*')->paginate($this->paginate);
        }

        return $this->model->where('user_id', Auth::id())->where('status', 'approved')->paginate($this->paginate);
    }

    public function doneTasksOfUser($search)
    {
        if ($search != null)
        {
            return $this->model->join('employees', 'tasks.employee_id', '=', 'employees.id')->where('tasks.user_id', Auth::id())->where('employees.name','LIKE','%'.$search.'%')->select('tasks.*')->paginate($this->paginate);
        }

        return $this->model->where('user_id', Auth::id())->where('status', 'done')->paginate($this->paginate);
    }

    public function getAssignedTaskOfEmployee($search)
    {
        if ($search != null)
        {
            return $this->model->join('users', 'tasks.user_id', '=', 'users.id')->where('users.name','LIKE','%'.$search.'%')->select('tasks.*')->paginate($this->paginate);
        }

        return $this->model->where('employee_id', Auth::guard('employee')->id())->where('status', 'approved')->paginate($this->paginate);
    }
}
