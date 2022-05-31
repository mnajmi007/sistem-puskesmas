<div class="graph">
    <div class="row">

        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" id="bulan-kunjungan">
            <h5>Kunjungan Pasien</h5>
            <div id="kunjunganPasien"></div>
            <script>
                function jml_penyakit(){
                    var xArray = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
                    var yArray = [
                        <?php
                            $januari = DB::table('kunjungan')->whereMonth('tgl_kunjungan','1')->count();
                            echo $januari;
                        ?>,
                        <?php
                            $feb = DB::table('kunjungan')->whereMonth('tgl_kunjungan','2')->count();
                            echo $feb;
                        ?>,
                        <?php
                            $mar = DB::table('kunjungan')->whereMonth('tgl_kunjungan','3')->count();
                            echo $mar;
                        ?>,
                        <?php
                            $apr = DB::table('kunjungan')->whereMonth('tgl_kunjungan','4')->count();
                            echo $apr;
                        ?>,
                        <?php
                            $may = DB::table('kunjungan')->whereMonth('tgl_kunjungan','5')->count();
                            echo $may;
                        ?>,
                        <?php
                            $jun = DB::table('kunjungan')->whereMonth('tgl_kunjungan','6')->count();
                            echo $jun;
                        ?>,
                        <?php
                            $jul = DB::table('kunjungan')->whereMonth('tgl_kunjungan','7')->count();
                            echo $jul;
                        ?>,
                        <?php
                            $aug = DB::table('kunjungan')->whereMonth('tgl_kunjungan','8')->count();
                            echo $aug;
                        ?>,
                        <?php
                            $sep = DB::table('kunjungan')->whereMonth('tgl_kunjungan','9')->count();
                            echo $aug;
                        ?>,
                        <?php
                            $oct = DB::table('kunjungan')->whereMonth('tgl_kunjungan','10')->count();
                            echo $oct;
                        ?>,
                        <?php
                            $nov = DB::table('kunjungan')->whereMonth('tgl_kunjungan','11')->count();
                            echo $nov;
                        ?>,
                        <?php
                            $dec = DB::table('kunjungan')->whereMonth('tgl_kunjungan','12')->count();
                            echo $dec;
                        ?>
                    ];
                    var data = [{
                        x:xArray,
                        y:yArray,
                        type:"bar"
                    }];
                    Plotly.newPlot("kunjunganPasien", data);
                }
                jml_penyakit();
            </script>
        </div>

        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" id="poli-kunjungan">
            <h5>Kunjungan Poli Klinik</h5>
            <div id="kunjunganPoli"></div>
            <script>
                function jml_penyakit(){
                    var xArray = [
                        <?php
                            $poli_gigi = DB::table('kunjungan')->where('id_poli','=','P-0003')->count();
                            echo $poli_gigi;
                        ?>,
                        <?php
                            $poli_gigi = DB::table('kunjungan')->where('id_poli','=','P-0001')->count();
                            echo $poli_gigi;
                        ?>,
                        <?php
                            $poli_gigi = DB::table('kunjungan')->where('id_poli','=','P-0004')->count();
                            echo $poli_gigi;
                        ?>,
                        <?php
                            $poli_gigi = DB::table('kunjungan')->where('id_poli','=','P-0002')->count();
                            echo $poli_gigi;
                        ?>
                    ];
                    var yArray = ["Gigi", "Umum", "MTBS", "KIA"];
                    var data = [{
                        x:xArray,
                        y:yArray,
                        type:"bar",
                        orientation:"h"
                    }];
                    Plotly.newPlot("kunjunganPoli", data);
                }
                jml_penyakit();
            </script>
        </div>
        
    </div>
</div>