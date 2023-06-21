<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\User;

class Office extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'office_code',
        'office_name',
    ];

    //Userに紐付け
    // public function User(): BelongsToMany
    // {
    //     // return $this->belongsTo('App\Models\Office');
    //     // return $this->belongsToMany(User::class);
    //     return $this->belongsToMany(Office::class, 'offices_users', 'user_id', 'office_id');
    // }

    public function users()
    {
        return $this->belongsToMany(User::class, 'affiliation_office', 'office_id');
    }
}
