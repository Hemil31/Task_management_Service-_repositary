<?php
namespace App\Interfaces;

/**
 * Summary of UserInterface
 */
interface UserInterface
{
    /**
     * Summary of createUser
     */
    public function createUser(array $data);

    /**
     * Summary of deleteUserAccount
     */
    public function deleteUserAccount(int $id);

    /**
     * Summary of getUser
     */
    public function getUser(int $id);

    /**
     * Summary of imageUpload
     */
    public function imgUpload(string $image ,int $id);

    /**
     * Summary of getOldImageFileName
     */
    public function getOldImageFileName(int $id);

}
