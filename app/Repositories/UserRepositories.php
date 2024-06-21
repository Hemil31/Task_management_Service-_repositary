<?php

namespace App\Repositories;

use App\Interfaces\UserInterface;
use App\Models\User;

/**
 * Summary of UserRepositories
 */
class UserRepositories  extends BaseRepositories implements UserInterface
{
    /**
     * Summary of user
     * @var User
     */
    protected User $user;

    /**
     * Summary of __construct
     * @param \App\Models\User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Create a new user.
     *
     * @param array $data
     * @return User
     */
    public function createUser(array $data): User
    {
        return $this->user->create($data);
    }

    /**
     * Delete a user account by ID.
     *
     * @param int $id
     * @return bool
     */
    public function deleteUserAccount(int $id): bool
    {
        return $this->user->findOrFail($id)->delete();
    }

    /**
     * Get a user by ID.
     *
     * @param int $id
     * @return User|null
     */
    public function getUser(int $id): ?User
    {
        return $this->user->find($id);
    }

    /**
     * Upload a user image by ID.
     *
     * @param string $image
     * @param int $id
     * @return User
     */
    public function imgUpload(string $image, int $id): User
    {
        $user = $this->user->findOrFail($id);
        $user->image = $image;
        $user->save();
        return $user;
    }

    /**
     * Get the old image file name by ID.
     *
     * @param int $id
     */
    public function getOldImageFileName(int $id)
    {
        return $this->user->findOrFail($id)->image;
    }
}
