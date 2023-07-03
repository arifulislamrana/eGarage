<?php
namespace App\Repository\TaskRepository;

use App\Models\Task;
use App\Repository\BaseRepository\BaseRepository;
use App\Repository\TaskRepository\ITaskRepository;

class TaskRepository extends BaseRepository implements ITaskRepository
{

    public function __construct(Task $model)
    {
        parent::__construct($model);
    }

    public function approvedTasks()
    {
        return $this->model->where('status', 'approved');
    }

    public function doneTasks()
    {
        return $this->model->where('status', 'done');
    }
}
