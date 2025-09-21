<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BudgetStatus extends Model
{
    protected $guarded = [];

    const STATUS_OPEN = 1;
    const STATUS_SENT = 2;
    const STATUS_PENDING = 3;
    const STATUS_REJECTED = 4;
    const STATUS_APPROVED = 5;
    const STATUS_IN_PROCESS = 6;
    const STATUS_COMPLETED = 7;


    public static function getStatusOptions()
    {
        return [
            self::STATUS_OPEN => 'Abierto',
            self::STATUS_SENT => 'Enviado',
            self::STATUS_PENDING => 'Pendiente',
            self::STATUS_REJECTED => 'Rechazado',
            self::STATUS_APPROVED => 'Aprobado',
            self::STATUS_IN_PROCESS => 'En proceso',
            self::STATUS_COMPLETED => 'Finalizado',
        ];
    }

    public function getStatusClassesAttribute()
    {
        return match ($this->status) {
            self::STATUS_OPEN       => 'bg-gray-100 border-gray-300',
            self::STATUS_SENT       => 'bg-blue-100 border-blue-300',
            self::STATUS_PENDING    => 'bg-yellow-100 border-yellow-300',
            self::STATUS_REJECTED   => 'bg-red-100 border-red-300',
            self::STATUS_APPROVED   => 'bg-green-100 border-green-300',
            self::STATUS_IN_PROCESS => 'bg-purple-100 border-purple-300',
            self::STATUS_COMPLETED  => 'bg-emerald-100 border-emerald-300',
            default                 => 'bg-gray-100 border-gray-200',
        };
    }

    public function getStatusLabelAttribute()
    {
        return self::getStatusOptions()[$this->status] ?? 'Unknown';
    }

    public function budget()
    {
        return $this->belongsTo(Budget::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'changed_by'); // Supondo que 'changed_by' seja o campo que armazena o ID do usuário
    }
}
