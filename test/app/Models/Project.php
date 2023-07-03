<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Project extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'project_code',
        'project_name',
        'manager_code',
        'manager_name',
        'sales_in_charge',
        'order_amount',
        'order_date',
        'status'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

     /**
     * 更新処理
     */
    public function updateProject($request, $project)
    {
        $result = $project->fill([
            'status' => $request->status
        ])->save();

        return $result;
    }
}
