<?php
namespace App\Repositories;

use App\Interfaces\BaseRepositoriesInterface;
use Illuminate\Database\Eloquent\Model;

class BaseRepositories implements BaseRepositoriesInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Summary of create
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * Summary of getAll
     */
    public function deleteByUuid(string $uuid): bool
    {
        return $this->model->where('uuid', $uuid)->delete();
    }

    /**
     * Summary of updatebyuuid
     */
    public function updateByUuid(array $data, $uuid)
    {
        return $this->model->where('uuid', $uuid)->update($data);
    }


    /**
     * Summary of getByUuid
     */
    public function findByUuid(string $uuid)
    {
        return $this->model->where('uuid', $uuid)->first();
    }

    /**
     * Summary of getAllId
     */
    public function getAllId(int $id)
    {
        return $this->model->where('user_id', $id);
    }
}
