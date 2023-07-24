<?php
namespace App\Repository\OrderRepository;

use App\Repository\BaseRepository\IBaseRepository;

interface IOrderRepository extends IBaseRepository
{
    public function pendingOrdersOfAUser($search);

    public function processingOrdersOfAUser($search);

    public function completedOrdersOfAUser($search);

    public function pendingOrders($search);

    public function processingOrders($search);

    public function completedOrders($search);

    public function getOrdersCountOfEveryStatus();

    public function processingOrdersOfAnEmployee($search);

    public function completedOrdersOfAnEmployee($search);

    public function sendOrderRejectionMail($order);

    public function sendOrderApprovingMail($order);
}
