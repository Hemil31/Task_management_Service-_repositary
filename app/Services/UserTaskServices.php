<?php

namespace App\Services;

use App\Interfaces\UserTaskInterface;

class UserTaskServices
{
    protected UserTaskInterface $userTaskInterface;

    public function __construct(UserTaskInterface $userTaskInterface)
    {
        $this->userTaskInterface = $userTaskInterface;
    }

    /**
     * Create a new task.
     *
     * @param array $data
     * @return mixed
     */
    public function createTask(array $data)
    {
        return $this->userTaskInterface->createTask($data);
    }

    /**
     * Get all tasks by user ID.
     *
     * @param int $userId
     * @return mixed
     */
    public function getAllTasksByUserId(int $userId)
    {
        return $this->userTaskInterface->getAllTasksByUserId($userId);
    }

    /**
     * Find a task by UUID.
     *
     * @param string $uuid
     * @return mixed
     */
    public function findTaskByUuid(string $uuid)
    {
        return $this->userTaskInterface->findTaskByUuid($uuid);
    }

    /**
     * Update a task by UUID.
     *
     * @param string $uuid
     * @param array $data
     * @return mixed
     */
    public function updateTask(string $uuid, array $data)
    {
        return $this->userTaskInterface->updateTaskByUuid($uuid, $data);
    }

    /**
     * Delete a task by UUID.
     *
     * @param string $uuid
     * @return mixed
     */
    public function deleteTask(string $uuid)
    {
        return $this->userTaskInterface->deleteTaskByUuid($uuid);
    }

    /**
     * Update task status by UUID.
     *
     * @param string $uuid
     * @param string $status
     * @return mixed
     */
    public function updateTaskStatus(string $uuid, string $status)
    {
        return $this->userTaskInterface->updateTaskStatusByUuid($uuid, $status);
    }
}
