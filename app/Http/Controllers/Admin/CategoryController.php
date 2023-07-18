<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Utility\ILogger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\CategoryRepository\ICategoryRepository;

class CategoryController extends Controller
{
    public $logger;
    public $categoryRepository;

    public function __construct(ILogger $logger, ICategoryRepository $categoryRepo)
    {
        $this->logger = $logger;
        $this->categoryRepository = $categoryRepo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try
        {
            $products = $this->categoryRepository->getPagiantedActiveProduct($request->search);
            $deactiveProducts = $this->productRepository->getPagiantedDeactiveProduct($request->search);

            return view('admin_dashboard.product_list', ['products' => $products, 'deactiveProducts' => $deactiveProducts]);
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
