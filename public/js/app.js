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
    $("#nama, #telp").keyup(function(){
        var nama = $("#nama").val();
        var telp = $("#telp").val();

        // Jika nama dan ktp terisi
        // maka mengkatifkan tombol 'selanjutnya'
        // pada form pasien baru
        if(nama != '' && telp != '') {
            $("#next").prop("disabled", false);
        }
        else{
            $("#next").prop("disabled", true);
        }
    });

    $("#next").click(function() {
        var nama = $("#nama").val();
        var tgl = $("#tglLahir").val();
        var telp = $("#telp").val();

        if(tgl == '' || nama == '' || telp == ''){
            alert("Kolom harus diisi!");
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

    // Pendaftaran Pasien Baru
    $("#daftar").click(function(){
        var nama = $("#nama").val();
        var tgl = $("#tglLahir").val();
        var telp = $("#telp").val();

        var alamat = $("#alamat").val();
        var poli = $("#poli").val();
        var periksa = $("#tglPeriksa").val();

        var data = {
            'nama':nama,
            'tanggal':tgl,
            'telp':telp,
            'alamat':alamat,
            'poli':poli,
            'periksa':periksa
        }
        
        $.ajax({
            type:"POST",
            url:"/pasien-baru",
            data:data,
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(data){
                if(data == "Pendaftaran online berhasil!"){
                    $("#bukti-nama").html("<b>"+nama+"</b>");
                    $("#bukti-telp").html("<b>"+telp+"</b>");
                    $("#bukti-lahir").html("<b>"+tgl+"</b>");
                    $("#bukti-alamat").html("<b>"+alamat+"</b>");
                    $("#bukti-poli").html("<b>"+poli+"</b>");
                    $("#bukti-periksa").html("<b>"+periksa+"</b>");
                    $("#modal-bukti").modal("show");
                }
                else{
                    alert("Pendaftaran online gagal!");
                }
            }
        });
        
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

    $("#pasien-baru").click(function(){
        $("#pasien-lama").removeClass("active");
        $("#pasien-baru").addClass("active");

        $("#form-lama").css("display", "none");
        $("#form-baru").css("display", "block");

        return false;
    });

    $("#pasien-lama").click(function(){
        $("#pasien-lama").addClass("active");
        $("#pasien-baru").removeClass("active");

        $("#form-lama").css("display", "block");
        $("#form-baru").css("display", "none");

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

    $("#pasienLama, #rmPasien").keyup(function() {
        var pasienLama = $("#pasienLama").val();
        var rmPasien = $("#rmPasien").val();

        // Jika nama dan nomor pasien terisi
        // maka mengkatifkan tombol 'selanjutnya'
        // pada form pasien lama
        if(pasienLama != '' && rmPasien != '') {
            $("#next-lama").prop("disabled", false);
        }
        else{
            $("#next-lama").prop("disabled", true);
        }
        return false;
    });

    $("#next-lama").click(function() {
        var poli = $("#poliLama").val();

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
        var nama = $("#pasienLama").val();
        var rm = $("#rmPasien").val();
        var poli = $("#poliLama").val();
        var bpjs = $("#bpjs").val();
        var tglPeriksa = $("#tglPeriksaLama").val();

        var data = {
            'nama': nama,
            'rm': rm,
            'poli': poli,
            'bpjs': bpjs,
            'tanggal': tglPeriksa
        };

        $.ajax({
            type:"POST",
            url:"/pasien-lama",
            data:data,
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(data){
                if(data == "Berhasil!"){
                    $("#modal-bukti-lama").modal("show");
                    $("#bukti-pasien-lama").html("<b>"+nama+"</b>");
                    $("#bukti-rm").html("<b>"+rm+"</b>");
                    $("#bukti-jkn").html("<b>"+bpjs+"</b>");
                    $("#bukti-periksa-lama").html("<b>"+tglPeriksa+"</b>");
                    $("#bukti-poli-lama").html("<b>"+poli+"</b>");
                }
                else{
                    alert(data);
                }
            }
        });

        return false;
    });

    // Akhir pendaftaran pasien lama dan pasien baru

    // Awal JS untuk login petugas
    $("#masuk-petugas").prop("disabled", true);

    $("#username, #pwd, #idPetugas").keyup(function(){
        var idPetugas = $("#idPetugas").val();
        var username = $("#username").val();
        var pwd = $("#pwd").val();

        if(username != '' && pwd != '' && idPetugas != ''){
            $("#masuk-petugas").prop("disabled", false);
        }
        else{
            $("#masuk-petugas").prop("disabled", true);
        }
        return false;
    });

    // Submit data goes here
    $("#masuk-petugas").click(function(){
        var idPetugas = $("#idPetugas").val();
        var username = $("#username").val();
        var pwd = $("#pwd").val();
        var data = {
            'idPetugas':idPetugas,
            'username':username,
            'pwd':pwd
        }
        $.ajax({
            type:'POST',
            url:'/login-petugas',
            data:data,
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(data){
                if(data == "Berhasil"){
                    window.location.href='/dashboard/'
                }
                else{
                    alert(data);
                }
            }
        });
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

    $(".aksi").click(function(){
        var ID = $(this).attr("id");
        $("#menu-aksi"+ID).modal("show");
        return false;
    });


    $(".close-aksi").click(function(){
        var ID = $(this).attr("id");
        $("#menu-aksi"+ID).modal("hide");
        return false;
    });

    // Tambah Pasien
    $("#next-form").prop("disabled", true);
    $("#tambah-pasien").prop("disabled", true);

    $("#nama, #tgl-lahir, #pekerjaan, #jns-kelamin, #goldar").change(function(){
        var nama = $("#nama").val();
        var tgl = $("#tgl-lahir").val();
        var pekerjaan = $("#pekerjaan").val();
        var gender = $("#jns-kelamin").val(); 
        var goldar = $("#goldar").val();

        if(nama != '' && tgl != '' && pekerjaan != 0 && gender != 0 && goldar != 0){
            $("#next-form").prop("disabled", false);
        }
        else{
            $("#next-form").prop("disabled", true);
        }
    });

    $("#telp-pasien, #nmr-ktp, #alamat, #kelurahan, #rt, #rw").change(function(){
        var telp = $("#telp-pasien").val();
        var ktp = $("#nmr-ktp").val();
        var alamat = $("#alamat").val();
        var kelurahan = $("#kelurahan").val(); 
        var rt = $("#rt").val();
        var rw = $("#rw").val();

        if(telp != '' && ktp != '' && alamat != '' && kelurahan != 0 && rt != 0 && rw != 0){
            $("#tambah-pasien").prop("disabled", false);
        }
        else{
            $("#tambah-pasien").prop("disabled", true);
        }
    });

    $("#next-form").click(function(){
        var nama = $("#nama").val();
        var tgl = $("#tgl-lahir").val();
        var pekerjaan = $("#pekerjaan").val();
        var gender = $("#jns-kelamin").val(); 
        var goldar = $("#goldar").val();

        $("#nama-pasien").html("<b>"+nama+"</b>");
        $("#lahir-pasien").html("<b>"+tgl+"</b>");
        $("#pekerjaan-pasien").html("<b>"+pekerjaan+"</b>");
        $("#gender-pasien").html("<b>"+gender+"</b>");
        $("#goldar-pasien").html("<b>"+goldar+"</b>");

        $("#data-profil").css("display", "none");
        $("#tempat-tinggal").css("display", "block");

        return false
    });

    // Petugas - Tambah Pasien
    // Kembali ke form profil pasien
    $("#sebelum").click(function(){
        $("#data-profil").css("display", "block");
        $("#tempat-tinggal").css("display", "none");
    });

    // Petugas - Tambah Pasien
    // kembali ke form alamat domisili pasien
    $("#sebelum-periksa").click(function(){
        $("#tempat-tinggal-domisili").css("display", "block");
        $("#jadwal-periksa").css("display", "none");
    });

    // Petugas - Tambah Pasien
    // Lanjut ke form jadwal periksa pasien
    $("#next-periksa").click(function(){
        $("#tempat-tinggal-domisili").css("display", "none");
        $("#jadwal-periksa").css("display", "block");
    });
    
    // Petugas - Tambah Pasien
    // Lanjut ke form alamat domisili
    $("#next-domisili").click(function(){
        var nama = $("#nama").val();
        var tgl = $("#tgl-lahir").val();
        var pekerjaan = $("#pekerjaan").val();
        var gender = $("#jns-kelamin").val(); 
        var goldar = $("#goldar").val();

        var telp = $("#telp-pasien").val();
        var ktp = $("#nmr-ktp").val();
        var alamat = $("#alamat").val();
        var kelurahan = $("#kelurahan").val(); 
        var rt = $("#rt").val();
        var rw = $("#rw").val();
        
        var data = {
            'pasien': nama,
            'lahir': tgl,
            'pekerjaan':pekerjaan,
            'gender':gender,
            'goldar':goldar,
            'telp': telp,
            'ktp': ktp,
            'alamat': alamat,
            'kelurahan': kelurahan,
            'rt': rt,
            'rw': rw
        }

        $("#alamat-pasien").html("<b>"+alamat+"</b>");
        $("#ktp-pasien").html("<b>"+ktp+"</b>");
        $("#tlp-pasien").html("<b>"+telp+"</b>");
        $("#kelurahan-pasien").html("<b>"+kelurahan+"</b>");
        $("#rt-pasien").html("<b>"+rt+"</b>");
        $("#rw-pasien").html("<b>"+rw+"</b>");
    });

    // Petugas - Tambah Pasien
    // Submit tambah pasien goes here!!!

    $("#tambah-pasien").click(function(){
        var nama = $("#nama").val();
        var tgl = $("#tgl-lahir").val();
        var pekerjaan = $("#pekerjaan").val();
        var gender = $("#jns-kelamin").val(); 
        var goldar = $("#goldar").val();

        var telp = $("#telp-pasien").val();
        var ktp = $("#nmr-ktp").val();
        var alamat = $("#alamat").val();
        var kelurahan = $("#kelurahan").val(); 
        var rt = $("#rt").val();
        var rw = $("#rw").val();
        
        var alamat_domisili = $("#alamat_domisili").val();
        var rt_domisili = $("#rt_domisili").val();
        var rw_domisili = $("#rw_domisili").val();

        var poli = $("#poli_pasien").val();
        var tgl_periksa = $("#tgl_periksa_pasien").val();

        var data = {
            'pasien': nama,
            'lahir': tgl,
            'pekerjaan':pekerjaan,
            'gender':gender,
            'goldar':goldar,
            'telp': telp,
            'ktp': ktp,
            'alamat': alamat,
            'kelurahan': kelurahan,
            'rt': rt,
            'rw': rw,
            'alamat_domisili': alamat_domisili,
            'rt_domisili': rt_domisili,
            'rw_domisili': rw_domisili,
            'poli': poli,
            'tgl_periksa': tgl_periksa
        }

        $.ajax({
            type:"POST",
            url:"/tambah-pasien-baru",
            data:data,
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(data){
                alert(data);
            }
        });
        return false;
    });

    // Update data pasien
    $("#next-update").click(function(){
        var nama = $("#nama").val();
        var tgl = $("#tgl-lahir").val();
        var pekerjaan = $("#pekerjaan").val();
        var gender = $("#jns-kelamin").val(); 
        var goldar = $("#goldar").val();

        if(nama === '' || tgl === '' || pekerjaan === 0 || gender === 0 || goldar === 0){
            alert("Kolom tidak boleh kosong!");
        }
        else{
            $("#nama-pasien").html("<b>"+nama+"</b>");
            $("#lahir-pasien").html("<b>"+tgl+"</b>");
            $("#pekerjaan-pasien").html("<b>"+pekerjaan+"</b>");
            $("#gender-pasien").html("<b>"+gender+"</b>");
            $("#goldar-pasien").html("<b>"+goldar+"</b>");

            $("#data-profil").css("display", "none");
            $("#tempat-tinggal").css("display", "block");
        }
        return false
    });

    // Form edit alamat domisili
    $("#sebelum-domisili").click(function(){
        $("#tempat-tinggal-domisili").css("display","none");
        $("#tempat-tinggal").css("display","block");
        return false;
    });

    $("#next-domisili").click(function(){
        $("#tempat-tinggal-domisili").css("display","block");
        $("#tempat-tinggal").css("display","none");
        return false;
    });

    $(".update-pasien").click(function(){
        var rm = $(this).attr("id");
        var nama = $("#nama").val();
        var tgl = $("#tgl-lahir").val();
        var pekerjaan = $("#pekerjaan").val();
        var gender = $("#jns-kelamin").val(); 
        var goldar = $("#goldar").val();
        var jkn = $("#jkn").val();

        var telp = $("#telp-pasien").val();
        var ktp = $("#nmr-ktp").val();
        var alamat = $("#alamat").val();
        var kelurahan = $("#kelurahan").val(); 
        var rt = $("#rt").val();
        var rw = $("#rw").val();
        
        var alamat_domisili = $("#alamat_domisili").val();
        var rt_domisili = $("#rt_domisili").val();
        var rw_domisili = $("#rw_domisili").val();

        var data = {
            'pasien': nama,
            'lahir': tgl,
            'pekerjaan':pekerjaan,
            'gender':gender,
            'goldar':goldar,
            'telp': telp,
            'ktp': ktp,
            'alamat': alamat,
            'kelurahan': kelurahan,
            'rt': rt,
            'rw': rw,
            'rm': rm,
            'alamat_domisili': alamat_domisili,
            'rt_domisili': rt_domisili,
            'rw_domisili': rw_domisili,
            'jkn':jkn
        }

        if(nama === '' || tgl === '' || pekerjaan === 0 || gender === 0 || goldar === 0 || telp === '' || ktp === '' || alamat === '' || kelurahan === 0 || rt === 0 || rw === 0){
            alert("Kolom tidak boleh kosong!");
        }
        else{
            $.ajax({
                type:"POST",
                url:"/handle-edit",
                data:data,
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function(data){
                    $("#alamat-pasien").html("<b>"+alamat+"</b>");
                    $("#ktp-pasien").html("<b>"+ktp+"</b>");
                    $("#tlp-pasien").html("<b>"+telp+"</b>");
                    $("#kelurahan-pasien").html("<b>"+kelurahan+"</b>");
                    $("#rt-pasien").html("<b>"+rt+"</b>");
                    $("#rw-pasien").html("<b>"+rw+"</b>");

                    if(data == "error"){
                        alert("Data gagal diperbarui!");
                    }
                    else{
                        alert("Data Berhasil diperbarui!");
                        window.setTimeout(window.location.href='/dashboard/edit-pasien/'+data, 7000);
                    }
                }
            });
        }
       return false;
    });

    // Link halaman edit pasien
    $(".edit-pasien").click(function(){
        var ID = $(this).attr("id");
        var data = {
            'id':ID
        }
        $.ajax({
            type:'get',
            url:'/dashboard/edit-pasien/'+ID,
            data:data,
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(data){
                window.location.href='/dashboard/edit-pasien/'+ID;
            }
        });
        return false;
    });

    // Link halaman hasil pencarian
    $("#cari-pasien").prop("disabled", true);

    $("#cari-nama, #cari-rm, #cari-ktp, #cari-jkn").change(function(){
        var nama = $("#cari-nama").val();
        var rm = $("#cari-rm").val();
        var ktp = $("#cari-ktp").val();
        var jkn = $("#cari-jkn").val();

        if(nama != '' && rm != '' && ktp != '' && jkn != 0){
            $("#cari-pasien").prop("disabled", false);
        }
        else{
            $("#cari-pasien").prop("disabled", true);
        }

        return false;
    });

    $("#cari-pasien").click(function(){
        var nama = $("#cari-nama").val();
        var rm = $("#cari-rm").val();
        var ktp = $("#cari-ktp").val();
        var pekerjaan = $("#cari-pekerjaan").val();
        var data = {
            'nama':nama,
            'rm':rm,
            'ktp':ktp,
            'pekerjaan':pekerjaan
        }

        $.ajax({
            type:'get',
            url:'/dashboard/pasien/cari/'+rm,
            data:data,
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(data){
                window.location.href='/dashboard/pasien/cari/'+rm;
            },
            error:function(data){
                alert("Pasien tidak ditemukan!");
            }
        });

        return false;
    });

    // Link menuju halaman kunjungan pasien tertentu
    $(".kunjungan-pasien").click(function(){
        var rm = $(this).attr("id");
        var data = {
            'rm':rm
        };

        $.ajax({
            type:'get',
            url:'/dashboard/pasien/cari/kunjungan/'+rm,
            data:data,
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(data){
                window.location.href='/dashboard/pasien/cari/kunjungan/'+rm;
            },
            error:function(data){
                alert("Pasien tidak ditemukan!");
            }
        });

        return false;
    });

    // link menuju rekam medis pasien tertentu
    $(".rm-pasien").click(function(){
        var rm = $(this).attr("id");
        var data = {
            'rm':rm
        };

        $.ajax({
            type:'get',
            url:'/dashboard/pasien/cari/rm/'+rm,
            data:data,
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(data){
                window.location.href='/dashboard/pasien/cari/rm/'+rm;
            },
            error:function(data){
                alert("Pasien tidak ditemukan!");
            }
        });

        return false;
    });
});