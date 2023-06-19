<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $targetDate = '2023-06-30 00:00:00';
        return view('user_dashboard.user_dashboard', compact('targetDate'));
    }
}
