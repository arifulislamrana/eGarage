<?php
namespace App\Repository\OrderRepository;

use App\Models\Order;
use App\Repository\BaseRepository\BaseRepository;
use App\Repository\OrderRepository\IOrderRepository;

class OrderRepository extends BaseRepository implements IOrderRepository {

    public function __construct(Order $model)
    {
        parent::__construct($model);
    }
}
