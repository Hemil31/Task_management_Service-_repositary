<?php

namespace App\Services;

use App\Enums\Status;
use App\Interfaces\UserTaskInterface;
use App\Repositories\UserTaskRepositories;

class UserTaskServices
{
    protected $userTaskRepositories;

    public function __construct(UserTaskRepositories $userTaskRepositories)
    {
        $this->userTaskRepositories = $userTaskRepositories;
    }

    /**
     * Create a new task.
     *
     * @param array $data
     * @return mixed
     */
    public function createTask(array $data)
    {
        return $this->userTaskRepositories->create($data);
    }

    /**
     * Get all tasks by user ID.
     *
     * @param int $userId
     * @return mixed
     */
    public function getAllTasksByUserId(int $userId)
    {
        return $this->userTaskRepositories->getAllId($userId);
    }

    /**
     * Find a task by UUID.
     *
     * @param string $uuid
     * @return mixed
     */
    public function findTaskByUuid(string $uuid)
    {
        return $this->userTaskRepositories->findByUuid($uuid);
    }

    /**
     * Update a task by UUID.
     *
     * @param string $uuid
     * @param array $data
     * @return mixed
     */
    public function updateTask(array $data, string $uuid)
    {
        return $this->userTaskRepositories->updateByUuid($data,$uuid);
    }

    /**
     * Delete a task by UUID.
     *
     * @param string $uuid
     * @return mixed
     */
    public function deleteTask(string $uuid)
    {
        return $this->userTaskRepositories->deleteByUuid($uuid);
    }
}
