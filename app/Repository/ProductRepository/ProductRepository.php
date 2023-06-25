<?php
namespace App\Repository\ProductRepository;

use App\Models\Category;
use App\Models\Discount;
use App\Models\Product;
use App\Repository\BaseRepository\BaseRepository;
use App\Repository\ProductRepository\IProductRepository;

class ProductRepository extends BaseRepository implements IProductRepository {

    public function __construct(Product $model)
    {
        parent::__construct($model);
    }

    public function getPagiantedActiveProduct($search)
    {
        if ($search != null)
        {
            $employees = $this->model->where('name','LIKE','%'.$search.'%')->where('status', 'active')->paginate(10);

            return $employees;
        }
        return $this->model->where('status', 'active')->orderBy('id', 'desc')->paginate(10);
    }

    public function getPagiantedDeactiveProduct($search)
    {
        if ($search != null)
        {
            $employees = $this->model->where('name','LIKE','%'.$search.'%')->where('status', 'deactive')->paginate(10);

            return $employees;
        }
        return $this->model->where('status', 'deactive')->orderBy('id', 'desc')->paginate(10);
    }

    public function getallCategory()
    {
        return Category::all();
    }

    public function getAllDiscount()
    {
        return Discount::all();
    }
}
