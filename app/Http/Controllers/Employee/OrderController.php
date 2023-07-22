<?php

namespace App\Http\Controllers\Employee;

use Exception;
use App\Utility\ILogger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\OrderRepository\IOrderRepository;
use App\Repository\EmployeeRepository\IEmployeeRepository;

class OrderController extends Controller
{
    public $logger;
    public $orderRepository;
    public $employeeRepository;

    public function __construct(ILogger $logger, IOrderRepository $orderRepository, IEmployeeRepository $employeeRepository)
    {
        $this->logger = $logger;
        $this->orderRepository = $orderRepository;
        $this->employeeRepository = $employeeRepository;
    }

    public function index(Request $request)
    {
        try
        {
            $processingOrders = $this->orderRepository->processingOrdersOfAnEmployee($request->search);
            $completedOrders = $this->orderRepository->completedOrdersOfAnEmployee($request->search);

            return view('employee_dashboard.order', compact('processingOrders', 'completedOrders'));
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show orders list at employee", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show order list']);
        }
    }

    public function show(string $id)
    {
        try
        {
            $order = $this->orderRepository->find($id);

            return view('employee_dashboard.show_order', compact('order'));
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show order at employee", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show order']);
        }
    }

    public function confirmOrderDelivery($id)
    {
        try
        {
            $this->orderRepository->update($id, [
                'status' => 'completed',
            ]);

            return redirect()->route('employee.order')->with(['message' => 'Order Delivered.']);
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to deliver order from employee", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to deliver order']);
        }
    }
}
