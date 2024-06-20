<?php
namespace App\Services;

use App\Interfaces\UserInterface;
use Auth;
use Session;

class UserServices
{

    protected $userInterface;

    public function __construct(UserInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }

    /**
     * Summary of getAllUsers
     */
    public function createUser(array $data)
    {

        return $this->userInterface->createUser($data);
    }

    /**
     * Summary of getAllUsers
     */
    public function authenticate(array $credentials)
    {
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            Session::put('user_name', $user->name);
            return true;
        }
        return false;
    }


    /**
     * Summary of logout
     */
    public function logout()
    {
        Auth::logout();
        Session::forget('user_name');
    }


    /**
     * Summary of getAllUsers
     */
    public function deleteUserAccount($id)
    {
        $this->userInterface->deleteUserAccount($id);
    }

    /**
     * Summary of getAllUsers
     */
    public function getUser($id)
    {
        return $this->userInterface->getUser($id);
    }

    /**
     * Summary of imgUpload
     */
    public function userImgUpload($image, $id)
    {
        $fileNameToStore = 'logo_' . time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public/logo', $fileNameToStore);
        $image = $fileNameToStore;
        return $this->userInterface->imgUpload($image, $id);
    }

}
