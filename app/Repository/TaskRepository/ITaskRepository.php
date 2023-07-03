<?php
namespace App\Repository\TaskRepository;

use App\Repository\BaseRepository\IBaseRepository;

interface ITaskRepository extends IBaseRepository
{
    public function approvedTasks($search);

    public function doneTasks($search);

    public function undoneTasks($search);
}
