<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BudgetTotal extends Model
{
    protected $guarded = [];

    public function budget()
    {
        return $this->belongsTo(Budget::class);
    }
}
