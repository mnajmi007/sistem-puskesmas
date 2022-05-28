<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard Petugas | Edit Pasien</title>
    @include('include.cdn.cdn')
</head>
<body id="body">
    <div class="container">
        <div class="row">
            @include('include.edit-pasien.form')
            @include('include.edit-pasien.info')
        </div>
    </div>
</body>
</html>