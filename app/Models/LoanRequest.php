<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanRequest extends Model
{
    use HasFactory;
    
    protected $table = 'loanrequests';
    protected $primarykey ='id';
    protected $fillable = [
        'loan_amount', 
        'loan_duration', 
        'guarantor', 
        'guarantor_contacts', 
        'salary_slip1', 
        'salary_slip2', 
        'salary_slip3', 
        'cheque', 
        'bank_statement', 
        'live_video', 
        'loan_requestdate', 
        'loan_approveddate', 
        'loan_rejecteddate', 
        'loan_status',
    ];
}
