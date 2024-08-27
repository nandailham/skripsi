<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('frontend/login/fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/login/css/owl.carousel.min.css') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/login/css/bootstrap.min.css') }}">

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('frontend/login/css/style.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <style>
        body {
            background: url('{{ asset('img/login.jpeg') }}') no-repeat center center fixed;
            background-size: cover;
            
        }

        .btn-primary {
            color: #fff;
            background-color: #6c63ff !important;
            border-color: #6c63ff !important;
        }

        .transparent-bg {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
        }

        .quote-section {
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
        }

        .quote-text {
            font-size: 1.5em;
            text-align: center;
        }
    </style>

    <title>Login</title>
</head>

<body>
    <div class="content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8 transparent-bg">
                            <div class="mb-4">
                                <h3>Login</h3>
                                @if (Session::has('error'))
                                    <div class="alert alert-warning alert-dismissible fade show pesan_alert" role="alert">
                                        {{ Session::get('error') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                            </div>
                            <form method="POST" action="{{ route('postlogin') }}" class="needs-validation" novalidate>
                                @csrf
                                <div class="form-group first">
                                    <label for="login">Email / Username</label>
                                    <input type="text" class="form-control" name="login" id="login" required>
                                    <div class="invalid-feedback">
                                        Please enter a valid email address.
                                    </div>
                                </div>
                                <div class="form-group last mb-4">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" required>
                                    <div class="invalid-feedback">
                                        Please enter your password.
                                    </div>
                                </div>
                                <input type="submit" value="Log In" class="btn btn-block btn-primary">
                            </form><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('frontend/login/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('frontend/login/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/login/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/login/js/main.js') }}"></script>
    <script>
        const quotes = [
            "Teruslah berusaha, kamu pasti bisa!",
            "Percayalah pada dirimu sendiri!",
            "Setiap langkah kecil membawa kita lebih dekat pada tujuan.",
            "Kegagalan adalah kesuksesan yang tertunda.",
            "Hari ini adalah kesempatan untuk menjadi lebih baik dari kemarin."
        ];

        let currentQuoteIndex = 0;

        function showNextQuote() {
            const quoteElement = document.getElementById('quote');
            quoteElement.textContent = quotes[currentQuoteIndex];
            currentQuoteIndex = (currentQuoteIndex + 1) % quotes.length;
        }

        setInterval(showNextQuote, 3000); // Ganti kata setiap 3 detik

        document.addEventListener('DOMContentLoaded', function() {
            showNextQuote(); // Tampilkan kata pertama segera

            // Focus on the email/username input field
            document.getElementById('login').focus();
        });
    </script>
</body>

</html>
