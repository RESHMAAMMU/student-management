<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Students extends Model
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
    

    protected $table = "students";

    public function staff()
    {
        return $this->belongsTo(Teachers::class,'reporting_teacher');
    }

}
