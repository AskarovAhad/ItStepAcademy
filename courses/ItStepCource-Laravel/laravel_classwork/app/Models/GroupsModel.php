<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupsModel extends Model
{
    use HasFactory;


     // Таблица БД, ассоциированная с моделью.
    protected $table = 'groups_table';


    // Следует ли обрабатывать временные метки модели.
    public $timestamps = false;


}
