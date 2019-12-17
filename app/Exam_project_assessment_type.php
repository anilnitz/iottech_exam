<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam_project_assessment_type extends Model
{
    protected $fillable=['type_name','current_date'];
    public function project_assessment()
    {
        return $this->hasMany('App\Exam_project_assessment','assessment_types_id');
    }
}
