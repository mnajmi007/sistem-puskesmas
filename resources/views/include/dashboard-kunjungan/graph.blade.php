<div class="graph">
    <div class="row">

        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" id="bulan-kunjungan">
            <h5>Kunjungan Pasien</h5>
            <div id="kunjunganPasien"></div>
            <script>
                function jml_penyakit(){
                    var xArray = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
                    var yArray = [20, 15, 25, 12, 30, 18, 20, 38, 55, 45, 100, 80, 91];
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
                    var xArray = [20, 15, 25, 12];
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