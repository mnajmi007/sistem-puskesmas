<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dashboard Petugas | Puskesmas Suka Sehat</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=Radio+Canada:wght@300;400;700&display=swap" rel="stylesheet"> 

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script> 

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
</head>
<body id="body">
    @if(Session::get('username'))
        @include('include.dashboard-petugas.sidebar')
        <div class="container dash-info close-bar">
            <div class="row">
                @include('include.dashboard-petugas.content')
            </div>
        </div>
    @else
        <div class="text-center no-entry">
            <img src="{{ asset('assets/images/forbidden.png') }}" alt="forbidden" class="no-entry-image">
            <h1 class="no-entry-text">Oops, Anda belum login!</h1>
            <a class="no-entry-redirect" href="/login-petugas">Klik di sini untuk login</a>
        </div>
    @endif
</body>
</html>