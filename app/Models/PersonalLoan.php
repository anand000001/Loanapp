<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalLoan extends Model
{
    use HasFactory;

    protected $table = 'personalloans';

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

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class, 'agent_id');
    }

}
