<div class="graph">
    <div class="row">

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" id="bulan-kunjungan">
            <h5>Kunjungan MTBS</h5>
            <div id="kunjunganPasien"></div>
            <script>
                function jml_kunjungan(){
                    var xArray = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
                    var yArray = [20, 15, 25, 12, 30, 18, 20, 38, 55, 45, 100, 80, 91];
                    var data = [{
                        x:xArray,
                        y:yArray,
                        type:"bar"
                    }];
                    Plotly.newPlot("kunjunganPasien", data);
                }
                jml_kunjungan();
            </script>
        </div>
        
    </div>
</div>