<?php
namespace App\Interfaces;

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
    public function updateTask(string $id, array $data);

    /**
     * Summary of deleteTask
     */
    public function deleteTask(int $id);

    /**
     * Summary of updateTaskStatus
     */
    public function updateTaskStatus(int $id, string $status);

    /**
     * Summary of findTaskByUuid
     */
    public function findTaskByUuid(string $id);

}
