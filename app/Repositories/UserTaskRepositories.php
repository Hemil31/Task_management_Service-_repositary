<?php
namespace App\Repositories;

use App\Interfaces\UserTaskInterface;
use App\Models\UserTaskList;

class UserTaskRepositories extends BaseRepositories implements UserTaskInterface
{
    protected $model;
    public function __construct(UserTaskList $model)
    {
        $this->model = $model;
    }

    /**
     * Summary of createTask
     */
    public function createTask(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * Summary of getAllTasksByUserId
     */
    public function getAllTasksByUserId(int $userId)
    {
        return $this->model->where('user_id', $userId)->get();
    }

    /**
     * Summary of findTaskById
     */
    public function findTaskByUuid(string $uuid)
    {
        return $this->model->where('uuid', $uuid)->firstOrFail();
    }


    /**
     * Summary of updateTask
     */
    public function updateTask(string $id, array $data)
    {
        return $this->model->find($id)->update($data);
    }

    /**
     * Summary of deleteTask
     */
    public function deleteTask(int $id)
    {
        return $this->model->find($id)->delete();
    }

    /**
     * Summary of updateTaskStatus
     */
    public function updateTaskStatus(int $id, string $status)
    {
        return $this->model->find($id)->update(['status' => $status]);
    }





}
