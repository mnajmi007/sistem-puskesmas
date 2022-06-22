<div class="graph">
    <div class="row">

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" id="jml-penyakit">
            <h5>Jumlah Penyakit</h5>
            <div id="grafikPenyakit"></div>
            <script>
                function jml_penyakit(){
                    var xArray = ["Supernumerary", "Persistensi gigi", "Embedded", "Impacted", "Karies email", "Hamil + hypertensi", "Hamil Ektopik", "Hamil dengan anemi", "Hamil Normal", "Hamil lewat waktu"];
                    var yArray = [
                        <?php
                        echo DB::table('diagnosa_pasien')->where('id_diagnosa', '=', 'K.00.1')->count();
                        ?>,
                        <?php
                        echo DB::table('diagnosa_pasien')->where('id_diagnosa', '=', 'K.00.6')->count();
                        ?>,
                        <?php
                        echo DB::table('diagnosa_pasien')->where('id_diagnosa', '=', 'K.01.0')->count();
                        ?>,
                        <?php
                        echo DB::table('diagnosa_pasien')->where('id_diagnosa', '=', 'K.01.1')->count();
                        ?>,
                        <?php
                        echo DB::table('diagnosa_pasien')->where('id_diagnosa', '=', 'K.02.0')->count();
                        ?>,
                        <?php
                        echo DB::table('diagnosa_pasien')->where('id_diagnosa', '=', 'O116')->count();
                        ?>,
                        <?php
                        echo DB::table('diagnosa_pasien')->where('id_diagnosa', '=', 'O00.9')->count();
                        ?>,
                        <?php
                        echo DB::table('diagnosa_pasien')->where('id_diagnosa', '=', 'O99.0')->count();
                        ?>,
                        <?php
                        echo DB::table('diagnosa_pasien')->where('id_diagnosa', '=', 'O80.9')->count();
                        ?>,
                        <?php
                        echo DB::table('diagnosa_pasien')->where('id_diagnosa', '=', 'O48')->count();
                        ?>
                    ];
                    var data = [{
                        x:xArray,
                        y:yArray,
                        type:"bar"
                    }];
                    Plotly.newPlot("grafikPenyakit", data);
                }
                jml_penyakit();
            </script>
        </div>
        
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" id="jml-kecamatan">
            <h5>Jumlah Kecamatan</h5>
            <div id="grafikKecamatan"></div>
            <script>
                function jml_kecamatan(){
                    var xArray = ["Bendan Duwur", "Bendan Ngisor", "Bendungan", "Gajahmungkur", "Karangrejo", "Lempong sari", "Petompon", "Sampangan"];
                    var yArray = [
                        <?php
                            echo DB::table('pasien')->where('kelurahan', '=', 'Bendan Duwur')->count()
                        ?>,
                        <?php
                            echo DB::table('pasien')->where('kelurahan', '=', 'Bendan Ngisor')->count()
                        ?>,
                        <?php
                            echo DB::table('pasien')->where('kelurahan', '=', 'Bendungan')->count()
                        ?>,
                        <?php
                            echo DB::table('pasien')->where('kelurahan', '=', 'Gajahmungkur')->count()
                        ?>,
                        <?php
                            echo DB::table('pasien')->where('kelurahan', '=', 'Karangrejo')->count()
                        ?>,
                        <?php
                            echo DB::table('pasien')->where('kelurahan', '=', 'Lempong sari')->count()
                        ?>,
                        <?php
                            echo DB::table('pasien')->where('kelurahan', '=', 'Petompon')->count()
                        ?>,
                        <?php
                            echo DB::table('pasien')->where('kelurahan', '=', 'Sampangan')->count()
                        ?>
                    ];
                    var data = [{labels:xArray, values:yArray, hole:.5, type:"pie"}];
                    Plotly.newPlot("grafikKecamatan", data);
                }
                jml_kecamatan();
            </script>
        </div>

        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" id="jenis-pekerjaan">
            <h5>Jenis Pekerjaan</h5>
            <div id="grafikPekerjaan"></div>
            <script>
                function jml_pekerjaan(){
                    var xArray = ["Wiraswasta", "BUMN", "Buruh", "Tidak/Belum Bekerja", "Rumah Tangga", "Pelajar/Mahasiswa", "Pensiunan", "PNS", "Polisi/TNI", "Petani/Perkebunan", "Perdagangan"];
                    var yArray = [
                        <?php
                            echo DB::table('pasien')->where('pekerjaan', '=', 'Wiraswasta')->count()
                        ?>,
                        <?php
                            echo DB::table('pasien')->where('pekerjaan', '=', 'BUMN')->count()
                        ?>,
                        <?php
                            echo DB::table('pasien')->where('pekerjaan', '=', 'Buruh')->count()
                        ?>,
                        <?php
                            echo DB::table('pasien')->where('pekerjaan', '=', 'Tidak/Belum Bekerja')->count()
                        ?>,
                        <?php
                            echo DB::table('pasien')->where('pekerjaan', '=', 'Rumah Tangga')->count()
                        ?>,
                        <?php
                            echo DB::table('pasien')->where('pekerjaan', '=', 'Pelajar/Mahasiswa')->count()
                        ?>,
                        <?php
                            echo DB::table('pasien')->where('pekerjaan', '=', 'Pensiunan')->count()
                        ?>,
                        <?php
                            echo DB::table('pasien')->where('pekerjaan', '=', 'PNS')->count()
                        ?>,
                        <?php
                            echo DB::table('pasien')->where('pekerjaan', '=', 'Polisi/TNI')->count()
                        ?>,
                        <?php
                            echo DB::table('pasien')->where('pekerjaan', '=', 'Petani/Perkebunan')->count()
                        ?>,
                        <?php
                            echo DB::table('pasien')->where('pekerjaan', '=', 'Perdagangan')->count()
                        ?>
                    ];
                    var data = [{
                        labels:xArray,
                        values:yArray,
                        type:"pie"
                    }];
                    Plotly.newPlot("grafikPekerjaan", data);
                }
                jml_pekerjaan();
            </script>
        </div>    
    </div>
</div>