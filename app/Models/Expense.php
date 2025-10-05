<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    public $guarded = [];

    // Relacionamento com Budget
    public function budget()
    {
        return $this->belongsTo(Budget::class);
    }

    // Relacionamento com ProductSupplier
    public function productSupplier()
    {
        return $this->belongsTo(ProductSupplier::class);
    }
}
