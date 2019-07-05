<?php

namespace App\Repositories\User;

use App\Repositories\EloquentRepository;

class UserRepository extends EloquentRepository
{
    public function getModel()
    {
        return \App\User::class;
    }

    public function changePassword($id, $password, $active)
    {
        $userUpdate = [];
        $user = $this->_model->find($id);
        $userUpdate['password'] = bcrypt($password);
        $userUpdate['active'] = $active;
        $user->update($userUpdate);
        return $user;
    }

    public function resetPassword($id, $password)
    {
        $userUpdate = [];
        $user = $this->_model->find($id);
        $userUpdate['password'] = bcrypt($password);
        $userUpdate['active'] = 'new';
        $user->update($userUpdate);
        return $user;
    }

    public function findAccountExceptById($id)
    {
        $user = $this->_model->where('id', '!=', $id)->get();
        return $user;
    }
}
