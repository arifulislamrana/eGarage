<?php

namespace App\Http\Controllers\Admin;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
