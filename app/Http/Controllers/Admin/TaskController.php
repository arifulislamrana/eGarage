<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Utility\ILogger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\EmployeeRepository\IEmployeeRepository;
use App\Repository\TaskRepository\ITaskRepository;

class TaskController extends Controller
{
    public $logger;
    public $taskRepository;
    public $employeeRepository;

    public function __construct(ILogger $logger, ITaskRepository $taskRepository, IEmployeeRepository $employeeRepository)
    {
        $this->logger = $logger;
        $this->taskRepository = $taskRepository;
        $this->employeeRepository = $employeeRepository;
    }

    public function index(Request $request)
    {
        try
        {
            $approvedTasks = $this->taskRepository->approvedTasks($request->search);
            $doneTasks = $this->taskRepository->doneTasks($request->search);
            $undoneTasks = $this->taskRepository->undoneTasks($request->search);

            return view('admin_dashboard.task_list', compact(['approvedTasks', 'doneTasks', 'undoneTasks']));
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show task list", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show task list']);
        }
    }

    public function show($id)
    {
        try
        {
            $task = $this->taskRepository->find($id);

            if (empty($task))
            {
                return redirect()->back()->withErrors(['invalid' => 'Task does not exist']);
            }

            $totalFee = 0;

            foreach ($task->services as $service)
            {
                $totalFee = $totalFee + $service->fee;
            }

            return view('admin_dashboard.show_task', compact('task', 'totalFee'));
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show task data", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show task data']);
        }
    }

    public function edit($id)
    {
        try
        {
            $task = $this->taskRepository->find($id);
            $employees = $this->employeeRepository->getAll();

            return view('admin_dashboard.update_task', compact('task', 'employees'));
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show update_task form", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show update_task form']);
        }
    }

    public function update(Request $request, $id)
    {
        try
        {
            $this->taskRepository->update($id, [
                'employee_id' => $request->employee_id,
                'service_time' => $request->service_time,
                'updated_at' => now(),
            ]);

            return redirect()->route('tasks.index')->with(['message' => 'Task data updated successfully']);
        }
        catch (Exception $e)
        {
            $this->logger->write("error", "Failed to update Task Data", $e);

            return redirect()->back()->withErrors(['invalid' => 'data could not be updated. Please try again']);
        }
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

            return redirect()->back()->with(['message' => 'Product can not be deleted']);
        }
    }
}
