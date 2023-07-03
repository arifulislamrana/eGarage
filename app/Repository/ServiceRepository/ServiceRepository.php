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

    public function findServices($servicesId)
    {
        return $this->model->find($servicesId);
    }

    public function getPagiantedAvailableServices($search)
    {
        if ($search != null)
        {
            return $this->model->where('name','LIKE','%'.$search.'%')->where('status', 'available')->paginate(10);
        }
        return $this->model->where('status', 'available')->orderBy('id', 'desc')->paginate(10);
    }

    public function getPagiantedClosedServices($search)
    {
        if ($search != null)
        {
            return $this->model->where('name','LIKE','%'.$search.'%')->where('status', 'closed')->paginate(10);
        }
        return $this->model->where('status', 'closed')->orderBy('id', 'desc')->paginate(10);
    }
}
