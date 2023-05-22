<?php
namespace App\Repository\UserRepository;

use App\Models\User;
use App\Repository\BaseRepository\BaseRepository;
use App\Repository\UserRepository\IUserRepository;

class UserRepository extends BaseRepository implements IUserRepository {

    public function __construct(User $model)
    {
        parent::__construct($model);
    }
}
