<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupLoan extends Model
{
    use HasFactory;
    // In app/Models/GroupLoan.php
protected $table = 'grouploans';

    protected $fillable = [
        'group_id',
        'leader_name',
        'leader_number',
        'teamlead_name',
        'teamlead_number',
        'totalgroup_member',
        'loan_amount',
        'intrest_rate',
        'type',
        'collected_amount',
        'duration',
        'disburse_rate',
        'agent_id',
    ];

    // Relationship with Group
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
