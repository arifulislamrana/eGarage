<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Utility\ILogger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public $logger;

    public function __construct(ILogger $logger)
    {
        $this->logger = $logger;
    }

    public function userList()
    {
       try
        {
            return view('admin_dashboard.user_list');
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show users", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show users']);
        }
    }
}
