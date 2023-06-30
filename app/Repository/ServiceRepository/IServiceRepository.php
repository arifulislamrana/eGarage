<?php
namespace App\Repository\ServiceRepository;

use App\Repository\BaseRepository\IBaseRepository;

interface IServiceRepository extends IBaseRepository
{
    public function findServices($servicesId);
}
