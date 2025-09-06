<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Freelancer extends Model
{
    protected $guarded = [];

    // Campos que devem ser tratados como datas
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // Casts de campos
    protected $casts = [
        'status' => 'boolean', // 1 = ativo, 0 = inativo
    ];

}
