<?php

namespace App\Repositories;
use App\Models\User;

/**
 * Summary of UserRepositories
 */
class UserRepositories  extends BaseRepositories
{
    /**
     * Summary of __construct
     */
    public function __construct(User $user)
    {
        $this->model = $user;
    }
}
