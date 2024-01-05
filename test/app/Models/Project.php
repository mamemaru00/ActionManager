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
        'user_id',
        'trading_company_id',
        'sales_in_charge',
        'order_amount',
        'order_date',
        'status',
        'created_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tradingCompany() 
    {
        return $this->belongsTo(TradingCompany::class);
    }
}
