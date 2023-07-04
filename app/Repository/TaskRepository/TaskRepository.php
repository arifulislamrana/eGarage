<?php
namespace App\Repository\TaskRepository;

use App\Models\Task;
use App\Repository\BaseRepository\BaseRepository;
use App\Repository\TaskRepository\ITaskRepository;
use Illuminate\Support\Facades\Auth;

class TaskRepository extends BaseRepository implements ITaskRepository
{

    public function __construct(Task $model)
    {
        parent::__construct($model);
    }

    public function approvedTasks($search)
    {
        if ($search != null)
        {
            return $this->model->join('employees', 'tasks.employee_id', '=', 'employees.id')->where('employees.name','LIKE','%'.$search.'%')->select('tasks.*')->paginate(10);
        }

        return $this->model->where('status', 'approved')->paginate(10);
    }

    public function doneTasks($search)
    {
        if ($search != null)
        {
            return $this->model->join('employees', 'tasks.employee_id', '=', 'employees.id')->where('employees.name','LIKE','%'.$search.'%')->select('tasks.*')->paginate(10);
        }

        return $this->model->where('status', 'done')->paginate(10);
    }

    public function undoneTasks($search)
    {
        if ($search != null)
        {
            return $this->model->join('employees', 'tasks.employee_id', '=', 'employees.id')->where('employees.name','LIKE','%'.$search.'%')->select('tasks.*')->paginate(10);
        }

        return $this->model->where('status', 'undone')->paginate(10);
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
            return $this->model->join('employees', 'tasks.employee_id', '=', 'employees.id')->where('user_id', Auth::id())->where('employees.name','LIKE','%'.$search.'%')->select('tasks.*')->paginate(10);
        }

        return $this->model->where('user_id', Auth::id())->where('status', 'approved')->paginate(10);
    }

    public function doneTasksOfUser($search)
    {
        if ($search != null)
        {
            return $this->model->join('employees', 'tasks.employee_id', '=', 'employees.id')->where('user_id', Auth::id())->where('employees.name','LIKE','%'.$search.'%')->select('tasks.*')->paginate(10);
        }

        return $this->model->where('user_id', Auth::id())->where('status', 'done')->paginate(10);
    }
}
