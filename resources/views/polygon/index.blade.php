@extends('dashboard.main')
@section('content')
    <div class="container-fluid mt-4">
        <div id="map" style="width: 100%; height: 800px"></div>
    </div>

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
        } else {
            window.location.href = '/polygon/add'
        }
    </script>
@endsection
