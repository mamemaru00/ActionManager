<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Office extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'office_code',
        'office_name',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'affiliation_office', 'office_id');
    }
}
