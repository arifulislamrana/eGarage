<?php

namespace App\Http\Controllers\User;

use Exception;
use App\Utility\ILogger;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateUser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Repository\UserRepository\IUserRepository;

class UserProfileController extends Controller
{
    public $logger;
    public $userRepository;

    public function __construct(ILogger $logger, IUserRepository $userRepository)
    {
        $this->logger = $logger;
        $this->userRepository = $userRepository;
    }

    public function show()
    {
        try
        {
            $user = $this->userRepository->find(Auth::id());

            if (empty($user))
            {
                return redirect()->back()->withErrors(['invalid' => 'User does not exist']);
            }

            return view('user_dashboard.user_profile', compact('user'));
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show user profile at User Side", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show user profile at User Side']);
        }
    }

    public function edit()
    {
        try
        {
            $user = $this->userRepository->find(Auth::id());

            return view('user_dashboard.update_user', compact('user'));
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show update_user form", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show update_user form']);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUser $request)
    {
        try
        {
            $id = Auth::id();

            $user = $this->userRepository->find($id);

            if ($user->phone != $request->phone && $this->userRepository->getUserByPhone($request->phone) != null)
            {
                return redirect()->back()->withErrors(['invalid' => 'This phone number already been used']);
            }

            if ($request->image != null)
            {
                if(File::exists(public_path($user->image)))
                {
                    File::delete(public_path($user->image));
                }

                $imageName = time().rand(99, 100000000).'.'.$request->file('image')->extension();
                $imagePath = "\\".str_replace('/', "\\",config('app.userImagePath'))."\\".$imageName;

                $this->userRepository->update($id, [
                    'name' => $request->name,
                    'image' => $imagePath,
                    'phone' => $request->phone,
                    'address' => $request->address,
                ]);

                $request->file('image')->move(public_path(config('app.userImagePath')), $imageName);

                return redirect()->route('user.profile')->with(['message' => 'User data updated successfully']);
            }

            $this->userRepository->update($id, [
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
            ]);

            return redirect()->route('user.profile')->with(['message' => 'User data updated successfully']);
        }
        catch (Exception $e)
        {
            $this->logger->write("error", "Failed to update User Data", $e);

            return redirect()->back()->withErrors(['invalid' => 'data could not be updated. Please try again']);
        }
    }
}
