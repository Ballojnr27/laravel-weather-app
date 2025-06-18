

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body class="bg-gradient-to-b from-blue-500 to-indigo-700 min-h-screen flex items-center justify-center p-4 text-white font-sans">
    <div class="index-container">
        <h1 class="site-name">Weather App</h1>
        <a href="{{ route('login') }}" class="btn">Login</a>
        <a href="{{ route('register') }}" class="btn ">Register</a>
    </div>
</body>
</html>
