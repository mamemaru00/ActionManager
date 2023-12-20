<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_code',
        'project_name',
        'manager_code',
        'manager_name',
        'sales_in_charge',
        'order_amount',
        'order_date',
        'status',
        'created_at'
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'manager_code', 'manager_code');
    }

    public function tradingCompany() 
    {
        return $this->belongsTo(TradingCompany::class);
    }
}
