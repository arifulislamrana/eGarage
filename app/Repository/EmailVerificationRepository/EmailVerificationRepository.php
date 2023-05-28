<?php
namespace App\Repository\EmailVerificationRepository;

use App\Models\EmailVerification;
use App\Repository\BaseRepository\BaseRepository;
use App\Repository\EmailVerificationRepository\IEmailVerificationRepository;

class EmailVerificationRepository extends BaseRepository implements IEmailVerificationRepository {

    public function __construct(EmailVerification $model)
    {
        parent::__construct($model);
    }

    public function getItemByToken($token)
    {
       return  $this->model->where('token', $token)->first();
    }
}
