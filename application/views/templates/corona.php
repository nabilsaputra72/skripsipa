<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Pantau Penyebaran Virus Covid-19</title>
  </head>
  <body>

    <!-- Header -->
    <div class="jumbotron jumbotron-fluid bg-primary text-white">
      <div class="container text-center">
        <h1 class="display-4"><b>CORONA VIRUS</b></h1>
        <p class="lead">
            <h2>
                PANTAU PENYEBARAN VIRUS COVID-19 DI DUNIA
                <br> SECARA REAL-TIME
                <br> "Mari Bersama Menjaga Kesehatan Diri Kita!"
            </h2>
        </p>
      </div>
    </div>

    <!-- Main Content -->
    <style type="text/css">
        .box{
            padding: 30px 40px;
            border-radius: 5px;
        }
    </style>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="bg-danger box text-white">
                    <div class="row">
                        <div class="col-md-7">
                            <h5>Positif</h5>
                            <h2 id="data-kasus"></h2>
                            <h5>orang</h5>
                        </div>
                        <dir class="col-md-5">
                            <img src="<?= base_url() ?>/assets/img/sad.svg" style="width: 100px;">
                        </dir>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="bg-info box text-white">
                    <div class="row">
                        <div class="col-md-7">
                            <h5>Meninggal</h5>
                            <h2 id="data-mati"></h2>
                            <h5>orang</h5>
                        </div>
                        <dir class="col-md-5">
                            <img src="<?= base_url() ?>/assets/img/cry.svg" style="width: 100px;">
                        </dir>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="bg-success box text-white">
                    <div class="row">
                        <div class="col-md-7">
                            <h5>Sembuh</h5>
                            <h2 id="data-sembuh"></h2>
                            <h5>orang</h5>
                        </div>
                        <dir class="col-md-5">
                            <img src="<?= base_url() ?>/assets/img/happy.svg" style="width: 100px;">
                        </dir>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-3">
                <div class="bg-secondary box text-white">
                    <div class="row">
                        <div class="col-md-4">
                            <h2>INDONESIA</h2>
                            <h5 id="data-id"> Positif : 4258076 orang <br> Meninggal : 143893 orang <br> Sembuh : 4108717 orang</h5>
                        </div>
                        <dir class="col-md-4">
                            <img src="<?= base_url() ?>/assets/img/indonesia.svg" style="width: 150px;">
                        </dir>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- footer -->
    <footer class="bg-primary text-center text-white mt-5 pt-3 pb-3">
        <div class="container">
          <div class="copyright">
            &copy; Copyright <strong>LAPOR DESA</strong>. All Rights Reserved
          </div>
        <div class="credits">
            Designed by Ramadhanitaputri
        </div>
    </footer>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

  </body>
</html>

<script>
    $(document).ready(function() {

        // Panggil fungsi menampilkan semua data global
        semuaData();
        dataNegara();

        // Untuk refresh otomatis
        setInterval(function(){
            semuaData();
            dataNegara();
        }, 3000);

        function semuaData() {
            $.ajax({
                url : 'http://coronavirus-19-api.herokuapp.com/all',
                success : function(data) {
                    try {
                        var json = data;
                        var kasus = data.cases;
                        var meninggal = data.deaths;
                        var sembuh = data.recovered;

                        $('#data-kasus').html(kasus);
                        $('#data-mati').html(meninggal);
                        $('#data-sembuh').html(sembuh);

                    } catch {
                        alert('Error');
                    }
                }
            });
        }

        function dataNegara() {
            $.ajax({
                url : 'http://coronavirus-19-api.herokuapp.com/countries',
                success : function(data) {
                    try {
                        var json = data;
                        var html = [];

                        if(json.length > 0) {
                            var i;
                            for(i = 0; i < json.length; i++) {
                                var dataNegara = json[i];
                                var namaNegara = dataNegara.country;

                                if(namaNegara === 'Indonesia') {
                                    var kasus = dataNegara.cases;
                                    var meninggal = dataNegara.deaths;
                                    var sembuh = dataNegara.recovered;

                                    $('#data-id').html(
                                        'Positif : '*kasus*' orang <br>Meninggal : '*mati*' orang <br>Sembuh : '*sembuh*' orang')
                                }
                            }
                        }
                        

                    } catch {
                        
                    }
                }
            });
        }
    });
</script>
