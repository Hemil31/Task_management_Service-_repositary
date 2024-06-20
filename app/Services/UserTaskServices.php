<?php
namespace App\Services;

use App\Interfaces\UserTaskInterface;


class UserTaskServices
{
    protected $userTaskInterface;

    public function __construct(UserTaskInterface $userTaskInterface)
    {
        $this->userTaskInterface = $userTaskInterface;
    }



    /**
     * Summary of createTask
     */
    public function createTask(array $data)
    {

        return $this->userTaskInterface->createTask($data);
    }

    /**
     * Summary of getAllTasksByUserId
     */
    public function getAllTasksByUserId(int $userId)
    {
        return $this->userTaskInterface->getAllTasksByUserId($userId);
    }

    /**
     * Summary of findTaskByUuid
     */
    public function findTaskByUuid(string $id)
    {
        return $this->userTaskInterface->findTaskByUuid($id);
    }

    /**
     * Summary of updateTask
     */
    public function updateTask(string $id, array $data)
    {
        return $this->userTaskInterface->updateTask($id, $data);
    }

    /**
     * Summary of deleteTask
     */
    public function deleteTask(int $id)
    {
        return $this->userTaskInterface->deleteTask($id);
    }

    /**
     * Summary of updateTaskStatus
     */
    public function updateTaskStatus(int $id, string $status)
    {
        return $this->userTaskInterface->updateTaskStatus($id, $status);
    }

}
