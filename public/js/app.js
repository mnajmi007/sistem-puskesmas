$(function(){

    // Awal pendaftaran pasien lama dan pasien baru

    // Mengnonaktifkan tombol 'selanjutnya'
    // Pada form pasien baru
    $("#next").prop("disabled", true);

    // Mengnonaktifkan tombol 'daftar sekarang'
    // Pada form pasien baru
    $("#daftar").prop("disabled", true);

    // Mengnonaktifkan tombol langkah selanjutnya
    // Pada form pasien baru
    $("#form-dua").addClass("disabled");

    // Mengnonaktifkan tombol 'selanjutnya'
    // Pada form pasien lama
    $("#next-lama").prop("disabled", true);
    $("#form-dua-lama").addClass("disabled");

    // dp-lama: Daftar Pasien lama
    // Mengnonaktifkan tombol daftar sekarang
    // Pada form daftar pasien lama
    $("#dp-lama").prop("disabled", true);

    // Mengisi kolom nama pasien dan
    // kolom nomor ktp pasien
    $("#nama, #ktp").keyup(function(){
        var nama = $("#nama").val();
        var ktp = $("#ktp").val();

        // Jika nama dan ktp terisi
        // maka mengkatifkan tombol 'selanjutnya'
        // pada form pasien baru
        if(nama != '' && ktp != '') {
            $("#next").prop("disabled", false);
        }
        else{
            $("#next").prop("disabled", true);
        }
    });

    $("#next").click(function() {
        var nama = $("#nama").val();
        var ktp = $("#ktp").val();
        var tgl = $("#tglLahir").val();

        if(tgl == ''){
            $("#notif-kosong").html('<span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-1-5h2v2h-2v-2zm0-8h2v6h-2V7z" fill="rgba(255,0,0,1)"/></svg> Tidak boleh kosong!</span>');
        }
        else{
            // Menampilkan dan menyembunyikan form 
            $("#form-pertama").css("display","none");
            $("#form-kedua").css("display","block");

            // Menambah dan menghapus class 'Active' di button
            $("#form-dua").addClass("active");
            $("#form-satu").removeClass("active");
            $("#form-dua").removeClass("disabled");
        }
        return false;
    });

    $("#form-dua").click(function() {
        // Menampilkan dan menyembunyikan form 
        $("#form-pertama").css("display","none");
        $("#form-kedua").css("display","block");

        // Menambah dan menghapus class 'Active' di button
        $("#form-dua").addClass("active");
        $("#form-satu").removeClass("active");
        $("#form-dua").removeClass("disabled");

        return false;
    });

    $("#form-satu").click(function() {
        // Menampilkan dan menyembunyikan form 
        $("#form-pertama").css("display","block");
        $("#form-kedua").css("display","none");

        // Menambah dan menghapus class 'Active' di button
        $("#form-satu").addClass("active");
        $("#form-dua").removeClass("active");

        return false;
    });

    $("#telp, #alamat, #kelurahan, #rt, #rw").keyup(function() {
        var telp = $("#telp").val();
        var alamat = $("#alamat").val();
        var kelurahan = $("#kelurahan").val();
        var rt = $("#rt").val();
        var rw = $("#rw").val();

        if(telp != '' && alamat != '' && kelurahan != '' && rw != '' && rt != '') {
            $("#daftar").prop("disabled", false);
        }
        else{
            $("#daftar").prop("disabled", true);
        }
        return false;
    });

    // Form pendaftaran pasien lama

    // Jika klik button pasien lama
    // Class aktif dihapus dari button pasien baru
    // Dan ditambahkan ke button pasien lama
    $("#pasien-lama").click(function(){
        $("#pasien-lama").addClass("active");
        $("#pasien-baru").removeClass("active");
        return false;
    });


    $("#form-satu-lama").click(function(){ 
        $("#form-satu-lama").addClass("active");
        $("#form-dua-lama").removeClass("active");
        $("#form-dua-lama").addClass("disabled");

        $("#lama-kedua").css("display", "none");
        $("#lama-pertama").css("display", "block");

        return false;
    });

    $("#pasienLama, #nmrPasien").keyup(function() {
        var pasienLama = $("#pasienLama").val();
        var nmrPasien = $("#nmrPasien").val();

        // Jika nama dan nomor pasien terisi
        // maka mengkatifkan tombol 'selanjutnya'
        // pada form pasien lama
        if(pasienLama != '' && nmrPasien != '') {
            $("#next-lama").prop("disabled", false);
        }
        else{
            $("#next-lama").prop("disabled", true);
        }
        return false;
    });

    $("#next-lama").click(function() {
        var poli = $("#poli").val();

        if(poli == "Pilih"){
            $(".notif-poli").html('<span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-1-5h2v2h-2v-2zm0-8h2v6h-2V7z" fill="rgba(255,0,0,1)"/></svg> Tidak boleh kosong!</span>');
        }
        else{
            $("#form-satu-lama").removeClass("active");
            $("#form-dua-lama").removeClass("disabled");
            $("#form-dua-lama").addClass("active");

            $("#lama-kedua").css("display", "block");
            $("#lama-pertama").css("display", "none");
        }
        return false;
    });

    $("#bpjs").click(function(){
        var bpjs = $("#bpjs").val();

        if(bpjs != 'Pilih'){
            $("#dp-lama").prop("disabled", false);
        }
        else{
            $("#dp-lama").prop("disabled", true);
        }
        return false;
    });

    $("#dp-lama").click(function() {
        var pasienLama = $("#pasienLama").val();
        var nmrPasien = $("#nmrPasien").val();
        var poli = $("#poli").val();
        var bpjs = $("#bpjs").val();
        var tglPeriksa = $("#tglPeriksa").val();
        var data = {
            'nama': pasienLama,
            'ktp': nmrPasien,
            'poli': poli,
            'bpjs': bpjs,
            'tanggal': tglPeriksa
        }
        console.log(data);
        return false;
    });

    // Akhir pendaftaran pasien lama dan pasien baru

    // Awal JS untuk login petugas
    $("#masuk-petugas").prop("disabled", true);

    $("#username, #pwd").keyup(function(){
        var username = $("#username").val();
        var pwd = $("#pwd").val();

        if(username != '' && pwd != ''){
            $("#masuk-petugas").prop("disabled", false);
        }
        else{
            $("#masuk-petugas").prop("disabled", true);
        }
        return false;
    });

    // Submit data goes here
    $("#masuk-petugas").click(function(){
        var username = $("#username").val();
        var pwd = $("#pwd").val();
        var data = {
            'username':username,
            'pwd':pwd
        }
        $("#notif-kosong").html("<span>Data inserted!</span>");
        return false;
    });

    // Akhir JS untuk login petugas

    // JS untuk menampilkan sidebar
    $("#show-bar").click(function(){
        $("#sidebar").css("width", "250px");
        $(".navigation").css("display", "block");
        return false;
    });

    $(".close-bar").click(function(){
        $("#sidebar").css("width", "0");
        $(".navigation").css("display", "none");
        return false;
    });

    // JS Dashboard Pasien
    $("#lihat-pencarian").click(function(){
        $("#form-pencarian-2").toggle();
        return false;
    });

    $(".lihat-pasien-mobile").click(function(){
        var ID = $(this).val();
        $("#pasien1"+ID).toggle();
        $("#form-pencarian-2").hide();
        return false;
    });
});