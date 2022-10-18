<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable = ["Nombre","Marca","Descripcion","Stock"];
    protected $attributes = [
        'Stock' => 0
    ];
}
