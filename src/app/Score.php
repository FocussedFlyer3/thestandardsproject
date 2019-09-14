<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    //
    protected $table = 'scores';
    protected $primaryKey = 'score_id';

    public function users(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function classes(){
        return $this->belongsTo(Classes::class, 'class_id', 'class_id');
    }

}
