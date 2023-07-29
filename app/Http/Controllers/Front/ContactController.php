<?php

namespace App\Http\Controllers\Front;

use App\Events\NotifyUser;
use Exception;
use App\Utility\ILogger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Contact;

class ContactController extends Controller
{
    public $logger;
    public $employeeRepository;

    public function __construct(ILogger $logger)
    {
        $this->logger = $logger;
    }

    public function contact(Contact $request)
    {
        try
        {

            $data = array();
            $data['email'] = env('MAIL_USERNAME');
            $data['subject'] =  $request->subject;
            $data['user_name'] = 'I am '.$request->name.'and my email address is: '.$request->email;
            $data['body'] = $request->body;

            event(new NotifyUser($data));

            return redirect()->back()->with(['message' => 'Information sent to authority']);
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to mail to authority with contact data", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to send contact data']);
        }
    }

    public function index()
    {
        try
        {
            return view('contact');
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show contact page", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show data']);
        }
    }
}
