<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emi extends Model
{
    use HasFactory;
    protected $table = 'emi_tables';
    protected $fillable = [
        'name',
        'mobile',
        'loan_amount',
        'collection_type',
        'date_of_collect',
        'emi_number',
        'emi_amount',
        'paid_emi_amount',
        'remaining_amount',
        'status',
    ];
}
