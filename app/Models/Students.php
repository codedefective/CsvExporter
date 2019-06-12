<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Students extends Model
{
    
    protected $table = 'student';

   


    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function address()
    {

        return $this->hasOne(StudentAddresses::class, 'id','address_id');

    }
}
