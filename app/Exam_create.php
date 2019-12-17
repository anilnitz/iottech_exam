<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam_create extends Model
{
    protected $fillable=['type_id','exam_name','exam_des','from_exam','to_exam','current_date'];
    public function exam_type()
    {
        return $this->belongsTo('App\Exam_type','exam_type_id');
    }
    /*public function exam_term()
    {
    	return $this->belongsTo('App\Exam_term','term_id');
    }*/
}
