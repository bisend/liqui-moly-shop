<?php

namespace App\DatabaseModels;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property bool $active
 * @property string|null $code_1c
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\User whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\User whereCode1c($value)
 * @property string|null $confirmation_token
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\User whereConfirmationToken($value)
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email', 
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 
        'remember_token',
    ];
}
