<?php
namespace App\Interfaces;

interface BaseRepositoriesInterface
{

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * @param array $data
     * @return mixed
     */
    public function deleteByUuid(string $uuid): bool;

    /**
     * @param array $data
     * @return mixed
     */
    public function updateByUuid(array $data, string $uuid);

    /**
     * @param array $data
     * @return mixed
     */
    public function findByUuid(string $uuid);

    /**
     * @param array $data
     * @return mixed
     */
    public function getAllId(int $id);
}
