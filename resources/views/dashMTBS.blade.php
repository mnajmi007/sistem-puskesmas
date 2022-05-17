<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Petugas | Kunjungan KIA</title>
    @include('include.cdn.cdn')
</head>
<body id="body">
    @include('include.dashboard-mtbs.sidebar')
    <div class="container dash-info close-bar">
        <div class="row">
            @include('include.dashboard-mtbs.content')
        </div>
    </div>
</body>
</html>