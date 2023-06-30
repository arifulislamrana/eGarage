<?php
namespace App\Repository\BookingRepository;

use App\Models\Booking;
use App\Http\Requests\CreateBooking;
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
}
