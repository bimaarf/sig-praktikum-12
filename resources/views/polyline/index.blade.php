@extends('dashboard.main')
@section('content')
<div class="container-fluid mt-4">
    <div id="map" style="width: 100%; height: 800px"></div>
</div>
    <script>
        if ("{{ count($polyline) }}" > 0) {
            mapboxgl.accessToken =
                'pk.eyJ1IjoiYmltYWFyaWZhIiwiYSI6ImNsMXlpdDZoMzBkMXMzY281YTM5NXVsZmUifQ.fY9A5bvhZZY6eI7VrioF3A';
            const map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styles/mapbox/streets-v11',
                center: [109.34486798969118, -0.06033202877978198],
                zoom: 15
            });
    
            map.on('load', () => {
                map.addSource('route', {
                    'type': 'geojson',
                    'data': {!! $coordinate !!}
                });
                map.addLayer({
                    'id': 'route',
                    'type': 'line',
                    'source': 'route',
                    'layout': {
                        'line-join': 'round',
                        'line-cap': 'round'
                    },
                    'paint': {
                        'line-color': '#888',
                        'line-width': 8
                    }
                });
            });
        } else {
            window.location.href = '/polyline/add'
        }
    </script>

@endsection