<?php

namespace App\Http\Controllers\Front;

use App\Utility\ILogger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public $logger;

    public function __construct(ILogger $logger)
    {
        $this->logger = $logger;
    }

    public function index()
    {
        return view('service');
    }
}
