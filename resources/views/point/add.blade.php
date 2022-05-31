<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='utf-8' />
    <title>Points on a map</title>
    <meta name='viewport' content='width=device-width, initial-scale=1' />
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.css' rel='stylesheet' />
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        #map {
            position: absolute;
            top: 0;
            bottom: 0;
            width: 100%;
        }

    </style>
</head>

<body>
    <div id='map'></div>
    <script>
        // The value for 'accessToken' begins with 'pk...'
        mapboxgl.accessToken =
            'pk.eyJ1IjoiYmltYWFyaWZhIiwiYSI6ImNsMXlpdDZoMzBkMXMzY281YTM5NXVsZmUifQ.fY9A5bvhZZY6eI7VrioF3A';
        const map = new mapboxgl.Map({
            container: 'map',
            // Replace YOUR_STYLE_URL with your style URL.
            style: 'YOUR_STYLE_URL',
            center: [-87.661557, 41.893748],
            zoom: 10.7
        });
        /* 
        Add an event listener that runs
          when a user clicks on the map element.
        */
        map.on('click', (event) => {
            // If the user clicked on one of your markers, get its information.
            const features = map.queryRenderedFeatures(event.point, {
                layers: ['YOUR_LAYER_NAME'] // replace with your layer name
            });
            if (!features.length) {
                return;
            }
            const feature = features[0];

            // Code from the next step will go here.
        });
        // Code from the next step will go here.
    </script>
</body>

</html>
