<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boarding House Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('{{ asset('images/bg1.jpg') }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: #2C3E50;
        };

        header {
            text-align: center;
            padding: 50px 0;
        }

        .logo {
            width: 20px;
            height: 20px;
            margin-bottom: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 30px;
            border-radius: 8px;
        }

        h1 {
            font-size: 2.5em;
            color: #0F4C5C;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.2em;
            color: #6C757D;
        }

        .btn {
            display: inline-block;
            background-color: #D4AF37;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 1.1em;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #B88A2B;
        }
    </style>
</head>
<body>
    <header>
        <img src="{{ asset('images/CompletedLogoogo.png') }}" alt="Logo" class="logo">
        <h1>Welcome to the Boarding House Management System</h1>
    </header>

    <div class="container">
        <p>This system allows you to easily manage all aspects of your boarding house. From resident check-ins to maintenance requests, everything is streamlined to save you time and effort.</p>
        <a href="#" class="btn">Get Started</a>
    </div>
</body>
</html>
