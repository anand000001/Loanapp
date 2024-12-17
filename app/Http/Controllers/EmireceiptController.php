<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Emireceipt;

class EmireceiptController extends Controller
{
    
    public function index()
    {
        $emireceipts = Emireceipt::all();
        return view('emireceipt.index', compact('emireceipts'));
   
    }

    
    public function create()
    {
        return view('emireceipt.create');
    }

   
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'mobile_number' => 'required|string',
            'whatsapp_number' => 'nullable|string',
            'address' => 'required|string',
            'emi_amount' => 'required|numeric',
            'payment_slip' => 'nullable|image',
            'loan_amount' => 'required|numeric',
            'date_of_collect' => 'required|date',
            'last_date_collect' => 'required|date',

            
        ]);
    
           if ($request->hasFile('payment_slip')) {
            $fileName = $request->file('payment_slip')->store('slips', 'public');
            $validatedData['payment_slip'] = $fileName;
            }

        Emireceipt::create($validatedData);
        return redirect()->route('emireceipts.index')->with('success', 'EMI Receipt created successfully.');
    
    }

    public function show($id)
    {
         $emireceipt = Emireceipt::findOrFail($id);
        return view('emireceipt.show', compact('emireceipt'));
    }

    
    public function edit($id)
    {
        $emireceipt = Emireceipt::findOrFail($id);
        return view('emireceipt.edit', compact('emireceipt'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'mobile_number' => 'required|string',
            'whatsapp_number' => 'nullable|string',
            'address' => 'required|string',
            'emi_amount' => 'required|numeric',
            'loan_amount' => 'required|numeric',
            'date_of_collect' => 'required|date',
            'last_date_collect' => 'required|date',
            'payment_slip' => 'nullable|image',
        ]);

        $emireceipt = Emireceipt::findOrFail($id);

        
        if ($request->hasFile('payment_slip')) {
            $fileName = $request->file('payment_slip')->store('slips', 'public');
            $validatedData['payment_slip'] = $fileName;
        }

        $emireceipt->update($validatedData);
        return redirect()->route('emireceipts.index')->with('success', 'EMI Receipt updated successfully.');
    }
    

    
    public function destroy($id)
    {
        //
    }
}
