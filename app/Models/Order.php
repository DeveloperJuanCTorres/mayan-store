<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'telefono',
        'email',
        'direccion',
        'departamento',
        'distrito',
        'referencia',
        'total',
        'pdf'
    ];
}
