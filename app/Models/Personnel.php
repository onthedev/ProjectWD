<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function person_addr(){
        return $this->belongsTo(personnel::class);
    }
    public function time_attendances()
    {
        return $this->hasMany(time_attendances::class, 'emp_id', 'emp_id');
    }
}
