<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Carbon\Carbon;
use App\Utility\ILogger;
use Illuminate\Http\Request;
use App\Http\Requests\AcceptOrder;
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
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try
        {
            $pendingOrders = $this->orderRepository->pendingOrders($request->search);
            $processingOrders = $this->orderRepository->processingOrders($request->search);
            $completedOrders = $this->orderRepository->completedOrders($request->search);
            $employees = $this->employeeRepository->getAll();

            return view('admin_dashboard.order', compact('pendingOrders', 'processingOrders', 'completedOrders', 'employees'));
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show orders list at admin", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show order list']);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        dd('not needed');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd('not needed');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try
        {
            $order = $this->orderRepository->find($id);

            return view('admin_dashboard.show_order', compact('order'));
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show order", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show order']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        dd('not needed');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AcceptOrder $request, string $id)
    {
        try
        {
            $dateToCompare = Carbon::parse($request->delivery_date);

            if (!$dateToCompare->greaterThan(Carbon::now()))
            {
                return redirect()->back()->withErrors(['invalid' => 'Selected date invalid']);
            }

            if ($this->orderRepository->find($id)->status != 'pending')
            {
                return redirect()->back()->withErrors(['invalid' => 'Accept pending orders']);
            }

            $this->orderRepository->update($id, [
                'status' => 'processing',
                'employee_id' => $request->employee_id,
                'delivery_date' => $request->delivery_date,
            ]);

            return redirect()->route('orders.index')->with(['message' => 'Order Accepted. Now it is under processing']);
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to ccept order", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to accept order']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try
        {
            $this->orderRepository->destroy($id);

            return redirect()->route('orders.index')->with(['message' => 'order data deleted']);
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to delete order data", "error", $e);

            return redirect()->back()->with(['message' => 'orde data can not be deleted']);
        }
    }
}
