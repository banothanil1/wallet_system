<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wallet System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        body {
            background-color: #f8f9fa;
            color: #343a40;
            font-family: 'Arial', sans-serif;
        }

        .navbar {
            background-color: #007bff;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand,
        .navbar-nav .nav-link {
            color: #ffffff !important;
            font-weight: bold;
        }

        .navbar-toggler-icon {
            background-color: #ffffff;
        }

        .navbar-collapse {
            justify-content: flex-end;
        }

        .navbar-nav .nav-item {
            margin-right: 15px;
        }

        .navbar-nav .nav-link {
            padding: 15px 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .navbar-nav .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input.form-control {
            border-radius: 5px;
        }

        button.btn-outline-success {
            color: #ffffff;
            border-color: #ffffff;
            border-radius: 5px;
        }

        button.btn-outline-success:hover {
            background-color: #ffffff;
            color: #007bff;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Wallet System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('user.homepage')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('user.registerform')}}">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('user.loginform')}}">Login</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
