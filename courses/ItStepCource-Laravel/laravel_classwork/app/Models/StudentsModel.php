<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentsModel extends Model
{
    use HasFactory;


     // Таблица БД, ассоциированная с моделью.
    protected $table = 'students_table';


    // Следует ли обрабатывать временные метки модели.
    public $timestamps = false;


     /**
     * Получить группы, связанный с студентом.
     */
    public function group()
    {
        return $this->hasOne(GroupsModel::class, 'id', 'group_id');
    }



}
