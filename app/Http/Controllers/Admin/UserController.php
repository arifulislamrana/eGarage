<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Utility\ILogger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Repository\UserRepository\IUserRepository;

class UserController extends Controller
{
    public $logger;
    public $userRepository;

    public function __construct(ILogger $logger, IUserRepository $userRepository)
    {
        $this->logger = $logger;
        $this->userRepository = $userRepository;
    }

    public function userList(Request $request)
    {
       try
        {
            $users = $this->userRepository->getPagiantedUsers($request->search);

            return view('admin_dashboard.user_list', compact('users'));
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show users", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show users']);
        }
    }

    public function show($id)
    {
        try
        {
            $user = $this->userRepository->find($id);

            if (empty($user))
            {
                return redirect()->back()->withErrors(['invalid' => 'User does not exist']);
            }

            return view('admin_dashboard.user_profile', compact('user'));
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show user profile", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show user profile']);
        }
    }

    public function delete($id)
    {
        try
        {
            $user = $this->userRepository->find($id);

            if(File::exists(public_path($user->image)))
            {
                File::delete(public_path($user->image));
            }

            $this->userRepository->destroy($id);

            return redirect()->route('admin.users')->with(['message' => 'User deleted']);
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to delete User", "error", $e);

            return redirect()->back()->with(['message' => 'User can not be deleted']);
        }
    }
}
