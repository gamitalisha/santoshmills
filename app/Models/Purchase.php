<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $table="purchase_entry";

    public function mc_category()
    {
        return $this->hasMany(Category::class);
    }

    public function group_master()
    {
        return $this->hasMany(Group::class);
    }

    public function item_detail()
    {
        return $this->hasMany(Item::class);
    }

    public function machine_master()
    {
        return $this->hasMany(Machine::class);
    }

    public function size_master()
    {
        return $this->hasMany(Size::class);
    }

    public function unit_master()
    {
        return $this->hasMany(Unit::class);
    }
}
