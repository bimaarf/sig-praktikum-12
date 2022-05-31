@extends('dashboard.main')
@section('content')
    <style>
        #marker {
            background-image: url('https://docs.mapbox.com/mapbox-gl-js/assets/washington-monument.jpg');
            background-size: cover;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            cursor: pointer;
        }

        .mapboxgl-popup {
            max-width: 200px;
        }

    </style>

    <div class="container-fluid mt-4">
        <div id="map" style="width: 100%; height: 800px"></div>
    </div>

    <script>
        if ({{ count($point) }} > 0) {
            mapboxgl.accessToken =
                'pk.eyJ1IjoiYmltYWFyaWZhIiwiYSI6ImNsMXlpdDZoMzBkMXMzY281YTM5NXVsZmUifQ.fY9A5bvhZZY6eI7VrioF3A';
            const monument = [{{ $longtitude }}, {{ $latitude }}];
            const map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styles/mapbox/light-v10',
                center: monument,
                zoom: 15
            });

            // create the popup
            const popup = new mapboxgl.Popup({
                offset: 25
            }).setText(
                '{{ $description }}'
            );

            // create DOM element for the marker
            const el = document.createElement('div');
            el.id = 'marker';

            // create the marker
            new mapboxgl.Marker(el)
                .setLngLat(monument)
                .setPopup(popup) // sets a popup on this marker
                .addTo(map);
        }else {
            mapboxgl.accessToken =
                'pk.eyJ1IjoiYmltYWFyaWZhIiwiYSI6ImNsMXlpdDZoMzBkMXMzY281YTM5NXVsZmUifQ.fY9A5bvhZZY6eI7VrioF3A';
            const monument = [109.34486798969118, -0.06033202877978198];
            const map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styles/mapbox/light-v10',
                center: monument,
                zoom: 15
            });

            // create the popup
            const popup = new mapboxgl.Popup({
                offset: 25
            }).setText(
                'DEFAULT DATA'
            );

            // create DOM element for the marker
            const el = document.createElement('div');
            el.id = 'marker';

            // create the marker
            new mapboxgl.Marker(el)
                .setLngLat(monument)
                .setPopup(popup) // sets a popup on this marker
                .addTo(map);
        }
    </script>
@endsection
