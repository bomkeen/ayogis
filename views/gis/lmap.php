<?php

use yii\helpers\Url;

$json_cvd = Url::to(['jsoncvd']);
$web = \Yii::getAlias('@web');
?>


<html>
    <head>
        <title>My Leaflet.js Map</title>
        <link href="../inc/leaflet.css" rel="stylesheet" type="text/css"/>
        <script src="../inc/leaflet-src.js" type="text/javascript"></script>
        <style>
            #map {
                height: 500px;

            }

        </style>
        <script type="text/javascript">
            function init() {
                var polygon, latlngs
                var map = L.map('map').setView([14.39, 100.6006033], 10);

                attrLink = 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, under <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a>. Data by <a href="http://openstreetmap.org">OpenStreetMap</a>, under <a href="http://creativecommons.org/licenses/by-sa/3.0">CC BY SA</a>.'
                attrLinkToner = 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, under <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a>. Data by <a href="http://openstreetmap.org">OpenStreetMap</a>, under <a href="http://www.openstreetmap.org/copyright">ODbL</a>.';

                var tonerMap = L.tileLayer(
                        'http://{s}.tile.stamen.com/toner/{z}/{x}/{y}.png', {
                            attribution: attrLinkToner,
                            maxZoom: 18,
                        }).addTo(map);

                var googleStreet = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}&hl=th', {
                    maxZoom: 20,
                    subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
                }).addTo(map);
                var baseLayers = {
                    "Stamen Toner": tonerMap,
                    "Google Street": googleStreet
                };

                /////////overlay/////////
                var flood_update = L.tileLayer.wms('http://tile.gistda.or.th/geoserver/flood/wms?', {
                    layers: "floodarea_tambon",
                    transparent: true,
                    format: 'image/png',
                    tiles: true,
                    attribution: '<a href="http://flood.gistda.or.th" target="_blank"><b>GISTDA THAILAND</b></a>'
                });
                var flood_percent = L.tileLayer.wms('http://tile.gistda.or.th/geoserver/wms?', {
                    layers: "flood:flood_percent",
                    transparent: true,
                    format: 'image/png',
                    //opacity:1,
                    tiles: true,
                    attribution: '<a href="http://flood.gistda.or.th" target="_blank"><b>GISTDA THAILAND</b></a>'

                });
              
                

                var pubLatLng = L.latLng(14.171499, 100.371631);
                var pubMarker = L.marker(pubLatLng,
                        {
                            title: "ทดสอบภาษาไทย title",
                            alt: "The bomkeen"
                        }).addTo(map);
                
                var polygon = [<?php
                    foreach ($geojson as $p) {
                        echo $p['geojson'];
                        echo ',';
                    }
                ?>];
                L.geoJSON(polygon, {
                    style: function (feature) {
                    }
                }).bindPopup("ทดสอบ popup").addTo(map);
                  var overlays = {
                    'พื้นที่น้ำท่วมรอบ7วัน': flood_update,
                    'พื้นที่น้ำท่วมรายตำบลรอบ 7 วัน': flood_percent,
                    
                };
                L.control.layers(baseLayers, overlays).addTo(map);
                            showCoffeeShops(map);
            }
 function showCoffeeShops(map) {

            var mugIcon = L.icon({
                //iconUrl: "./images/mug.png",
                iconSize: [25,25]
            });
            $.getJSON('<?php echo $web ; ?>/index.php?r=gis/jsoncvd', function(data) {
                for (var i = 0; i < data.length; i++) {
                    var location = new L.LatLng(data[i].lat, data[i].lng);
               
                    var marker = new L.Marker(location, {
                       // icon: mugIcon,
                        title: 'ทดสอบ'
                    });
                    var content = 'mcmcmcmcmcmc';

                    marker.bindPopup(content, {
                        maxWidth: '200'
                    });
                    marker.addTo(map);
                }
            });
        }
        </script>

    </head>



    <body onload=init()>
<?php 

echo $json ;
?>
        <div id="map"></div>
    </body>

</html>
