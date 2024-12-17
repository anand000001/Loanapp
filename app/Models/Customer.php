<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'whatsapp_number',
        'aadhaar_number',
        'created_by',
        'permanent_address',
        'current_address',
        'gender',
        'marital_status',
        'education',
        'job_status',
        'profession',
        'income',
        'permanent_city',
        'permanent_state',
        'current_city',
        'current_state',
        'kyc_status',
    ];

    public function personalloans()
    {
        return $this->hasMany(Personalloan::class, 'customer_id');
    }
}
