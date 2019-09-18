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
        #over_map {
            position: absolute;
            top: 10px;
            left: 89%;
            z-index: 99;
            background-color: #ccffcc;
            padding: 10px;
        }
    </style>
</head>
<body>

    <div id="map"></div>

    <div id="over_map">
        <div>
            <span>Online Buses: </span><span id="buses">0</span>
        </div>
    </div>

    <!-- jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/6.6.1/firebase.js"></script>

    <!-- TODO: Add SDKs for Firebase products that you want to use
        https://firebase.google.com/docs/web/setup#config-web-app -->

    <script>
        // Your web app's Firebase configuration
        var firebaseConfig = {
            apiKey: "AIzaSyBfSDMPSQtF9AVgu6M0w55-k6uTJ1YRfyg",
            authDomain: "bsproject-251005.firebaseapp.com",
            databaseURL: "https://bsproject-251005.firebaseio.com",
            projectId: "bsproject-251005",
            storageBucket: "",
            messagingSenderId: "676642236343",
            appId: "1:676642236343:web:9960edb7f8d1259adaea32"
        };
        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
    </script>

    {{-- <script>
        var buses_Ref = firebase.database().ref('online_drivers/');
        buses_Ref.on('child_added', function (snapshot) {
            snapshot.forEach(function(data) {
                console.log(data.val().route_name);
            })
        });
    </script> --}}

    <script>
       
        var buses_count = 0;
        var markers = [];
        var map;
        function initMap() { 
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 9.562389, lng:  44.077011},
                zoom: 14,
                mapTypeId: 'terrain'
            });

            function AddBus(data) {
                var uluru = { lat: parseFloat(data.val().lat), lng: parseFloat(data.val().long) };
                console.log(uluru);

                var marker = new google.maps.Marker({
                    position: uluru,
                    icon: "{{URL::asset('assets/img/bus_icon.png')}}/",
                    map: map
                });

                // // console.log(data.val().lat);
                markers[data.key] = marker; 
                document.getElementById("buses").innerHTML = buses_count;
            }

            var buses_Ref = firebase.database().ref('online_drivers/');
            buses_Ref.on('child_added', function (snapshot) {
                snapshot.forEach(function(data) {
                    buses_count++;
                    AddBus(data);
                    // console.log(data.val().long);
                })
            });

        }

        // var buses_Ref = firebase.database().ref('online_drivers/');
        // buses_Ref.on('value', function (data) {
        //     buses_count++;
        //     // AddBus(data.val);
        //     console.log(data.val());
        // });


    </script>
    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA9cFPJpgNFZ5otplq5Wu7jSJer0WTbG2w&callback=initMap" 
        async defer>
    </script>
</body>
</html>

