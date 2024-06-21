<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImageRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterStoreRequest;
use App\Interfaces\EmailInterfaceSend;
use App\Services\UserServices;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/**
 * Summary of AuthenticationController
 */
class AuthenticationController extends Controller
{
    /**
     * Summary of userServices
     * @var
     */
    protected $userServices;
    /**
     * Summary of emailService
     * @var
     */
    protected $emailService;

    /**
     * Summary of __construct
     * @param \App\Services\UserServices $userServices
     * @param \App\Interfaces\EmailInterfaceSend $emailService
     */
    public function __construct(UserServices $userServices, EmailInterfaceSend $emailService)
    {
        $this->userServices = $userServices;
        $this->emailService = $emailService;
    }

    /**
     * Display  of the Login view.
     */
    public function userLoginView()
    {
        return view('login');
    }
    /**
     * Handle the authentication process.
     * @param  LoginRequest  $request
     */
    public function userLogin(LoginRequest $request)
    {
        $credentials = $request->validated();
        try {
            if (!$this->userServices->authenticate($credentials)) {
                return redirect()->back()->withErrors(['invaild' => 'Invalid password or email. Please try again.']);
            }
            return redirect()->route('home');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred during login. Please try again.' . $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     * @param  RegisterStoreRequest  $request
     */
    public function store(RegisterStoreRequest $request): RedirectResponse
    {
        $data = $request->validated();
        try {
            $this->userServices->createUser($data);
            $this->emailService->sendEmail('mail.registercompany', 'Welcome to our platform', $data);
            return redirect()->route('login')->with('success', 'Your account has been created successfully. Please login to continue.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function logout(): RedirectResponse
    {
        try {
            $this->userServices->logout();
            return redirect()->route('login')->with('success', 'You have been logged out successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteAccount(Request $request): RedirectResponse
    {
        try {
            $this->userServices->deleteUserAccount(auth()->id());
            auth()->logout();
            return redirect()->route('login')->with('success', 'Your account has been deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the user profile.
     */
    public function userProfile()
    {
        try {
            $user = $this->userServices->getUser(auth()->id());
            return view('profile', compact('user'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Update the user profile.
     */
    public function uploadimg(ImageRequest $request) : RedirectResponse
    {
        try {
            if ($request->hasFile('profile_image')) {
                $image = $request->file('profile_image');
                $this->userServices->userImgUpload($image, auth()->id());
                return redirect()->back()->with('success', 'Image uploaded successfully.');

            }
            return redirect()->back()->withErrors(['profile_image' => 'Please select an image to upload.']);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
