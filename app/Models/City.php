<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable = ['city_name', 'city_code'];

    public function agents()
    {
        return $this->hasMany(Agent::class, 'city_list', 'id');
    }
}
