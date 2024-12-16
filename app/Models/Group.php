<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Group extends Model
{
    use HasFactory;
    protected $table = 'groups';
    protected $fillable = [
        'group_name',
        'group_leadername',
        'group_leadernumber',
    ];

    // Relationship with GroupLoan
    public function groupLoans()
    {
        return $this->hasMany(GroupLoan::class);
    }
}
