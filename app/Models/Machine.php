<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    use HasFactory;
    protected $table="machine_master";

    public function mc_category()
    {
        return $this->hasMany(Machine::class);
    }

}
