<?php
namespace App\Repository\UserRepository;

use App\Models\User;
use App\Mail\EmailVerify;
use App\Mail\ForgetPass;
use App\Mail\ForgetPassword;
use Illuminate\Support\Facades\Mail;
use App\Repository\BaseRepository\BaseRepository;
use App\Repository\UserRepository\IUserRepository;

class UserRepository extends BaseRepository implements IUserRepository {

    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function userEmailVerification(Array $data)
    {
        //data array must have [email, token, name]
       return  Mail::to($data['email'])->send(new EmailVerify($data));
    }

    public function doesUserEmailExist($email)
    {
       return  (!empty($this->model->where('email', $email)->first()));
    }

    public function getUserByEmail($email)
    {
        return $this->model->where('email', $email)->first();
    }

    public function userPassRecoverMail(Array $data)
    {
        //data array must have [email, token, name]
       return  Mail::to($data['email'])->send(new ForgetPassword($data));
    }
}
