<?php
namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class BaseRepositories
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
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
        return $this->model->where('uuid', $uuid)->firstOrFail();
    }
}
