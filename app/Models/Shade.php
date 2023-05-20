<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shade extends Model
{
    use HasFactory;

    protected $table="tbl_shade";

    public function master_name_master()
    {
        return $this->hasMany(Master::class);
    }
}
