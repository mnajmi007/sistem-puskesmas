<div class="graph">
    <div class="row">

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" id="jenis-pekerjaan">
            <h5>Jumlah Pasien Perbulan</h5>
            <div id="grafikPekerjaan"></div>
            <script>
                function jml_pekerjaan(){
                    var xArray = [
                        <?php
                            $januari = DB::table('pasien')->whereMonth('created_at','1')->count();
                            echo $januari;
                        ?>,
                        <?php
                            $feb = DB::table('pasien')->whereMonth('created_at','2')->count();
                            echo $feb;
                        ?>,
                        <?php
                            $mar = DB::table('pasien')->whereMonth('created_at','3')->count();
                            echo $mar;
                        ?>,
                        <?php
                            $apr = DB::table('pasien')->whereMonth('created_at','4')->count();
                            echo $apr;
                        ?>,
                        <?php
                            $may = DB::table('pasien')->whereMonth('created_at','5')->count();
                            echo $may;
                        ?>,
                        <?php
                            $jun = DB::table('pasien')->whereMonth('created_at','6')->count();
                            echo $jun;
                        ?>,
                        <?php
                            $jul = DB::table('pasien')->whereMonth('created_at','7')->count();
                            echo $jul;
                        ?>,
                        <?php
                            $aug = DB::table('pasien')->whereMonth('created_at','8')->count();
                            echo $aug;
                        ?>,
                        <?php
                            $sep = DB::table('pasien')->whereMonth('created_at','9')->count();
                            echo $aug;
                        ?>,
                        <?php
                            $oct = DB::table('pasien')->whereMonth('created_at','10')->count();
                            echo $oct;
                        ?>,
                        <?php
                            $nov = DB::table('pasien')->whereMonth('created_at','11')->count();
                            echo $nov;
                        ?>,
                        <?php
                            $dec = DB::table('pasien')->whereMonth('created_at','12')->count();
                            echo $dec;
                        ?>
                    ];
                    var yArray = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

                    var data = [{
                    x: xArray,
                    y: yArray,
                    type: "bar",
                    orientation: "h"
                    }];

                    Plotly.newPlot("grafikPekerjaan", data);
                }
                jml_pekerjaan();
            </script>
        </div>
        
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" id="jml-kecamatan">
            <h5>Jumlah Kepemilikan JKN</h5>
            <div id="grafikKecamatan"></div>
            <script>
                function jml_kecamatan(){
                    var xArray = ["Pasien JKN", "Pasien Non JKN"];
                    var yArray = [
                        20,30
                    ];
                    var data = [{labels:xArray, values:yArray, hole:.5, type:"pie"}];
                    Plotly.newPlot("grafikKecamatan", data);
                }
                jml_kecamatan();
            </script>
        </div>

        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 graph-hari_ini">
            <h5>Pendaftaran Pasien Hari ini</h5>
            <div class="card">
                <div class="card-body">
                    <div class="graph-graph_icon">
                        <span>
                            <i>
                                <svg style="width:40px;height:40px" viewBox="0 0 24 24">
                                    <path fill="#0C96C5" d="M13.07 10.41A5 5 0 0 0 13.07 4.59A3.39 3.39 0 0 1 15 4A3.5 3.5 0 0 1 15 11A3.39 3.39 0 0 1 13.07 10.41M5.5 7.5A3.5 3.5 0 1 1 9 11A3.5 3.5 0 0 1 5.5 7.5M7.5 7.5A1.5 1.5 0 1 0 9 6A1.5 1.5 0 0 0 7.5 7.5M16 17V19H2V17S2 13 9 13 16 17 16 17M14 17C13.86 16.22 12.67 15 9 15S4.07 16.31 4 17M15.95 13A5.32 5.32 0 0 1 18 17V19H22V17S22 13.37 15.94 13Z" />
                                </svg>
                            </i>
                        </span>
                    </div>
                    <h5><small>Pendaftaran Hari ini</small></h5>
                    <h3><b>{{ $count_pasienBaru }} pasien</b></h3>
                </div>
            </div>
        </div>

    </div>
</div>