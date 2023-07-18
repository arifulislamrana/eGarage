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
}
