<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';
    protected $primaryKey = 'id';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'pivot',
        'created_at',
        'updated_at'
    ];

    public function users(){
        return $this->belongsToMany(User::class, 'task_user', 'task_id', 'user_id')->withPivot('task_id', 'score_id')->using(TaskUser::class);
    }

    public function scores(){
        return $this->belongsToMany(Score::class, 'task_user', 'task_id', 'score_id')->using(TaskUser::class);
    }
}
