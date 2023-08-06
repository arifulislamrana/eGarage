<?php

namespace App\Http\Controllers\User;

use Exception;
use App\Utility\ILogger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateOrder;
use App\Models\Payment;
use App\Repository\OrderRepository\IOrderRepository;
use Illuminate\Support\Facades\Auth;

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
            $this->logger->write("Failed to show orders list", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show order list']);
        }
    }

    public function show($id)
    {
        try
        {
            $order = $this->orderRepository->find($id);

            return view('user_dashboard.show_order', compact('order'));
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show order", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show order']);
        }
    }

    public function edit($id)
    {
        try
        {
            $order = $this->orderRepository->find($id);

            if ($order->status != 'pending')
            {
                return redirect()->back()->withErrors(['invalid' => 'Failed to edit order']);
            }

            return view('user_dashboard.edit_order', compact('order'));
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to edit order", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to edit order']);
        }
    }

    public function update($id, UpdateOrder $request)
    {
        try
        {
            $this->orderRepository->update($id, [
                'phone' => $request->phone,
                'quantity' => $request->quantity,
                'delivery_address' => $request->delivery_address,
            ]);

            return redirect()->route('order.index')->with(['message' => 'Order data updated successfully']);
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to update order", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to update order']);
        }
    }

    public function destroy($id)
    {
        try
        {
            if (Auth::id() != $this->orderRepository->find($id)->user_id)
            {
                return redirect()->back()->withErrors(['invalid' => 'Failed to delete order']);
            }
            $this->orderRepository->destroy($id);

            return redirect()->route('order.index')->with(['message' => 'Order deleted']);
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to delete order by user", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to delete order']);
        }
    }

    public function myShopping(Request $request)
    {
        try
        {
            $completedOrders = $this->orderRepository->completedOrders($request->search);

            return view('user_dashboard.my_shopping', compact('completedOrders'));
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show shopping list", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show shopping list']);
        }
    }

    public function payment($orderId)
    {
        try
        {
            return view('user_dashboard.payment', compact('orderId'));
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show payment option", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show payment option']);
        }
    }

    public function savePayment(Request $request)
    {
        try
        {
            Payment::create([
                'txnid' => $request->txnid,
                'user_id' => Auth::id(),
                'order_id' => $request->order_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return redirect()->route('order.index')->with(['message' => 'payment data stored for review']);
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to store payment data", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to store payment data']);
        }
    }
}
