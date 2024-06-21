<?php

namespace App\Repositories;

use App\Interfaces\UserTaskInterface;
use App\Models\UserTaskList;
use Illuminate\Database\Eloquent\Collection;

/**
 * Summary of UserTaskRepositories
 */
class UserTaskRepositories extends BaseRepositories implements UserTaskInterface
{
    /**
     * Summary of model
     * @var
     */
    protected $model;

    /**
     * Summary of __construct
     * @param \App\Models\UserTaskList $model
     */
    public function __construct(UserTaskList $model)
    {
        $this->model = $model;
    }

    /**
     * Create a new task.
     *
     * @param array $data
     * @return UserTaskList
     */
    public function createTask(array $data): UserTaskList
    {
        return $this->model->create($data);
    }

    /**
     * Get all tasks by user ID.
     *
     * @param int $userId
     * @return Collection
     */
    public function getAllTasksByUserId(int $userId): Collection
    {
        return $this->model->where('user_id', $userId)->get();
    }

    /**
     * Find a task by UUID.
     *
     * @param string $uuid
     */
    public function findTaskByUuid(string $uuid)
    {
        return $this->findByUuid($uuid);
    }

    /**
     * Update a task by UUID.
     *
     * @param string $uuid
     * @param array $data
     * @return bool
     */
    public function updateTaskByUuid(string $uuid, array $data): bool
    {
        return $this->updateByUuid($data, $uuid);
    }

    /**
     * Delete a task by UUID.
     *
     * @param string $uuid
     * @return bool
     */
    public function deleteTaskByUuid(string $uuid): bool
    {
        return $this->deleteByUuid($uuid);
    }

    /**
     * Update task status by UUID.
     *
     * @param string $uuid
     * @param string $status
     * @return bool
     */
    public function updateTaskStatusByUuid(string $uuid, string $status): bool
    {
        return $this->updateByUuid(['status' => $status], $uuid);
    }
}
