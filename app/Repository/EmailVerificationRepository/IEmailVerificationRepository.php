<?php
namespace App\Repository\EmailVerificationRepository;

use App\Repository\BaseRepository\IBaseRepository;

interface IEmailVerificationRepository extends IBaseRepository {
    public function getItemByToken($token);
}
