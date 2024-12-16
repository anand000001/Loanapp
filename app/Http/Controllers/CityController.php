<?php

namespace App\Http\Controllers;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::all();
        return view('cities.index', compact('cities'));
    }

    // Show the form for creating a new city
    public function create()
    {
        return view('cities.create');
    }

    // Store a newly created city in storage
    public function store(Request $request)
{
    // Save the data to the database
    City::create([
        'city_name' => $request->cityname,
        'city_code' => $request->citycode, // This will be automatically set via JavaScript
    ]);

    return redirect()->route('cities.index')->with('success', 'City created successfully.');
}
    
    // Show the form for editing the specified city
    public function edit(City $city)
    {
        return view('cities.edit', compact('city'));
    }

    

    // Update the specified city in storage
    public function update(Request $request, City $city)
{
    $request->validate([
        'city_name' => 'required|string|max:255',
        'city_code' => 'required|string|max:255|unique:cities,city_code,' . $city->id,
    ]);

    // Update only the necessary fields
    $city->update([
        'city_name' => $request->city_name,
        'city_code' => $request->city_code,
    ]);

    return redirect()->route('cities.index')->with('success', 'City updated successfully.');
}


    // Remove the specified city from storage
    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->route('cities.index')->with('success', 'City deleted successfully.');
    }
}

