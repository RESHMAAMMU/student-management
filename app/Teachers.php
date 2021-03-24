<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
    
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
    

    protected $table = "teacher_list";

}
