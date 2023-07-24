<?php
namespace App\Repository\OrderRepository;

use App\Models\Order;
use App\Events\NotifyUser;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Repository\BaseRepository\BaseRepository;
use App\Repository\OrderRepository\IOrderRepository;

class OrderRepository extends BaseRepository implements IOrderRepository {

    public function __construct(Order $model)
    {
        parent::__construct($model);
    }

    public function processingOrdersOfAnEmployee($search)
    {
        if ($search != null)
        {
            return $this->model->join('users', 'orders.user_id', '=', 'users.id')->where('orders.employee_id', Auth::guard('employee')->id())->where('orders.status', 'processing')->where('users.name','LIKE','%'.$search.'%')->select('orders.*')->paginate(5);
        }

        return $this->model->where('orders.employee_id', Auth::guard('employee')->id())->where('status', 'processing')->paginate(5);
    }

    public function completedOrdersOfAnEmployee($search)
    {
        if ($search != null)
        {
            return $this->model->join('users', 'orders.user_id', '=', 'users.id')->where('orders.employee_id', Auth::guard('employee')->id())->where('orders.status', 'completed')->where('users.name','LIKE','%'.$search.'%')->select('orders.*')->paginate(5);
        }

        return $this->model->where('orders.employee_id', Auth::guard('employee')->id())->where('status', 'completed')->paginate(5);
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

    public function sendOrderRejectionMail($order)
    {
        $data = array();
        $data['email'] = $order->user->email;
        $data['subject'] = 'Order Rejected';
        $data['user_name'] = $order->user->name;
        $data['body'] = "We regret to inform you that your order has been rejected. We sincerely apologize for any inconvenience this may cause. If you have any questions or concerns, please don't hesitate to contact our customer support for further assistance. Thank you for considering us, and we hope to serve you better in the future.";

        event(new NotifyUser($data));
    }

    public function sendOrderApprovingMail($order)
    {
        $data = array();
        $data['email'] = $order->user->email;
        $data['subject'] = 'Order Accepted';
        $data['user_name'] = $order->user->name;
        $data['body'] = 'Thank you for your order! We have accepted your request and the order status has been changed to Processing. Our team is diligently working to prepare your items for shipment. We will keep you updated on the progress and tracking details soon. If you have any questions, feel free to reach out to our customer support. Happy shopping!';

        event(new NotifyUser($data));
    }
}
