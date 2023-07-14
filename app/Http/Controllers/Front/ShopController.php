<?php

namespace App\Http\Controllers\Front;

use Exception;
use App\Models\Category;
use App\Utility\ILogger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    public $logger;
    public $category;

    public function __construct(ILogger $logger, Category $category)
    {
        $this->logger = $logger;
        $this->category = $category;
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
}
