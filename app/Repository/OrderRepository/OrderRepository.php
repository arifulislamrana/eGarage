<?php
namespace App\Repository\OrderRepository;

use App\Models\Order;
use App\Repository\BaseRepository\BaseRepository;
use App\Repository\OrderRepository\IOrderRepository;
use Illuminate\Support\Facades\Auth;

class OrderRepository extends BaseRepository implements IOrderRepository {

    public function __construct(Order $model)
    {
        parent::__construct($model);
    }

    public function pendingOrdersOfAUser($search)
    {
        if ($search != null)
        {
            return $this->model->join('products', 'orders.product_id', '=', 'products.id')->where('orders.user_id', Auth::id())->where('orders.status', 'pending')->where('products.name','LIKE','%'.$search.'%')->select('orders.*')->paginate(5);
        }

        return $this->model->where('user_id', Auth::id())->where('status', 'pending')->paginate(5);
    }

    public function processingOrdersOfAUser($search)
    {
        if ($search != null)
        {
            return $this->model->join('products', 'orders.product_id', '=', 'products.id')->where('orders.user_id', Auth::id())->where('orders.status', 'processing')->where('products.name','LIKE','%'.$search.'%')->select('orders.*')->paginate(5);
        }

        return $this->model->where('user_id', Auth::id())->where('status', 'processing')->paginate(5);
    }

    public function completedOrdersOfAUser($search)
    {
        if ($search != null)
        {
            return $this->model->join('products', 'orders.product_id', '=', 'products.id')->where('orders.user_id', Auth::id())->where('orders.status', 'completed')->where('products.name','LIKE','%'.$search.'%')->select('orders.*')->paginate(5);
        }

        return $this->model->where('user_id', Auth::id())->where('status', 'completed')->paginate(5);
    }

    public function pendingOrders($search)
    {
        if ($search != null)
        {
            return $this->model->join('users', 'orders.user_id', '=', 'users.id')->where('orders.status', 'pending')->where('users.name','LIKE','%'.$search.'%')->select('orders.*')->paginate(5);
        }

        return $this->model->where('status', 'pending')->paginate(5);
    }

    public function processingOrders($search)
    {
        if ($search != null)
        {
            return $this->model->join('users', 'orders.user_id', '=', 'users.id')->where('orders.status', 'processing')->where('users.name','LIKE','%'.$search.'%')->select('orders.*')->paginate(5);
        }

        return $this->model->where('status', 'processing')->paginate(5);
    }

    public function completedOrders($search)
    {
        if ($search != null)
        {
            return $this->model->join('users', 'orders.user_id', '=', 'users.id')->where('orders.status', 'completed')->where('users.name','LIKE','%'.$search.'%')->select('orders.*')->paginate(5);
        }

        return $this->model->where('status', 'completed')->paginate(5);
    }

    public function getOrdersCountOfEveryStatus()
    {
        return array(
            'pending' => $this->model->where('status', 'pending')->count(),
            'completed' => $this->model->where('status', 'completed')->count(),
            'processing' => $this->model->where('status', 'processing')->count(),
        );
    }
}
