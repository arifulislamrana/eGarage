<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Utility\ILogger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\TaskRepository\ITaskRepository;

class TaskController extends Controller
{
    public $logger;
    public $taskRepository;

    public function __construct(ILogger $logger, ITaskRepository $taskRepository)
    {
        $this->logger = $logger;
        $this->taskRepository = $taskRepository;
    }

    public function index(Request $request)
    {
        try
        {
            $approvedTasks = $this->taskRepository->approvedTasks($request->search);
            $doneTasks = $this->taskRepository->doneTasks($request->search);

            return view('admin_dashboard.task_list');
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show task list", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show task list']);
        }
    }
}
