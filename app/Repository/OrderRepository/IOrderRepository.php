<?php
namespace App\Repository\OrderRepository;

use App\Repository\BaseRepository\IBaseRepository;

interface IOrderRepository extends IBaseRepository
{
    public function pendingOrders($search);

    public function processingOrders($search);

    public function completedOrders($search);
}
