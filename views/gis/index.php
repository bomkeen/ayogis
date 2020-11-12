<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\models\Stage;
//Google Library
use dosamigos\google\maps\LatLng;
use dosamigos\google\maps\overlays\InfoWindow;
use dosamigos\google\maps\overlays\Marker;
use dosamigos\google\maps\Map;
use dosamigos\google\maps\overlays\PolylineOptions;
use dosamigos\google\maps\overlays\Polygon;
use dosamigos\google\maps\overlays;
use dosamigos\google\maps\overlays\GroundOverlay;
use dosamigos\google\maps\overlays\GroundOverlayOptions;
use dosamigos\google\maps\layers\Layer;

//////////////////////js start/////////////////////////
$js = <<<JS
        alert();
if (navigator.geolocation) {
  navigator.geolocation.getCurrentPosition(function(loc){
        $('#getlat').val(loc.coords.latitude);
        $('#getlng').val(loc.coords.longitude);
        
  });
}
JS;
$this->registerJs($js);
/////// end JS//////////////////////////////
?>
<script type="text/javascript">

    function submitfilter() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (loc) {
                $('#getlat').val(loc.coords.latitude);
                $('#getlng').val(loc.coords.longitude);
                $('#filter').submit();
            });
        }
    }
//
//marker.addListener('mouseover', function() {
//    infowindow.open(map, this);
//});
</script>



<div class="row">
  <?php
    if ($getlat == '0') {
        $this->registerJs('submitfilter();');
    }
    ?>    <div class="col-md-10 col-lg-10 ">

        <?php
        $coord = new LatLng(['lat' => 14.39, 'lng' => 100.6006033]);
        $map = new Map([
            'center' => $coord,
            'zoom' => 8,
            'width' => '100%',
            'height' => '500',
        ]);
        ?>
        <?php
        foreach ($plot as $s) {
            $lat = $s['lat'];
            $lng = $s['lng'];
            $pname=$s['pname'];
            $diag=$s['diag'];
            $fulladd=$s['fulladd'];
            $coords = new LatLng(['lat' => $lat, 'lng' => $lng]); //กำหนด lat lng
            // สร้าง marker ในแผนที่
            if ($s['SCORE_LEVEL'] == 4) {
                $pin = "../img/pin4.png";
            } elseif ($s['SCORE_LEVEL'] == 5) {
                $pin = "../img/pin5.png";
            }
            $marker = new Marker([
                'position' => $coords,
                'icon' => $pin,
     
            ]);

            // กำหนด InfoWindow ให้กับ Marker
if(!Yii::$app->user->isGuest){
   
            $marker->attachInfoWindow(
                    new InfoWindow([
      
                'content' => '<table class="table">
    <tr>
        <th colspan="2">'.$pname.'</th>
    </tr>
    <tr>
        <th>เพศ '.$s['sex'].'</th><th>อายุ '.$s['age'].' ปี</th>
    </tr>
    <tr>
        <th colspan="2">'.$diag.'</th>
    </tr>
    <tr>
        <th colspan="2">RISK Score'.$s['score'].'</th>
    </tr>
    <tr>
        <th colspan="2">'.$fulladd.'</th>
    </tr>
</table>

        <a href="https://www.google.com/maps/dir/?api=1&destination='.$lat.','.$lng.'" target="_blank"><b>นำทาง</b></a>
        <a href="http://maps.google.com/maps?saddr=' . $getlat . ',' . $getlng . '&daddr=' . $lat . ',' . $lng . '" target="_blank">นำทาง</a>
            
'
                    ])
            );

}

            // นำ Marker ที่ได้ใส่ในแผนที่
            $map->addOverlay($marker);
        }

///////////////////////////// polygon 1 set start////////////////
        $poly = [];
        foreach ($polygonData as $p) {
            array_push($poly, new LatLng(['lng' => $p['lngdata'], 'lat' => $p['latdata']]));
        }
        $polygon = new Polygon([
            'paths' => $poly,
            'fillColor' => '#46C646',
            'fillOpacity' => 0.1
        ]);
        $polygon->attachInfoWindow(new InfoWindow([
            'content' => '<p>.' . $p['tname'] . '</p>'
        ]));
       $map->addOverlay($polygon);
          
        $bo =  new \dosamigos\google\maps\LatLngBounds(
                [
          'SouthWest' => new LatLng(['lng' => 97.3436965942383, 'lat' => 105.636787414551]),
          'northEast' => new LatLng(['lng' => 5.61273717880249, 'lat' => 20.4649257659912]),
    
        ]);
        $rain = new dosamigos\google\maps\overlays\GroundOverlay([
        'url' => 'http://tile.gistda.or.th/geoserver/flood/wms?service=WMS&version=1.1.0&request=GetMap&layers=flood:floodarea_tambon&styles=&bbox=97.3436965942383,5.61273717880249,105.636787414551,20.4649257659912&width=428&height=768&srs=EPSG:4326&format=image/png&transparent=true',
         'bounds'=> $bo,
         //'map' => $map
        ]);
        $map->addOverlay($rain);
        
//        $kml = new dosamigos\google\maps\layers\KmlLayer([
////        'url' => 'http://tile.gistda.or.th/geoserver/flood/wms?service=WMS&version=1.1.0&request=GetMap&layers=flood:floodarea_tambon&styles=&bbox=97.3436965942383,5.61273717880249,105.636787414551,20.4649257659912&width=428&height=768&srs=EPSG:4326&format=image/png&transparent=true',
//            'url'=>'https://developers.google.com/maps/documentation/javascript/examples/kml/westcampus.kml',
//            'map'=>$map
//        ]);
//  $map->addOverlay($kml);
       //////////////////polygon End//////////////////////
///////////////polygon for alert///////
//$map->addOverlay($polygonAlert);
///////////////polygon for alert end/////////////////
// กำหนดให้แสดงแผนที่
        echo $map->display();
/////////////
        ?>
        
        
  <!--<a href="http://maps.google.com/maps?saddr=' . $getlat . ',' . $getlng . '&daddr=' . $lat . ',' . $lng . '" target="_blank">นำทาง</a>-->

    </div>
    <div class="col-md-2 col-lg-2 ">
        <div class="panel-info">
            <div class="panel-heading">Menu</div>
            <div class="panel panel-body">

                <?php $form = ActiveForm::begin(['id' => 'filter']); ?>
                <?php $form->field($temp, 'getlat')->textInput(['maxlength' => true, 'id' => 'getlat']) ?>
                <?php  $form->field($temp, 'getlng')->textInput(['maxlength' => true, 'id' => 'getlng']) ?>
                <?php echo $form->field($temp, 'stage')->checkBoxList($stage); ?>

                <div class="form-group">
                    <?= Html::submitButton('ตกลง', ['class' => 'btn btn-primary', 'id' => 'filtersubmit']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

    </div>
</div>

