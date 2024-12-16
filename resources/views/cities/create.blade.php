{{-- @extends('layouts.app') --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Add New City</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
   

    <style>
        body {
            background-color: #f9f9f9;
        }
        .container {
            margin-top: 50px;
            background: #fff;
            width: 30%;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            font-size: 2rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }
        .btn-primary {
            width: 100%;
        }
        .form-group label {
            font-weight: bold;
        }
        #city_code {
            display: none;
        }
    </style>

<div class="container">
    <h1> AddNew City</h1>
    <form action="{{ route('cities.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="cityname">City Name</label>
            <input type="text" name="cityname" class="form-control" id="city_name" placeholder="Enter City Name" required>
        </div>
        <div class="form-group mb-3">
            <input type="text" name="citycode" class="form-control" id="city_code"  required readonly>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
      // JavaScript to generate city code dynamically
      document.getElementById('city_name').addEventListener('input', function() {
            var cityName = this.value.trim(); // Get and trim the city name
            
            if (cityName === "" || cityName.length < 3) {
                document.getElementById('city_code').value = ""; // Clear city code if no input or too short
                return;
            }

            // Extract first three characters, convert to lowercase
            var prefix = cityName.slice(0, 3).toLowerCase();

            // Calculate sum of ASCII values of all characters in the city name
            var sum = 0;
            for (var i = 0; i < cityName.length; i++) {
                sum += cityName.charCodeAt(i);
            }

            // Generate the numeric code (last 3 digits of the sum, padded if needed)
            var numericCode = sum.toString().slice(-3).padStart(3, '0');

            // Combine the prefix and numeric code
            var cityNameCode = prefix + numericCode;

            // Ensure the generated city code is in uppercase
            cityNameCode = cityNameCode.toUpperCase(); // Convert to uppercase

            // Set the result in the city code input field
            document.getElementById('city_code').value = cityNameCode;
    });
</script>


