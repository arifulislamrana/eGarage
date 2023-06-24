<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Utility\ILogger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Repository\ProductRepository\IProductRepository;

class ProductController extends Controller
{
    public $logger;
    public $productRepository;

    public function __construct(ILogger $logger, IProductRepository $productRepo)
    {
        $this->logger = $logger;
        $this->productRepository = $productRepo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try
        {
            $products = $this->productRepository->getPagiantedProduct($request->search);

            return view('admin_dashboard.product_list', compact('products'));
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show product list", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show product list']);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try
        {
            return view('admin_dashboard.create_product');
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show create_product form", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show create_product form']);
        }
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
        try
        {
            $product = $this->productRepository->find($id);

            if(File::exists(public_path($product->image)))
            {
                File::delete(public_path($product->image));
            }

            $this->productRepository->destroy($id);

            return redirect()->route('products.index')->with(['message' => 'Product deleted']);
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to delete Product", "error", $e);

            return redirect()->back()->with(['message' => 'Product can not be deleted']);
        }
    }
}
