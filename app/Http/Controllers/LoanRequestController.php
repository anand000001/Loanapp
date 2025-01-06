<?php

namespace App\Http\Controllers;

use App\Models\LoanRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class LoanRequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view loanrequest', ['only' => ['index']]);
        $this->middleware('permission:edit loanrequest', ['only' => ['edit']]);
        $this->middleware('permission:create loanrequest', ['only' => ['create']]);
        $this->middleware('permission:destroy loanrequest', ['only' => ['destroy']]);
    }
    
    public function index()
    {
        $loanrequest = LoanRequest::all();
        return view('loanrequest.index', compact('loanrequest'));
    }

    
    public function create()
    {
        return view('loanrequest.create');
    }


   /* public function show($id)
    {
        $loanRequest = LoanRequest::findOrFail($id);
        return view('loanrequest.show', compact('loanRequest'));
    }*/

    
   // public function edit($id)
   // {
       // $loanRequest = LoanRequest::findOrFail($id);
        //return view('loanrequest.edit', compact('loanRequest'));
   // }
     public function updateStatus(Request $request, $id)
    {
    dd($request->all());
      $loanRequest = LoanRequest::findOrFail($id);

   
      if ($request->input('loan_status') == 'approved') {
        $loanRequest->loan_status = 'approved';
      } elseif ($request->input('loan_status') == 'not approved') {
        $loanRequest->loan_status = 'not approved';
      }

       $loanRequest->save();

      return redirect()->route('loanrequest.index')
      ->with('status', 'Loan request status updated to ' . ucfirst($loanRequest->loan_status) . '!');
    }


   // public function update(Request $request, $id)
    //{
       
       // $request->validate([
          //  'loan_amount' => 'required|numeric',
           // 'loan_duration' => 'required|numeric',
            //'guarantor' => 'required|string',
            //'guarantor_contacts' => 'required|string',
           // 'loan_requestdate' => 'required|date',
       // ]);

       // $loanRequest = LoanRequest::findOrFail($id);
       // $loanRequest->update($request->all());

       // return redirect()->route('loanrequest.index')->with('success', 'Loan request updated successfully!');
  //  }
    
    //public function destroy($id)
   // {
        //$loanRequest = LoanRequest::findOrFail($id);
       // $loanRequest->delete();

       // return redirect()->route('loanrequest.index')->with('success', 'Loan request deleted successfully!');
   // }

    public function store(Request $request)
    {
       
        $request->validate([
            'loan_amount' => 'required|numeric',
            'loan_duration' => 'required|numeric',
            'guarantor' => 'required|string',
            'guarantor_contacts' => 'required|string',
            'salary_slip1' => 'required|file',
            'salary_slip2' => 'required|file',
            'salary_slip3' => 'required|file',
            'cheque' => 'required|file',
            'bank_statement' => 'required|file',
            'live_video' => 'required|file',
            'loan_requestdate' => 'required|date',
        ]);
    
       
        $salarySlip1 = $request->file('salary_slip1')->store('uploads');
        $salarySlip2 = $request->file('salary_slip2')->store('uploads');
        $salarySlip3 = $request->file('salary_slip3')->store('uploads');
        $cheque = $request->file('cheque')->store('uploads');
        $bankStatement = $request->file('bank_statement')->store('uploads');
        $liveVideo = $request->file('live_video')->store('uploads');
        
        LoanRequest::create([
            'loan_amount' => $request->loan_amount,
            'loan_duration' => $request->loan_duration,
            'guarantor' => $request->guarantor,
            'guarantor_contacts' => $request->guarantor_contacts,
            'salary_slip1' => $salarySlip1,
            'salary_slip2' => $salarySlip2,
            'salary_slip3' => $salarySlip3,
            'cheque' => $cheque,
            'bank_statement' => $bankStatement,
            'live_video' => $liveVideo,
            'loan_requestdate' => $request->loan_requestdate,
            'loan_status' => 'pending',
        ]);
    
       
        return redirect()->route('loanrequest.index')->with('success', 'Loan request submitted successfully!');
    }

   
}
