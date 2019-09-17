<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $table = 'classes';
    protected $primaryKey = 'class_id';
    public $timestamps = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'pivot'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subject','room'
    ];  

    public function users(){
        return $this->belongsToMany(User::class, 'class_user', 'class_id', 'user_id')->using(ClassUser::class);
    }

    public function scores(){
        return $this->hasMany(Score::class, 'class_id', 'class_id');
    }

}
