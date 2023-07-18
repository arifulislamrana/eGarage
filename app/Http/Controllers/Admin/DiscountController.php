<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Utility\ILogger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateDiscount;
use App\Repository\DiscountRepository\IDiscountRepository;

class DiscountController extends Controller
{
    public $logger;
    public $discountRepository;

    public function __construct(ILogger $logger, IDiscountRepository $discountRepo)
    {
        $this->logger = $logger;
        $this->discountRepository = $discountRepo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try
        {
            $discounts = $this->discountRepository->getPagiantedDiscounts($request->search);

            return view('admin_dashboard.discount_list', compact('discounts'));
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show category list", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show category list']);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try
        {
            return view('admin_dashboard.create_discount');
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show create_discount form", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show create_discount form']);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateDiscount $request)
    {
        try
        {
            if (!empty($this->discountRepository->getDiscountByName($request->name)))
            {
                return redirect()->back()->withErrors(['invalid' => 'This discount type already exist']);
            }
            $this->discountRepository->create([
                'name' => $request->name,
                'percentage' => $request->percentage,
            ]);

            return redirect()->route('discounts.index')->with(['message' => 'discount data stored successfully']);
        }
        catch (Exception $e)
        {
            $this->logger->write("error", "Failed to Strore discount Data", $e);

            return redirect()->back()->withErrors(['invalid' => 'data could not be saved. Please try again']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        dd('not needed');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try
        {
            $discount = $this->discountRepository->find($id);

            return view('admin_dashboard.update_discount', compact('discount'));
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show update_discount form", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show update_discount form']);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateDiscount $request, string $id)
    {
        try
        {
            $this->discountRepository->update($id, [
                'name' => $request->name,
                'percentage' => $request->percentage,
            ]);

            return redirect()->route('discounts.index')->with(['message' => 'discount data updated successfully']);
        }
        catch (Exception $e)
        {
            $this->logger->write("error", "Failed to update discount Data", $e);

            return redirect()->back()->withErrors(['invalid' => 'data could not be updated. Please try again']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try
        {
            $this->discountRepository->destroy($id);

            return redirect()->route('discounts.index')->with(['message' => 'discount data deleted']);
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to delete discount data", "error", $e);

            return redirect()->back()->with(['message' => 'discount data can not be deleted']);
        }
    }
}
