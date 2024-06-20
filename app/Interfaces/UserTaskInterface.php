<?php
namespace App\Interfaces;

/**
 * Summary of UserTaskInterface
 */
interface UserTaskInterface
{
    /**
     * Summary of getAllTasksByUserId
     */
    public function getAllTasksByUserId(int $userId);

    /**
     * Summary of createTask
     */
    public function createTask(array $data);

    /**
     * Summary of updateTask
     */
    public function updateTaskByUuid(string $uuid, array $data);

    /**
     * Summary of deleteTask
     */
    public function deleteTaskByUuid(string $uuid);

    /**
     * Summary of updateTaskStatus
     */
    public function updateTaskStatusByUuid(string $uuid,string $status);

    /**
     * Summary of findTaskByUuid
     */
    public function findTaskByUuid(string $id);
}
