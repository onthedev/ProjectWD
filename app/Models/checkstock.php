<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class checkstock extends Model
{
    use HasFactory;
    protected $primaryKey = 'checkstock_id';
    public function Ingredient_names(){
        return $this->hasMany(order_detail::class);
    }
}
