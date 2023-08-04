<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsModel extends Model
{
    use HasFactory;


     // Таблица БД, ассоциированная с моделью.
    protected $table = 'products_table';


    // Следует ли обрабатывать временные метки модели.
    // public $timestamps = false;

    // поля "price_usd"
    public function getPriceUsdAttribute($value) // price_usd
    {
        $kurs = 11500;
        $price_sum = $this->price;
        $price_usd = round($price_sum / $kurs, 2);
        return $price_usd;
    }


    // поля "price_ruble"
    public function getPriceRubleAttribute($value) // price_usd
    {
        $kurs = 142;
        $price_sum = $this->price;
        $price_ruble = round($price_sum / $kurs, 2);
        return $price_ruble;
    }


    // Сохранить поля "price_usd"
    public function setPriceUsdAttribute($value)
    {
        $kurs = 11500;
        $price_usd = $value;
        $price_sum = $price_usd * $kurs;
        $this->attributes['price'] = $price_sum;
    }




}
