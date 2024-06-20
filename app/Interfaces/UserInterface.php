<?php
namespace App\Interfaces;

interface UserInterface
{
    /**
     * Summary of createUser
     */
    public function createUser(array $data);

    /**
     * Summary of deleteUserAccount
     */
    public function deleteUserAccount($id);

    /**
     * Summary of getUser
     */
    public function getUser($id);

    /**
     * Summary of imageUpload
     */
    public function imgUpload($image , $id);

}
