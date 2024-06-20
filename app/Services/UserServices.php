<?php

namespace App\Services;

use App\Interfaces\UserInterface;
use Auth;
use Session;
use Illuminate\Support\Facades\Storage;

class UserServices
{
    protected UserInterface $userInterface;

    public function __construct(UserInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }

    /**
     * Create a new user.
     *
     * @param array $data
     * @return mixed
     */
    public function createUser(array $data)
    {
        return $this->userInterface->createUser($data);
    }

    /**
     * Authenticate a user.
     *
     * @param array $credentials
     * @return bool
     */
    public function authenticate(array $credentials): bool
    {
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            Session::put('user_name', $user->name);
            return true;
        }
        return false;
    }

    /**
     * Logout the currently authenticated user.
     *
     * @return void
     */
    public function logout(): void
    {
        Auth::logout();
        Session::forget('user_name');
    }

    /**
     * Delete a user account by ID.
     *
     * @param int $id
     * @return void
     */
    public function deleteUserAccount(int $id): void
    {
        $this->userInterface->deleteUserAccount($id);
    }

    /**
     * Get a user by ID.
     *
     * @param int $id
     * @return mixed
     */
    public function getUser(int $id)
    {
        return $this->userInterface->getUser($id);
    }

    /**
     * Upload a user image by ID.
     *
     * @param mixed $image
     * @param int $id
     * @return mixed
     */
    public function userImgUpload($image, $id)
    {
        $fileNameToStore = 'logo_' . time() . '.' . $image->getClientOriginalExtension();
        $path = $image->storeAs('public/logo', $fileNameToStore);
        if (!$path) {
            return false;
        }
        $oldFileName = $this->userInterface->getOldImageFileName($id);
        $updateResult = $this->userInterface->imgUpload($fileNameToStore, $id);
        if ($updateResult) {
            if ($oldFileName) {
                Storage::delete('public/logo/' . $oldFileName);
            }
            return true;
        } else {
            return false;
        }
    }
}
