@extends('dashboard.main')
@section('content')
    <style>
        .calculation-box {
            height: 75px;
            width: 150px;
            position: absolute;
            bottom: 40px;
            left: 10px;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 15px;
            text-align: center;
        }

    </style>

    <script src="https://unpkg.com/@turf/turf@6/turf.min.js"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.2.2/mapbox-gl-draw.js"></script>
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.2.2/mapbox-gl-draw.css"
        type="text/css">

    <div id="map" style="width: 100%; height: 800%"></div>
        <div class="calculation-box">
            <p>Click the map to draw a polygon.

                kordinat =
            </p>
            <div id="calculated-area"></div>
        </div>

    <script>
        // TO MAKE THE MAP APPEAR YOU MUST
        // ADD YOUR ACCESS TOKEN FROM
        // https://account.mapbox.com
        mapboxgl.accessToken =
            'pk.eyJ1IjoiYmltYWFyaWZhIiwiYSI6ImNsMXlpdDZoMzBkMXMzY281YTM5NXVsZmUifQ.fY9A5bvhZZY6eI7VrioF3A';
        const map = new mapboxgl.Map({
            container: 'map', // container ID
            style: 'mapbox://styles/mapbox/light-v10', // style URL
            center: [109.34486798969118, -0.06033202877978198], // starting position
            zoom: 15 // starting zoom
        }); //-0.06033202877978198, 109.34486798969118

        const draw = new MapboxDraw({
            displayControlsDefault: false,
            // Select which mapbox-gl-draw control buttons to add to the map.
            controls: {
                polygon: true,
                trash: true
            },
            // Set mapbox-gl-draw to draw by default.
            // The user does not have to click the polygon control button first.
            defaultMode: 'draw_polygon'

        });
        map.addControl(draw);

        map.on('draw.create', updateArea);
        map.on('draw.delete', updateArea);
        map.on('draw.update', updateArea);

        function updateArea(e) {
            const data = draw.getAll();
            const answer = document.getElementById('calculated-area');
            if (data.features.length > 0) {
                const area = turf.area(data);
                // Restrict the area to 2 decimal points.
                const rounded_area = Math.round(area * 100) / 100;
                answer.innerHTML = `<p><strong>${rounded_area}</strong></p><p>square meters</p>`;



                $.ajax({
                    type: 'GET',
                    url: '/polygon/store/',
                    data: {
                        'coordinate': data,
                    },
                    success: function(response) {
                        console.log('sukses');
                        alert('Berhasil')
                    }
                });


            } else {
                answer.innerHTML = '';
                if (e.type !== 'draw.delete')
                    alert('Click the map to draw a polygon.');
                // ajax store
                const url = "/polygon/store"

            }

        }
    </script>
@endsection
