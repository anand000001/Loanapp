<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view customer', ['only' => ['index']]);
        $this->middleware('permission:edit customer', ['only' => ['edit']]);
        $this->middleware('permission:create customer', ['only' => ['create']]);
        $this->middleware('permission:destroy customer', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view('customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'phone' => 'required|string|max:15',
            'aadhaar_number' => 'required|string|max:12',
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);
    

        $customer = new Customer();

        $customer->name = $request->input('name');
        $customer->email = $request->input('email');
        $customer->phone = $request->input('phone');
        $customer->whatsapp_number = $request->input('whatsapp_number', $customer->whatsapp_number);
        $customer->aadhaar_number = $request->input('aadhaar_number');
        $customer->created_by = $request->input('created_by', $customer->created_by);
        $customer->permanent_address = $request->input('permanent_address', $customer->permanent_address);
        $customer->current_address = $request->input('current_address', $customer->current_address);
        $customer->gender = $request->input('gender', $customer->gender);
        $customer->marital_status = $request->input('marital_status', $customer->marital_status);
        $customer->education = $request->input('education', $customer->education);
        $customer->job_status = $request->input('job_status', $customer->job_status);
        $customer->profession = $request->input('profession', $customer->profession);
        $customer->income = $request->input('income', $customer->income);
        $customer->permanent_city = $request->input('permanent_city', $customer->permanent_city);
        $customer->permanent_state = $request->input('permanent_state', $customer->permanent_state);
        $customer->current_city = $request->input('current_city', $customer->current_city);
        $customer->current_state = $request->input('current_state', $customer->current_state);
        $customer->kyc_status = $request->input('kyc_status', $customer->kyc_status);
    
        // Save the customer record
        $customer->save();

        return redirect()->route('customer.index')->with('success', 'Customer created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $customer = Customer::findOrFail($id);
        return view('customer.view', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:customers,email,' . $id,
        'phone' => 'required|string|max:15',
        'aadhaar_number' => 'required|string|max:12',
    ]);

    // Find the customer by ID
    $customer = Customer::findOrFail($id);

    // Update customer attributes
    $customer->name = $request->input('name');
    $customer->email = $request->input('email');
    $customer->phone = $request->input('phone');
    $customer->whatsapp_number = $request->input('whatsapp_number', $customer->whatsapp_number);
    $customer->aadhaar_number = $request->input('aadhaar_number');
    $customer->created_by = $request->input('created_by', $customer->created_by);
    $customer->permanent_address = $request->input('permanent_address', $customer->permanent_address);
    $customer->current_address = $request->input('current_address', $customer->current_address);
    $customer->gender = $request->input('gender', $customer->gender);
    $customer->marital_status = $request->input('marital_status', $customer->marital_status);
    $customer->education = $request->input('education', $customer->education);
    $customer->job_status = $request->input('job_status', $customer->job_status);
    $customer->profession = $request->input('profession', $customer->profession);
    $customer->income = $request->input('income', $customer->income);
    $customer->permanent_city = $request->input('permanent_city', $customer->permanent_city);
    $customer->permanent_state = $request->input('permanent_state', $customer->permanent_state);
    $customer->current_city = $request->input('current_city', $customer->current_city);
    $customer->current_state = $request->input('current_state', $customer->current_state);
    $customer->kyc_status = $request->input('kyc_status', $customer->kyc_status);

    // Save the updated customer record
    $customer->save();

    return redirect()->route('customer.index')->with('success', 'Customer updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customer.index')->with('success', 'Customer deleted successfully.');
    }
}
