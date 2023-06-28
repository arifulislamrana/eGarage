<?php
namespace App\Repository\UserRepository;

use App\Repository\BaseRepository\IBaseRepository;

interface IUserRepository extends IBaseRepository
{
    public function userEmailVerification(Array $data);

    public function doesUserEmailExist($email);

    public function getUserByEmail($email);

    public function getUserByPhone($phone);

    public function userPassRecoverMail(Array $data);

    public function getPagiantedUsers($search);
}
