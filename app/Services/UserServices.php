<?php

namespace App\Services;

use App\Repositories\UserRepositories;
use Auth;
use Session;
use Illuminate\Support\Facades\Storage;

class UserServices
{
    protected $userRepositories;

    public function __construct(UserRepositories $userRepositories)
    {
        $this->userRepositories = $userRepositories;
    }

    /**
     * Create a new user.
     *
     * @param array $data
     * @return mixed
     */
    public function createUser(array $data)
    {
        return $this->userRepositories->create($data);
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
            Session::put('user_info', [
                'name' => $user->name,
                'uuid' => $user->uuid,
                'id' => $user->id,
            ]);
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
     */
    public function deleteUserAccount(string $uuid): bool
    {
        return $this->userRepositories->deleteByUuid($uuid);
    }

    /**
     * Get a user by ID.
     *
     * @param int $id
     * @return mixed
     */
    public function getUser(string $uuid)
    {
        return $this->userRepositories->findByUuid($uuid);
    }

    /**
     * Upload a user image by ID.
     *
     * @param mixed $image
     * @param int $id
     * @return mixed
     */
    public function userImgUpload($image, $uuid)
    {
        $fileNameToStore = 'logo_' . time() . '.' . $image->getClientOriginalExtension();
        $path = $image->storeAs('public/logo', $fileNameToStore);
        if (!$path) {
            return false;
        }
        $data = ['image' => $fileNameToStore];
        $oldFileName = $this->userRepositories->findByUuid($uuid)->image;
        $updateResult = $this->userRepositories->updateByUuid($data, $uuid);
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
