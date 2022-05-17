<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Petugas | Tambah Pasien</title>
    @include('include.cdn.cdn')
</head>
<body id="body">
    <div class="container">
        <div class="row">
            @include('include.tambah-pasien.form')
            @include('include.tambah-pasien.info')
        </div>
    </div>
</body>
</html>