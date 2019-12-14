<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam_type extends Model
{
    protected $fillable=['term_id','type_name','description','current_date'];
    public function exam_term()
    {
        return $this->belongsTo('App\Exam_term','term_id');
    }
}
