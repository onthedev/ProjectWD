<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class time_attendance extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'time_attendances';
    public function personnel()
    {
        return $this->belongsTo(Personnel::class, 'employee_id', 'emp_id');
    }
}
