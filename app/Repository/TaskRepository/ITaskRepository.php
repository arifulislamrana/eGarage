<?php
namespace App\Repository\TaskRepository;

use App\Repository\BaseRepository\IBaseRepository;

interface ITaskRepository extends IBaseRepository
{
    public function approvedTasks($search);

    public function doneTasks($search);

    public function undoneTasks($search);

    public function approvedTasksCount();

    public function doneTasksCount();

    public function undoneTasksCount();

    public function getDoneTaskWithoutPagination();

    public function approvedTasksOfUser($search);

    public function doneTasksOfUser($search);

    public function getAssignedTaskOfEmployee($search);
}
