<?php
namespace App\Repository\DiscountRepository;

use App\Repository\BaseRepository\IBaseRepository;

interface IDiscountRepository extends IBaseRepository
{
    public function getPagiantedDiscounts($search);
}
