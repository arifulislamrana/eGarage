<?php
namespace App\Repository\BookingRepository;

use App\Http\Requests\CreateBooking;
use App\Http\Requests\UpdateBooking;
use App\Repository\BaseRepository\IBaseRepository;

interface IBookingRepository extends IBaseRepository
{
    public function storeBookingDataAndMakeRelationWithServices(CreateBooking $request, $services);
    public function updateBookingDataAndMakeRelationWithServices(UpdateBooking $request, $id, $services);
    public function getBooking();
}
