<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $table="item_details";
    public function group_master()
    {
        return $this->hasMany(Machine::class);
    }
}
