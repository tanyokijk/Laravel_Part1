<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', // Додайте сюди 'name', якщо це атрибут, який ви хочете дозволити для масового присвоєння
    ];
}
