<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Utility\ILogger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\BookingRepository\IBookingRepository;
use App\Repository\EmployeeRepository\IEmployeeRepository;
use App\Repository\OrderRepository\IOrderRepository;
use App\Repository\ProductRepository\IProductRepository;
use App\Repository\ServiceRepository\IServiceRepository;
use App\Repository\TaskRepository\ITaskRepository;
use App\Repository\UserRepository\IUserRepository;

class DashboardController extends Controller
{
    public $logger;
    public $employeeRepository;
    public $taskRepository;
    public $userRepository;
    public $bookingRepository;
    public $productRepository;
    public $serviceRepository;
    public $orderRepository;

    public function __construct(ILogger $logger,
                        IBookingRepository $bookingRepository, IUserRepository $userRepository,
                        IEmployeeRepository $employeeRepository, ITaskRepository $taskRepository,
                        IProductRepository $productRepository, IServiceRepository $serviceRepository,
                        IOrderRepository $orderRepository)
    {
        $this->logger = $logger;
        $this->employeeRepository = $employeeRepository;
        $this->taskRepository = $taskRepository;
        $this->userRepository = $userRepository;
        $this->bookingRepository = $bookingRepository;
        $this->productRepository = $productRepository;
        $this->serviceRepository = $serviceRepository;
        $this->orderRepository = $orderRepository;
    }

    public function dashboard()
    {
       try
        {
            $employeeCount = $this->employeeRepository->getAll()->count();
            $doneTasksCount = $this->taskRepository->doneTasksCount();
            $undoneTasksCount = $this->taskRepository->undoneTasksCount();
            $approvedTasksCount = $this->taskRepository->approvedTasksCount();
            $bookingsCount = $this->bookingRepository->getAll()->count();
            $ActiveProductsCount = $this->productRepository->getActiveProduct()->count();
            $DeactiveProductsCount = $this->productRepository->getDeactiveProduct()->count();
            $servicesCount = $this->serviceRepository->getAll()->count();
            $totalOrders = $this->orderRepository->getAll()->count();

            $userCount = $this->userRepository->getAll()->count();
            $doneTasks = $this->taskRepository->getDoneTaskWithoutPagination();
            $earningsOfCurrentMonth = 0;
            $OrdersStatusCount = $this->orderRepository->getOrdersCountOfEveryStatus();

            foreach ($doneTasks as $task)
            {
                foreach ($task->services as $service)
                {
                    $earningsOfCurrentMonth = $earningsOfCurrentMonth + $service->fee;
                }
            }

            $bestEmployee = $this->employeeRepository->getBestEmployee();

            return view('admin_dashboard.admin_dashboard', compact(
                'employeeCount',
                'doneTasksCount',
                'undoneTasksCount',
                'approvedTasksCount',
                'bookingsCount',
                'ActiveProductsCount',
                'DeactiveProductsCount',
                'userCount',
                'earningsOfCurrentMonth',
                'servicesCount',
                'bestEmployee',
                'totalOrders',
                'OrdersStatusCount'));
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show admin dashboard", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show admin dashboard']);
        }
    }
}
