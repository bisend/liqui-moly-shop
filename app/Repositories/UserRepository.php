<?php

namespace App\Repositories;

use App\DatabaseModels\User;

/**
 * Class UserRepository
 * @package App\Repositories
 */
class UserRepository
{
    /**
     * @var bool
     */
    public $isUserExists = false;

    /**
     * @var bool
     */
    public $isEmailChanged = false;

    /**
     * @param $email
     * @param $username
     */
    public function createUser($email, $username)
    {
        $user = new User();
        $user->name = $username;
        $user->email = $email;
        $user->save();
    }

    /**
     * @param $email
     * @return bool
     */
    public function checkIfUserExists($email)
    {
        if (User::whereEmail($email)->count() > 0)
        {
            $this->isUserExists = true;
        }
        
        return $this->isUserExists;
    }

    /**
     * @param $email
     * @return mixed
     */
    public function getUserByEmail($email)
    {
        return User::whereEmail($email)->first();
    }

    /**
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function getUserByAuth()
    {
        return auth()->user();
    }

    /**
     * @param $email
     * @return bool
     */
    public function checkIfEmailChanged($email)
    {
        $user = auth()->user();
        
        if ($user->email != $email)
        {
            $this->isEmailChanged = true;
            return $this->isEmailChanged;
        }
        
        return $this->isEmailChanged;
    }

    /**
     * @param $email
     */
    public function setNewEmail($email)
    {
        $user = auth()->user();
        
        $user->new_email = $email;
        
        $user->save();
    }

    /**
     * @param $name
     */
    public function setUserName($name)
    {
        $user = auth()->user();

        $user->name = $name;

        $user->save();
    }

    /**
     * @param $user
     * @param $newPassword
     */
    public function changePassword($user, $newPassword)
    {
        $user->password = bcrypt($newPassword);
        
        $user->save();
    }
}