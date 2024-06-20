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
     * Summary of create
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }


    /**
     * Summary of update
     */
    public function update(array $data, $id)
    {
        return $this->model->find($id)->update($data);
    }


    /**
     * Summary of delete
     */
    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }

    /**
     * Summary of getAll
     */
    public function show($id)
    {
        return $this->model->find($id);
    }

}
