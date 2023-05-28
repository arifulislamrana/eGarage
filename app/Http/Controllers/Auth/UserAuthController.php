<?php

namespace App\Http\Controllers\Auth;

use Session;
use Exception;
use App\Utility\ILogger;
use App\Mail\EmailVerify;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\UserRegisterRequest;
use App\Repository\UserRepository\IUserRepository;
use App\Repository\EmailVerificationRepository\IEmailVerificationRepository;

class UserAuthController extends Controller
{
    public $logger;
    public $userRepository;
    public $emailVerificationRepository;

    public function __construct(IUserRepository $userRepository,
                                    IEmailVerificationRepository $emailVerificationRepository,
                                    ILogger $logger)
    {
        $this->logger = $logger;
        $this->userRepository = $userRepository;
        $this->emailVerificationRepository = $emailVerificationRepository;
    }

    public function registerGet()
    {
        try
        {
            if (Auth::check())
            {
                return redirect()->back();
            }

            return view('auth.user_auth.user_register');
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show register Form", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show register Form']);
        }
    }

    public function registerPost(UserRegisterRequest $request)
    {
        try
        {
            if ($request->password != $request->cpassword)
            {
                return redirect()->back()->withErrors(['invalid' => 'Password and Confirm Password Mismatch']);
            }
            if ($this->userRepository->doesUserEmailExist($request->email))
            {
                return redirect()->back()->withErrors(['invalid' => 'This email already exist']);
            }
            DB::beginTransaction();
            $user = $this->userRepository->create([
                        'name' => $request->name,
                        'email' => $request->email,
                        'password' => bcrypt($request->password),
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
            $token = Str::random(64);
            $this->emailVerificationRepository->create([
                'token' => $token,
                'user_id' => $user->id,
            ]);

            $this->userRepository->userEmailVerification([
                'token' => $token,
                'name' => $request->name,
                'email' => $request->email,
            ]);

            DB::commit();

            Auth::login($user);

            return redirect()->route('user.tempDashboard');
        }
        catch (Exception $e)
        {
            DB::rollback();
            $this->logger->write("error", "Failed to create user", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to create user']);
        }
    }

    public function loginGet()
    {
        try
        {
            if (Auth::check())
            {
                return redirect()->back();
            }
            return view('auth.user_auth.user_login');
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show login Form", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show login Form']);
        }
    }

    public function loginPost(LoginRequest $request)
    {
        try{
            $email = $request->email;
            $pass = $request->password;

            if (Auth::attempt(['email' => $email, 'password' => $pass]))
            {
                $request->session()->regenerate();

                if (!Auth::user()->is_verified)
                {
                    return redirect()->route('user.tempDashboard');
                }

                return redirect()->route('user.dashboard');
            }

            return redirect()->back()
                ->withErrors(['invalid' => 'This email or password is wrong.'])
                ->withInput($request->only('email'));
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to log-in", "error", $e);

            return redirect()->back()->withErrors(['error' => 'Failed to login'], 403);
        }
    }

    public function logout(Request $request)
    {
        try
        {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('login');
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to log-out user", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to logout user']);
        }
    }

    public function verifyUser($token)
    {
        $emailVerification = $this->emailVerificationRepository->getItemByToken($token);

        $message = 'Sorry your email cannot be identified.';

        if(!is_null($emailVerification) ){
            $user = $emailVerification->user;

            if(!$user->is_verified) {
                $user->is_verified = true;
                $user->email_verified_at = now();
                $user->save();
                $message = "Your e-mail is verified.";
            } else {
                $message = "Your e-mail is already verified.";
            }
        }

        return redirect()->route('user.dashboard')->with('message', $message);
    }

    public function resendVerificationMail()
    {
        try
        {
            $user = Auth::user();

            if ($user->is_verified)
            {
                return redirect()->back()->with('success','Account is already verified');
            }

            $token = $user->emailVerification->token;
            $this->userRepository->userEmailVerification([
                'token' => $token,
                'name' => $user->name,
                'email' => $user->email,
            ]);

            return redirect()->route('user.tempDashboard')->with('success','Verification mail has been sent. Check your inbox');
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to resend verification mail", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to resend verification mail']);
        }
    }
}
