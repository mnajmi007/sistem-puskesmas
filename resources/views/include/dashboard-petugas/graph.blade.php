<div class="graph">
    <div class="row">

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" id="jml-penyakit">
            <h5>Jumlah Penyakit</h5>
            <div id="grafikPenyakit"></div>
            <script>
                function jml_penyakit(){
                    var xArray = ["Demam", "Pusing", "Batuk", "Flu", "Asma", "TBC", "Katarak", "Gigi Lubang"];
                    var yArray = [20, 15, 25, 12, 30, 18, 20, 38];
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
                    var xArray = ["Bendan Duwur", "Bendan Ngisor", "Gajahmungkur", "Karangrejo", "Lempongsari", "Petompon", "Sampangan"];
                    var yArray = [24, 56, 55, 147, 58, 39, 58, 78];
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
                    var xArray = ["Buruh", "Tidak Bekerja", "Wiraswasta", "BUMN", "Perkebunan", "Perdagangan", "Kepolisian", "TNI", "PNS", "Pelajar/Mahasiswa"];
                    var yArray = [100, 50, 50, 200, 400, 100, 50, 100, 25, 25];
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