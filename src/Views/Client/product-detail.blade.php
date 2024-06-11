<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #007bff;
        }

        .navbar-brand, .nav-link {
            color: #fff !important;
        }

        .nav-link {
            margin-right: 15px;
            transition: color 0.3s;
        }

        .nav-link:hover {
            color: #cce5ff !important;
        }

        .navbar-toggler {
            border-color: rgba(255, 255, 255, 0.1);
        }

        .navbar-toggler-icon {
            color: #fff;
        }

        .btn-primary {
            background-color: #28a745;
            border-color: #28a745;
            margin: 0 10px;
            transition: background-color 0.3s, border-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }

        .welcome-text {
            text-align: center;
            margin-top: 50px;
            margin-bottom: 30px;
        }

        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: none;
            transition: transform 0.3s;
            margin-bottom: 30px;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card-title {
            color: #007bff;
            font-size: 2rem;
        }

        .card-body {
            text-align: left;
        }

        .card img {
            object-fit: cover;
            height: 500px;
            width: 100%;
        }

        .btn-submit {
            margin-top: 20px;
        }

        .related-products {
            margin-top: 50px;
        }

        .related-title {
            margin-bottom: 30px;
            text-align: center;
            font-size: 2rem;
            color: #007bff;
        }
    </style>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">MyWebsite</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        @if (!isset($_SESSION['user']))
                        <a class="btn btn-primary" href="{{ url('login') }}">Login</a>
                        @endif
                        @if (isset($_SESSION['user']))
                        <a class="btn btn-primary" href="{{ url('logout') }}">Logout</a>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <h1 class="welcome-text">Welcome {{ $name }} to my website!</h1>
        </div>

        <div class="row">
            <div class="col-md-10 mb-4 mt-4 mx-auto">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-md-5">
                            <img class="img-fluid" src="{{ url($product['img_thumbnail']) }}" alt="Card image">
                        </div>
                        <div class="col-md-7">
                            <div class="card-body">
                                <h4 class="card-title">{{ $product['name'] }}</h4>
                                <h4 class="card-text">PRICE: {{ number_format($product['price_regular'], 0, ',', '.') }}Đ</h4>
                                <form action="{{ url('cart/add') }}" method="get">
                                    <input type="hidden" name="productID" value="{{ $product['id'] }}">
                                    <div class="d-flex justify-content-left">
                                        <input class="form-control w-25" type="number" min="1" name="quantity" value="1">
                                    </div>
                                    
                                    <button class="btn btn-success btn-submit" type="submit">Add to Cart</button>
                                    <p class="card-text">{{ $product['overview'] }}</p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>
