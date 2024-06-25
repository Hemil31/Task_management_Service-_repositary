<?php

namespace App\Repositories;

use App\Models\UserTaskList;

/**
 * Summary of UserTaskRepositories
 */
class UserTaskRepositories extends BaseRepositories
{

    /**
     * Summary of __construct
     */
    public function __construct(UserTaskList $model)
    {
        $this->model = $model;
    }

}
