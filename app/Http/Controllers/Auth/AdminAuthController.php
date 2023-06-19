<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Utility\ILogger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
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
            if (Auth::check())
            {
                return redirect()->back();
            }
            return view('auth.admin_auth.login');
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show login Form for admin", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show login Form']);
        }
    }
}
