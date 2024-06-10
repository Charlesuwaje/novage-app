<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
</head>
<body>
    <div class="container">
        <h2>Register</h2>
         <!-- Success Message -->
         @if (session('success'))
         <div class="success">
             {{ session('success') }}
         </div>
     @endif

      <!-- Error Messages -->
      @if ($errors->any())
      <div class="error">
          <ul class="error1">
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
        <form action="{{ route('registrations.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="phone_number">Phone Number:</label>
                <input type="text" id="phone_number" name="phone_number" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <button type="submit">Register</button>
            </div>
        </form>
    </div>
</body>

<style>
    body {
        font-family: 'Roboto', sans-serif;
        background: linear-gradient(135deg, #74ebd5 0%, #ACB6E5 100%);
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .container {
        background-color: #fff;
        padding: 30px 40px;
        border-radius: 10px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 400px;
    }

    .container h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
        font-size: 24px;
        font-weight: bold;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        color: #555;
        font-size: 14px;
        font-weight: bold;
    }

    .form-group input {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        transition: border-color 0.3s;
    }

    .form-group input:focus {
        border-color: #007BFF;
        outline: none;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
    }

    .form-group button {
        width: 100%;
        padding: 12px;
        border: none;
        border-radius: 5px;
        background-color: #007BFF;
        color: #fff;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s, transform 0.3s;
    }

    .form-group button:hover {
        background-color: #0056b3;
        transform: translateY(-2px);
    }

    .form-group button:focus {
        outline: none;
    }

    .form-group button:active {
        background-color: #004494;
        transform: translateY(1px);
    }
    .success{
border: green 2px solid;
border-radius: 5px;
padding: 10px;
margin-bottom: 10px;
color: black;
background-color: green;
text-align: center;
}

.error{
    border: red 2px solid;
border-radius: 5px;
padding: 10px;
margin-bottom: 10px;
color: black;
background-color: red;
}
.error1{
    list-style: none;
text-decoration: none;
}
</style>
</html>
