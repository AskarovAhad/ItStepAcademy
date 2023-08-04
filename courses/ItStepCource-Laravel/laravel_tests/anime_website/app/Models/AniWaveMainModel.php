<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AniWaveMainModel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'main_page';
}
