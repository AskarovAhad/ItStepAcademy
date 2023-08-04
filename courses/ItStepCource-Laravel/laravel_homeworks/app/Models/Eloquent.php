<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eloquent extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'HW_28_04_23_table';
}
