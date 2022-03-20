<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

//     public static function boot()
//     {
//     parent::boot();

//     static::creating(function($model) {
//     $model->subCategoryCode = str_pad($model->getKey(), 4, '0', STR_PAD_LEFT);
//     });
//     }
}
