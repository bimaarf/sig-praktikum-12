<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Add a polygon to a map using a GeoJSON source</title>
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.8.2/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.8.2/mapbox-gl.js"></script>
    <style>
        /* body { margin: 0; padding: 0; } */
        /* #map { position: absolute; top: 0; bottom: 0; width: 100%; } */

    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-lg-8">
                <div id="map" style="width: 100%; height: 800px"></div>
            </div>
            <div class="col-lg-4">
                <select class="form-select form-select-lg coordinate" name="" id="coordinate" onchange="myFunction()">
                    @foreach ($polygon as $item)
                        <option id="poly{{ $item->id }}" value="{!! $item->coordinate !!}">{!! $item->coordinate !!}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script>
        if ("{{ count($polygon) }}" > 0) {

            mapboxgl.accessToken =
                'pk.eyJ1IjoiYmltYWFyaWZhIiwiYSI6ImNsMXlpdDZoMzBkMXMzY281YTM5NXVsZmUifQ.fY9A5bvhZZY6eI7VrioF3A';
            const map = new mapboxgl.Map({
                container: 'map', // container ID
                style: 'mapbox://styles/mapbox/light-v10', // style URL
                center: [109.34486798969118, -0.06033202877978198], // starting position
                zoom: 15 // starting zoom
            });
    
            map.on('load', () => {
                // Add a data source containing GeoJSON data.
    
                map.addSource('maine', {
                    'type': 'geojson',
                    'data': {!! $coordinate !!}
                });
    
                // Add a new layer to visualize the polygon.
                map.addLayer({
                    'id': 'maine',
                    'type': 'fill',
                    'source': 'maine', // reference the data source
                    'layout': {},
                    'paint': {
                        'fill-color': '#0080ff', // blue color fill
                        'fill-opacity': 0.5
                    }
                });
                // Add a black outline around the polygon.
                map.addLayer({
                    'id': 'outline',
                    'type': 'line',
                    'source': 'maine',
                    'layout': {},
                    'paint': {
                        'line-color': '#000',
                        'line-width': 3
                    }
                });
            });
        }else {
            alert('Map belum diinputkan');
            
        }
    </script>

</body>

</html>
