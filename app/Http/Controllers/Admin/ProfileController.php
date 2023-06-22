<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Utility\ILogger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public $logger;

    public function __construct(ILogger $logger)
    {
        $this->logger = $logger;
    }

    public function profile()
    {
       try
        {
            return view('admin_dashboard.profile');
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show admin profile", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show admin profile']);
        }
    }
}
