<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Email extends Model
{
    protected $guarded = [];


    public function customer():BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function budget():BelongsTo
    {
        return $this->belongsTo(Budget::class, 'budget_id', 'id');
    }
}
