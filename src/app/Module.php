<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $table = 'modules';
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

    public function scores(){
        return $this->belongsToMany(Score::class, 'module_score', 'module_id', 'score_id')->using(ModuleScore::class);
    }

    public function classes(){
        return $this->belongsToMany(Classes::class, 'module_class', 'module_id', 'class_id')->using(ModuleClass::class);
    }

}
