{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width='device-width', initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {!! $map['js'] !!}
</head>
<body>
    {!! $map['html'] !!}
</body>
<script>
    // google.maps.event.addListener(map, "click", function (e) {
    //     var latLng = e.latLng;
    //     conosle.log(latlng);
    // });

    // google.maps.event.addListener(map, 'click', function(event) {
    //     marker = new google.maps.Marker({position: event.latLng, map: map});
    // });
</script>
</html> --}}


<!DOCTYPE html>
<html lang="en">
<head>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
          height: 500px;
        }
        /* Optional: Makes the sample page fill the window. */
        html, body {
          height: 100%;
          margin: 0;
          padding: 0;
        }
    </style>
    <title>Document</title>
</head>
<body>

    <div id="map"></div>

    <script>
       
        var map;
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 9.562389, lng:  44.077011},
                zoom: 14
            });

            // var stations = {!! json_encode($stations->toArray()) !!};
            var stations = {!! json_encode($stations->toArray(), JSON_HEX_TAG) !!};
            stations.forEach(myFunction);

            function myFunction(item, index) {
                var latitude = parseFloat(item.lat);
                var longitude = parseFloat(item.long);
                var LatLng = {lat: latitude, lng: longitude};

                var marker = new google.maps.Marker({
                    position: LatLng,
                    map: map,
                    title: item.name
                });            
            }

        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA9cFPJpgNFZ5otplq5Wu7jSJer0WTbG2w&callback=initMap"
        async defer>
    </script>
</body>
</html>

