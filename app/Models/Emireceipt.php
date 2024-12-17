<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emireceipt extends Model
{
    use HasFactory;
    protected $table = 'emireceipts';
    protected $primarykey ='id';
    protected $fillable = [
        'name',
        'mobile_number',
        'whatsapp_number',
        'address',
        'emi_amount',
        'payment_slip',
        'paid_emi_amount',
        'loan_amount',
        'date_of_collect',
        'last_date_collect',
        'status',
    ];    
}
