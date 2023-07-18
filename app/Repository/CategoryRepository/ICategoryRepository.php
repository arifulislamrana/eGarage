<?php
namespace App\Repository\CategoryRepository;

use App\Repository\BaseRepository\IBaseRepository;

interface ICategoryRepository extends IBaseRepository
{
    public function getPagiantedActiveCategory($search);

    public function getPagiantedDeactiveCategory($search);
}
