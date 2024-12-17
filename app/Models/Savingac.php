<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Savingac extends Model
{
    use HasFactory;
    protected $table = 'savingacs';
    protected $primarykey ='id';
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'whatsapp_number',
        'amount',
        'account_request_date',
        'create_account_date',
        'status',
    ];
}
