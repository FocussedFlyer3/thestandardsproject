<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Standardized extends Model
{
    //
    protected $table = 'standardized';
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

    public function modules(){
        return $this->belongsToMany(Module::class, 'module_standardized', 'standardized_id', 'module_id')->using(ModuleStandardized::class);
    }

}
