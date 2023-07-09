<?php

namespace App\Http\Controllers\Employee;

use Exception;
use App\Utility\ILogger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProduct;
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
            $products = $this->productRepository->getPagiantedActiveProduct($request->search);
            $deactiveProducts = $this->productRepository->getPagiantedDeactiveProduct($request->search);

            return view('employee_dashboard.product_list', ['products' => $products, 'deactiveProducts' => $deactiveProducts]);
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show product list", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show product list']);
        }
    }

    public function create()
    {
        try
        {
            $categories = $this->productRepository->getallCategory();

            return view('employee_dashboard.create_product', ['categories' => $categories]);
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
    public function store(CreateProduct $request)
    {
        try
        {
            $imageName = time().rand(99, 100000000).'.'.$request->file('image')->extension();
            $imagePath = "\\".str_replace('/', "\\",config('app.productImagePath'))."\\".$imageName;

            $this->productRepository->create([
                'name' => $request->name,
                'price' => $request->price,
                'description' => $request->description,
                'image' => $imagePath,
                'status' => $request->status,
                'category_id' => $request->category,
                'discount_id' => $request->discount,
                'buying_price' => $request->buying_price,
                'dealer' => $request->dealer,
                'quantity' => $request->quantity,
            ]);

            $request->file('image')->move(public_path(config('app.productImagePath')), $imageName);

            return redirect()->route('products.index')->with(['message' => 'product data stored successfully']);
        }
        catch (Exception $e)
        {
            $this->logger->write("error", "Failed to Strore product Data", $e);

            return redirect()->back()->withErrors(['invalid' => 'data could not be saved. Please try again']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try
        {
            $product = $this->productRepository->find($id);

            if (empty($product))
            {
                return redirect()->back()->withErrors(['invalid' => 'Product does not exist']);
            }

            return view('admin_dashboard.product_details', compact('product'));
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show product details", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show product details']);
        }
    }
}
