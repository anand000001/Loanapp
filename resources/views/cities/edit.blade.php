<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit City</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f9f9f9;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .container {
            background: #fff;
            width: 40%;
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
            width: 40%;
        }

        .form-group label {
            font-weight: bold;
        }
         #city_code {
            display: none;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="card shadow-lg p-4">
        <h1 class="text-center mb-4">Edit City</h1>

        <!-- Display validation errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Success message -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Update Form -->
        <form action="{{ route('cities.update', $city->id) }}" method="POST" id="cityForm">
            @csrf
            @method('PUT')

            <!-- City Name Field -->
            <div class="form-group mb-3">
                <label for="city_name" class="form-label">City Name</label>
                <input type="text" 
                       name="city_name" 
                       id="city_name" 
                       class="form-control" 
                       value="{{ old('city_name', $city->city_name) }}" 
                       placeholder="Enter city name" 
                       >
            </div>

            <!-- City Code Field -->
            <div class="form-group mb-3">
                {{-- <label for="city_code" class="form-label">City Code</label> --}}
                <input type="text" 
                       name="city_code" 
                       id="city_code" 
                       class="form-control" 
                       value="{{ old('city_code', $city->city_code) }}" 
                       > <!-- Made it editable to submit data -->
            </div>

            <!-- Buttons -->
            <div class="d-flex justify-content-between">
                <a href="{{ route('cities.index') }}" class="btn btn-secondary">Back to List</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const cityNameInput = document.getElementById('city_name');
        const cityCodeInput = document.getElementById('city_code');

        // Function to update city code dynamically
        function updateCityCode() {
            const cityName = cityNameInput.value.trim();

            if (cityName === "" || cityName.length < 3) {
                cityCodeInput.value = ""; // Clear city code if input is too short
                return;
            }

            // Extract first three characters, convert to uppercase
            const prefix = cityName.slice(0, 3).toUpperCase();

            // Calculate sum of ASCII values of all characters in the city name
            let sum = 0;
            for (let i = 0; i < cityName.length; i++) {
                sum += cityName.charCodeAt(i);
            }

            // Generate the numeric code (last 3 digits of the sum, padded if needed)
            const numericCode = sum.toString().slice(-3).padStart(3, '0');

            // Combine the prefix and numeric code
            cityCodeInput.value = prefix + numericCode;
        }

        // Add event listener for dynamic updates on city name input
        cityNameInput.addEventListener('input', updateCityCode);

        // Update city code on page load in case the name field is pre-filled
        updateCityCode();
    });
</script>

</body>
</html>
