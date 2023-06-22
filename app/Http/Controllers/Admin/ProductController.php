<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Utility\ILogger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public $logger;

    public function __construct(ILogger $logger)
    {
        $this->logger = $logger;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try
        {
            return view('admin_dashboard.product_list');
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
        //
    }
}
