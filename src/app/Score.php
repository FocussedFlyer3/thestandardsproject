<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    //
    protected $table = 'scores';
    protected $primaryKey = 'score_id';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'pivot',
        'created_at',
        'updated_at',
        'class_id'
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function classes(){
        return $this->belongsTo(Classes::class, 'class_id', 'class_id');
    }

    public function modules(){
        return $this->belongsToMany(Module::class, 'module_score', 'score_id', 'module_id')->using(ModuleScore::class);
    }

}
