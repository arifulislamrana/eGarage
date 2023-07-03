<?php
namespace App\Repository\TaskRepository;

use App\Repository\BaseRepository\IBaseRepository;

interface ITaskRepository extends IBaseRepository
{
    public function approvedTasks();

    public function doneTasks();
}
