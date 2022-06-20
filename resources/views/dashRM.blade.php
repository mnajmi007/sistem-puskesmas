<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Petugas | Rekam Medis Pasien</title>
    @include('include.cdn.cdn')
</head>
<body id="body">
    @if(Session::get('username'))
        @include('include.dashboard-rm.sidebar')
        <div class="container dash-info close-bar">
            <div class="row">
                @include('include.dashboard-rm.content')
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