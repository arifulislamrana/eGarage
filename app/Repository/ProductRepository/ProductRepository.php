<?php
namespace App\Repository\ProductRepository;

use App\Models\Product;
use App\Repository\BaseRepository\BaseRepository;
use App\Repository\ProductRepository\IProductRepository;

class ProductRepository extends BaseRepository implements IProductRepository {

    public function __construct(Product $model)
    {
        parent::__construct($model);
    }

    public function getPagiantedProduct($search)
    {
        if ($search != null)
        {
            $employees = $this->model->where('name','LIKE','%'.$search.'%')->paginate(10);

            return $employees;
        }
        return $this->model->orderBy('id', 'desc')->paginate(10);
    }
}
