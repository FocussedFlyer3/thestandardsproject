<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    /* 
    |--------------------------------------------------------------------------
    | Record model
    |--------------------------------------------------------------------------
    |
    | This model object serve as object for recorded module records
    |
    */
    protected $table = 'records';
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

    /**
     * The functions sets the relationship with score model
     *
     * @var array
     */
    public function scores(){
        return $this->belongsToMany(Score::class, 'score_record', 'record_id', 'score_id')->using(ScoreRecord::class);
    }

}
