<?php
namespace App\Repository\CategoryRepository;

use App\Models\Order;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Repository\BaseRepository\BaseRepository;
use App\Repository\CategoryRepository\ICategoryRepository;

class CategoryRepository extends BaseRepository implements ICategoryRepository {

    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    public function getPagiantedActiveCategory($search)
    {
        if ($search != null)
        {
            return $this->model->where('name','LIKE','%'.$search.'%')->where('status', 'active')->paginate(10);
        }

        return $this->model->where('status', 'active')->orderBy('id', 'desc')->paginate(10);
    }

    public function getPagiantedDeactiveCategory($search)
    {
        if ($search != null)
        {
            return $this->model->where('name','LIKE','%'.$search.'%')->where('status', 'deactive')->paginate(10);
        }

        return $this->model->where('status', 'deactive')->orderBy('id', 'desc')->paginate(10);
    }

    public function getCategoryByName($name)
    {
        return $this->model->where('name', $name)->first();
    }
}
