<?php
namespace App\Repository\DiscountRepository;

use App\Models\Discount;
use Illuminate\Support\Facades\Auth;
use App\Repository\BaseRepository\BaseRepository;
use App\Repository\DiscountRepository\IDiscountRepository;

class DiscountRepository extends BaseRepository implements IDiscountRepository {

    public function __construct(Discount $model)
    {
        parent::__construct($model);
    }
}
