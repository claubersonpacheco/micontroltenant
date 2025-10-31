<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Budget extends Model
{
    protected $guarded = [];

    protected $casts = [
        'date' => 'date',
        'expirate' => 'date',
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function customer():BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function products():HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(BudgetItem::class);
    }

    public function filters():HasOne
    {
        return $this->hasOne(BudgetFilter::class);
    }

//    public function budgetsendemail():HasMany
//    {
//        return $this->hasMany(BudgetEmailSend::class);
//    }

    protected static function booted()
    {
        static::created(function ($budget) {
            \App\Models\BudgetStatus::create([
                'budget_id' => $budget->id,
                'status' => \App\Models\BudgetStatus::STATUS_OPEN, // Aberto
                'changed_by' => auth()->id() ?? null,
            ]);
        });
    }


    public function status()
    {
        return $this->hasMany(BudgetStatus::class);
    }

        public function latestStatus()
    {
        return $this->hasOne(BudgetStatus::class)->latestOfMany();
    }

    // Um budget pode ter vários gastos
    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }

    public function summary()
    {
        return $this->hasOne(BudgetTotal::class);
    }

    public function updateSummary()
    {
        BudgetTotalService::updateTotals($this->id);
    }

    public function entries()
    {
        return $this->hasMany(Entry::class);
    }

}
