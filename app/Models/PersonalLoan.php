<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalLoan extends Model
{
    use HasFactory;

    protected $table = 'personalloan';

    // Fillable fields
    protected $fillable = [
        'customer_id',
        'agent_id',
        'loan_amount',
        'interest_rate',
        'type',
        'collected_amount',
        'duration',
        'disburse_date',
        'total_amount',
        'total_interest',
        'next_emidate',
        'agent_code',
    ];
}
