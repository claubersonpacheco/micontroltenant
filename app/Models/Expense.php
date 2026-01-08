<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    public $guarded = [];

    protected $casts = [
        'date' => 'date',
        'invoice' => 'integer',
    ];

    // Relacionamento com Budget
    public function budget()
    {
        return $this->belongsTo(Budget::class);
    }

    // Relacionamento com ProductSupplier
    public function productSupplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
