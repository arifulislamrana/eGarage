<?php

namespace App\Http\Controllers\Front;

use Exception;
use App\Models\Category;
use App\Utility\ILogger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\ProductRepository\IProductRepository;

class ShopController extends Controller
{
    public $logger;
    public $category;
    public $productRepository;

    public function __construct(ILogger $logger, Category $category, IProductRepository $productRepository)
    {
        $this->logger = $logger;
        $this->category = $category;
        $this->productRepository = $productRepository;
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
}
