<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emi;

class EmiController extends Controller
{
    public function index()
{
    // Retrieve EMI records grouped by collection type
    $dailyEmis = Emi::where('collection_type', 'daily')->get();
    $weeklyEmis = Emi::where('collection_type', 'weekly')->get();
    $monthlyEmis = Emi::where('collection_type', 'monthly')->get();

    // Return the records to the Blade view
    return view('emi.index', compact('dailyEmis', 'weeklyEmis', 'monthlyEmis'));
}


    /**
     * Show the form for creating a new EMI record.
     *
     * @return \Illuminate\View\View
     */
    public function create()
{
    // Get the EMI records grouped by collection type
    $dailyEmis = Emi::where('collection_type', 'daily')->get();
    $weeklyEmis = Emi::where('collection_type', 'weekly')->get();
    $monthlyEmis = Emi::where('collection_type', 'monthly')->get();

    // Pass the data to the create view
    return view('emi.create', compact('dailyEmis', 'weeklyEmis', 'monthlyEmis'));
}


    /**
     * Store a newly created EMI record in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
       
        Emi::create([
            'name' => $request->input('name'),
            'mobile' => $request->input('mobile'),
            'loan_amount' => $request->input('loan_amount'),
            'collection_type' => $request->input('collection_type'),
            'date_of_collect' => $request->input('date_of_collect'),
            'emi_number' => $request->input('emi_number'),
            'emi_amount' => $request->input('emi_amount'),
            'paid_emi_amount' => $request->input('paid_emi_amount'),
            'remaining_amount' => $request->input('remaining_amount'),
            
        ]);
        return redirect()->route('emis.index')->with('success', 'EMI record created successfully!');
    }
}
