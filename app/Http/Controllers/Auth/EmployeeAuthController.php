<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Utility\ILogger;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EmployeeAuthController extends Controller
{
    public $logger;

    public function __construct(ILogger $logger)
    {
        $this->logger = $logger;
    }

    public function loginGet()
    {
        try
        {
            if (Auth::guard('employee')->check())
            {
                return redirect()->back();
            }
            return view('auth.employee_auth.login');
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show login Form for employee", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show login Form']);
        }
    }

    public function loginPost(LoginRequest $request)
    {
        try{
            $email = $request->email;
            $pass = $request->password;

            if (Auth::guard('employee')->attempt(['email' => $email, 'password' => $pass]))
            {
                $request->session()->regenerate();

                return redirect()->route('employee.dashboard');
            }

            return redirect()->back()
                ->withErrors(['invalid' => 'This email or password is wrong.'])
                ->withInput($request->only('email'));
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to log-in employee", "error", $e);

            return redirect()->back()->withErrors(['error' => 'Failed to login'], 403);
        }
    }

    public function logout(Request $request)
    {
        try
        {
            Auth::guard('admin')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('employee.login');
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to log-out employee", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to logout employee']);
        }
    }
}
