<?php

namespace App\Repositories;

use App\DatabaseModels\User;

/**
 * Class UserRepository
 * @package App\Repositories
 */
class UserRepository
{
    public $isUserExists = false;
    
    public function createUser($email, $username)
    {
        $user = new User();
        $user->name = $username;
        $user->email = $email;
        $user->save();
    }

    public function checkIfUserExists($email)
    {
        if (User::whereEmail($email)->count() > 0)
        {
            $this->isUserExists = true;
        }
        
        return $this->isUserExists;
    }

    public function getUserByEmail($email)
    {
        return User::whereEmail($email)->first();
    }
}