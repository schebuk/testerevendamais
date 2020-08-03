<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cep extends Model
{
     protected $fillable = [
        'bairro',
        'cep',
        'cidade',
        'logradouro',
        'uf',
    ];
}
