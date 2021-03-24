<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mark extends Model
{
    use  SoftDeletes;
    /**
     * guarded variable
     
     * @var array
     */
    protected $guarded = [];
    /**
     * $table variable
     *
     * @var string
     */
    

    protected $table = "students_marks";
    public function student()
    {
        return $this->belongsTo(Students::class,'student_id');
    }

}
