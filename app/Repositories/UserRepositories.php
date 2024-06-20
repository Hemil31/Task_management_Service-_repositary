<?php
namespace App\Repositories;

use App\Interfaces\UserInterface;
use App\Models\User;
use App\Repositories\BaseRepositories;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserRepositories extends BaseRepositories implements UserInterface
{

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Summary of createUser
     */
    public function createUser(array $data)
    {
        return $this->user->create($data);
    }

    /**
     * Summary of deleteUserAccount
     */
    public function deleteUserAccount($id)
    {
        return $this->user->find($id)->delete();
    }

    /**
     * Summary of getUser
     */
    public function getUser($id){
        return $this->user->find($id);
    }

    /**
     * Summary of imageUpload
     */
    public function imgUpload($image, $id){
        $user = $this->user->find($id);
        $user->image = $image;
        $user->save();
        return $user;
    }
}
