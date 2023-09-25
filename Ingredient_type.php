<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ingredient_type extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'ingredient_types'; // กำหนดชื่อตาราง
    protected $primaryKey = 'id'; // กำหนด Primary Key

    public function ingredientLists()
    {
        return $this->hasMany(Ingredient_list::class);
    }
}
