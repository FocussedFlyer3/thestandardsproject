<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','username', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'api_token', 'email_verified_at', 'pivot', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime'
    ];

    public function classes(){
        return $this->belongsToMany(Classes::class, 'class_user', 'user_id', 'class_id')->using(ClassUser::class);
    }

    public function scores(){
        return $this->hasMany(Score::class,'user_id', 'id');
    }

    public function tasks(){
        return $this->belongsToMany(Task::class, 'task_user', 'user_id', 'task_id')->using(TaskUser::class);
    }

}
