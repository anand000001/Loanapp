<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    protected $fillable = [
         'agent_name',
         'agent_code',
         'city_list',
         'user_id',
         'password',
    ];

    public function city()
    {
        return $this->belongsTo(City::class, 'city_list', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function personalloans()
    {
        return $this->hasMany(Personalloan::class, 'agent_id');
    }

}
