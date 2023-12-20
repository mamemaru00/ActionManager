<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TradingCompany extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'trading_company_name',
        'trading_company_manager_name',
        'trading_company_tel'
    ];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
