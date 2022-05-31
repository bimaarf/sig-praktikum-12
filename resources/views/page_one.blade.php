<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peta Dasar Leaflet Js</title>
    <style>
        #peta {
            height: 680px;
        }

    </style>

    <!-- css leaflfet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />

    <!-- leafletjs -->
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>

    <!-- leaflet search -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-geosearch@3.0.0/dist/geosearch.css" />
    <script src="https://unpkg.com/leaflet-geosearch@3.0.0/dist/geosearch.umd.js"></script>
    <style>
        #map {
            height: 180px;
        }

    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <h1 style="text-align: center">Membuat Plugin Search di Leafler Js </h1>
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-lg-8">
                <div id="peta"></div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Point</h5>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <select class="form-select form-select-lg" aria-label="Default select example">
                                <option selected>- Pilih -</option>
                                <option value="1">Untan</option>
                                <option value="2">Fmipa</option>
                                <option value="3">FKIP</option>
                              </select>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/leaflet-geosearch@3.0.0/dist/geosearch.umd.js"></script>
    <link href="https://unpkg.com/leaflet-geosearch@latest/assets/css/leaflet.css" rel="stylesheet" />
    <script src="https://unpkg.com/leaflet-geosearch@latest/dist/bundle.min.js"></script>
    <script>
        var map = L.map('peta').setView([-2.548926, 118.0148634], 5);
        L.marker([50.5, 30.5]).addTo(map);
        L.tileLayer(
            'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiYmltYWFyaWZhIiwiYSI6ImNsMXlpdDZoMzBkMXMzY281YTM5NXVsZmUifQ.fY9A5bvhZZY6eI7VrioF3A', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                maxZoom: 18,
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1,
                accessToken: 'your.mapbox.access.token'
            }).addTo(map);
        <?php foreach ($jsonData['list_data'] as $value) { ?>
        L.marker([
                <?php echo $value['lokasi']['lat']; ?>,
                <?php echo $value['lokasi']['lon']; ?>
            ]).addTo(map)
            //data ditampilkan di dalam bindPopup( data ) dan

            // dapat dikustomisasi dengan html
            .bindPopup(`

<?php
echo '
<p>' .
    $value['key'] .
    '</p>
<table style="width: 100%; font-size:

10px;" class="table table-borderless table-striped">

<tr>
<td>JUMLAH KASUS</td>

<td>' .
    $value['jumlah_kasus'] .
    '</td>
</tr>
<tr>
<td>JUMLAH SEMBUH</td>

<td>' .
    $value['jumlah_sembuh'] .
    '</td>
</tr>
<tr>
<td>JUMLAH MENINGGAL</td>

<td>' .
    $value['jumlah_meninggal'] .
    '</td>
</tr>
<tr>
<td>JUMLAH DIRAWAT</td>

<td>' .
    $value['jumlah_dirawat'] .
    '</td>
</tr>
</table>
';
?>`)
        <?php } ?>

        // geo search

        // instead of import {} from 'leaflet-geosearch', use the `window` global
        var GeoSearchControl = window.GeoSearch.GeoSearchControl;
        var OpenStreetMapProvider = window.GeoSearch.OpenStreetMapProvider;

        // remaining is the same as in the docs, accept for the var instead of const declarations
        var provider = new OpenStreetMapProvider();

        var searchControl = new GeoSearchControl({
            provider: provider,
        });

        map.addControl(searchControl);
    </script>
</body>

</html>
