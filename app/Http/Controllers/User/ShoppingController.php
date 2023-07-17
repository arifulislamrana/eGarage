<?php

namespace App\Http\Controllers\User;

use Exception;
use App\Utility\ILogger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\OrderRepository\IOrderRepository;

class ShoppingController extends Controller
{
    public $logger;
    public $orderRepository;

    public function __construct(ILogger $logger, IOrderRepository $orderRepository)
    {
        $this->logger = $logger;
        $this->orderRepository = $orderRepository;
    }

    public function orders(Request $request)
    {
        try
        {
            $pendingOrders = $this->orderRepository->pendingOrders($request->search);
            $processingOrders = $this->orderRepository->processingOrders($request->search);

            return view('user_dashboard.order', compact('pendingOrders', 'processingOrders'));
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show product list", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show product list']);
        }
    }
}
