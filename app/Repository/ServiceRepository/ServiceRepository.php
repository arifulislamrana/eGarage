<?php
namespace App\Repository\ServiceRepository;

use App\Models\Service;
use App\Repository\BaseRepository\BaseRepository;
use App\Repository\ServiceRepository\IServiceRepository;

class ServiceRepository extends BaseRepository implements IServiceRepository
{

    public function __construct(Service $model)
    {
        parent::__construct($model);
    }
}
