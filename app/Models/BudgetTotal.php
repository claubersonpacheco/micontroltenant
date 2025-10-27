<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BudgetTotal extends Model
{
    protected $guarded = [];

    protected $casts = [
        'date' => 'date',
        'quantity' => 'integer',
        'tax' => 'integer',
        'total' => 'float',
        'total_tax' => 'float',
    ];

    public function budget()
    {
        return $this->belongsTo(Budget::class);
    }
}
