<?php

namespace App\Http\Controllers\Front;

use Exception;
use App\Models\Order;
use App\Models\Category;
use App\Utility\ILogger;
use Illuminate\Http\Request;
use App\Http\Requests\CreateOrder;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repository\OrderRepository\IOrderRepository;
use App\Repository\ProductRepository\IProductRepository;

class ShopController extends Controller
{
    public $logger;
    public $category;
    public $productRepository;
    public $orderRepository;

    public function __construct(ILogger $logger, IProductRepository $productRepository, IOrderRepository $orderRepository, Category $category)
    {
        $this->logger = $logger;
        $this->category = $category;
        $this->productRepository = $productRepository;
        $this->orderRepository = $orderRepository;
    }

    public function index()
    {
        try
        {
            $categories = $this->category->all();

            return view('shop', compact('categories'));
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show categories with 4 products", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show products']);
        }
    }

    public function categoryProducts($category)
    {
        try
        {
            $category = $this->category->findOrFail($category);

            return view('category_product', compact('category'));
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show category wise products", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show category wise products']);
        }
    }

    public function productDetails($product)
    {
        try
        {
            $product = $this->productRepository->find($product);
            $category = $product->category;

            return view('product_details', compact('product', 'category'));
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show product details", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show product details']);
        }
    }

    public function orderNow($product)
    {
        try
        {
            $product = $this->productRepository->find($product);
            $category = $product->category;

            return view('order', compact('product', 'category'));
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show product order form", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show product order form']);
        }
    }

    public function saveOrder(CreateOrder $request)
    {
        try
        {
            $this->orderRepository->create([
                'product_id' => $request->product_id,
                'user_id' => Auth::id(),
                'quantity' => $request->quantity,
                'status' => 'pending',
                'phone' => $request->phone,
                'delivery_address' => $request->delivery_address,
                'employee_id' => null,
                'order_date' => now(),
                'delivery_date' => null,
            ]);

            return redirect()->back()->with(['message' => 'Employee data stored successfully']);
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to save order details", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to save order details']);
        }
    }
}
