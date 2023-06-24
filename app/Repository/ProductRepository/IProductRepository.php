<?php
namespace App\Repository\ProductRepository;

use App\Repository\BaseRepository\IBaseRepository;

interface IProductRepository extends IBaseRepository
{
    public function getPagiantedProduct($search);
}
