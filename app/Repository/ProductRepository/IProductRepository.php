<?php
namespace App\Repository\ProductRepository;

use App\Repository\BaseRepository\IBaseRepository;

interface IProductRepository extends IBaseRepository
{
    public function getPagiantedActiveProduct($search);
    public function getPagiantedDeactiveProduct($search);
    public function getallCategory();
    public function getAllDiscount();
}
