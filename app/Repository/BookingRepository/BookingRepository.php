<?php
namespace App\Repository\BookingRepository;

use App\Models\Booking;
use App\Events\NotifyUser;
use App\Http\Requests\CreateBooking;
use App\Http\Requests\UpdateBooking;
use Illuminate\Support\Facades\Auth;
use App\Repository\BaseRepository\BaseRepository;

class BookingRepository extends BaseRepository implements IBookingRepository
{

    public function __construct(Booking $model)
    {
        parent::__construct($model);
    }

    public function storeBookingDataAndMakeRelationWithServices(CreateBooking $request, $services)
    {
        $booking = $this->create([
            'user_id' => Auth::id(),
            'arrival_time' => $request->arrival_time,
            'special_request' => $request->special_request,
        ]);

        $booking->services()->attach($services);

        return $booking;
    }

    public function updateBookingDataAndMakeRelationWithServices(UpdateBooking $request, $id, $services)
    {
        $this->find($id)->services()->detach();

        $booking = $this->update($id, [
            'arrival_time' => $request->arrival_time,
            'special_request' => $request->special_request,
        ]);

        $this->find($id)->services()->attach($services);

        return $booking;
    }

    public function getBooking()
    {
        return Auth::user()->booking;
    }

    public function getPagiantedBookings($search)
    {
        if ($search != null)
        {
            return $this->model->join('users', 'bookings.user_id', '=', 'users.id')->where('users.name','LIKE','%'.$search.'%')->select('bookings.*')->paginate(10);
        }
        return $this->model->orderBy('id', 'desc')->paginate(10);
    }

    public function doesBookingExist()
    {
        return ($this->model->where('user_id', Auth::id())->count()) ? true : false;
    }

    public function sendBookingRejectionMail($booking)
    {
        $data = array();
        $data['email'] = $booking->user->email;
        $data['subject'] = 'Booking Rejection';
        $data['user_name'] = $booking->user->name;
        $data['body'] = 'We regret to inform you that we are unable to accommodate your bike service booking at this time due to our current high demand. We apologize for any inconvenience and hope to serve you in the future when availability opens up';
        event(new NotifyUser($data));
    }

    public function sendBookingApprovingMail($booking)
    {
        $data = array();
        $data['email'] = $booking->user->email;
        $data['subject'] = 'Booking Approved';
        $data['user_name'] = $booking->user->name;
        $data['body'] = 'Congratulations! Your bike service booking has been approved. We look forward to providing top-notch service and ensuring your bike is in excellent condition for your upcoming rides.';
        event(new NotifyUser($data));
    }
}
