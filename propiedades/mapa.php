<?php
    $mapa = htmlentities($_GET['mapa']);
    $address = urlencode($mapa); 
    $url="https://maps.google.com/maps/api/geocode/json?sensor=false&address=".$address;
    $response = file_get_contents($url);
    $json = json_decode($response,true);
    $lat = $json['results'][0]['geometry']['location']['lat'];
    $lng = $json['results'][0]['geometry']['location']['lng'];

    echo $lat;
    echo "<br>";
    echo $lng;
?>
<!-- para el mapa corregi -->
<!DOCTYPE html>
<html>
  <head>
    <title>Marker Animations</title>
    <style media="screen">
        html, body{
            heigth
        }
    </style>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link rel="stylesheet" type="text/css" href="./style.css" />
    <script src="./index.js"></script>
  </head>
  <body>
    <div id="map"></div>

    
    <script>
        let marker;

        function initMap() {
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 13,
            center: { lat: 59.325, lng: 18.07 },
        });

        marker = new google.maps.Marker({
            map,
            draggable: true,
            animation: google.maps.Animation.DROP,
            position: { lat: 59.327, lng: 18.067 },
        });
        marker.addListener("click", toggleBounce);
        }

        function toggleBounce() {
        if (marker.getAnimation() !== null) {
            marker.setAnimation(null);
        } else {
            marker.setAnimation(google.maps.Animation.BOUNCE);
        }
        }
    </script>
    
    <script
        src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap&v=weekly"
      async
    ></script>
  </body>
</html>