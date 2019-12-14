<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam_term extends Model
{
    protected $fillable=['term_name','description','current_date'];
    public function type()
    {
        return $this->hasMany('App\Exam_term','term_id');
    }
}
