<?php
namespace App\Repository\UserRepository;

use App\Repository\BaseRepository\IBaseRepository;

interface IUserRepository extends IBaseRepository {
    public function userEmailVerification(Array $data);
    public function doesUserEmailExist($email);
}
