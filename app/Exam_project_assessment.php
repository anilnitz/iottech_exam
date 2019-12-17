<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam_project_assessment extends Model
{
    protected $fillable=['assessment_types_id','exam_description','from_exam','to_exam','current_date'];
    public function project_assessment_type()
    {
        return $this->belongsTo('App\Exam_project_assessment_type','assessment_types_id');
    }
}
