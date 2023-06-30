<?php
namespace App\Repository\BookingRepository;

use App\Http\Requests\CreateBooking;
use App\Repository\BaseRepository\IBaseRepository;

interface IBookingRepository extends IBaseRepository
{
    public function storeBookingDataAndMakeRelationWithServices(CreateBooking $request, $services);
}
