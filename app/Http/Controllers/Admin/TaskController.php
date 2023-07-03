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
            $undoneTasks = $this->taskRepository->undoneTasks($request->search);

            $approvedTasksFees = array();

            foreach ($approvedTasks as $task)
            {
                $fee = 0;

                foreach ($task->services as $service)
                {
                    $fee = $fee + $service->fee;
                }

                $approvedTasksFees[$task->id] = $fee;

                $fee = 0;
            }

            return view('admin_dashboard.task_list', compact(['approvedTasks', 'doneTasks', 'undoneTasks', 'approvedTasksFees']));
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show task list", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show task list']);
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update($id)
    {
        //
    }

    public function destroy(string $id)
    {
        try
        {
            $this->taskRepository->destroy($id);

            return redirect()->route('tasks.index')->with(['message' => 'Task deleted']);
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to delete Task", "error", $e);

            return redirect()->back()->with(['message' => 'Product can not be Task']);
        }
    }
}
