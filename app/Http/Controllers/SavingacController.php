<?php

namespace App\Http\Controllers;
use App\Models\Savingac;
use Illuminate\Http\Request;

class SavingacController extends Controller
{
    public function index()
    {
        $userAccounts = Savingac::all();
        return view('savingac.index', compact('userAccounts'));
    }

    public function create()
    {
        return view('savingac.create');
    }

    public function edit($id)
    {
        $savingac = Savingac::findOrFail($id);
        
        return view('savingac.edit', compact('savingac'));
    }
    
    public function store(Request $request)
    {
        Savingac::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'whatsapp_number' => $request->whatsapp_number,
            'amount' => $request->amount,
            'account_request_date' => $request->account_request_date,
            'create_account_date' => $request->create_account_date,
            'status' => $request->status ?? 'Pending', 
        ]);
    
        return redirect()->route('savingacs.index')->with('success', 'Saving account created successfully.');
    }
    public function update(Request $request, $id)
{
    $savingac = Savingac::findOrFail($id);

    $savingac->update([
        'name' => $request->name,
        'email' => $request->email,
        'mobile' => $request->mobile,
        'whatsapp_number' => $request->whatsapp_number,
        'amount' => $request->amount,
        'account_request_date' => $request->account_request_date,
        'status' => $request->status,
    ]);

    return redirect()->route('savingacs.index')->with('success', 'Saving account updated successfully.');
}
public function destroy($id)
{
    $savingac = Savingac::findOrFail($id);

    $savingac->delete();

    return redirect()->route('savingacs.index')->with('success', 'Saving account deleted successfully.');
}


    
}
