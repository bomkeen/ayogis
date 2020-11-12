<?php

namespace app\controllers;

use yii;
use yii\helpers\ArrayHelper;
use app\models\CvdScore45Addr;
use app\models\Stage;
use app\models\Temp;
use yii\web\Response;
use yii\helpers\Json;
///map//
use dosamigos\google\maps\LatLng;
use dosamigos\google\maps\overlays\InfoWindow;
use dosamigos\google\maps\overlays\Marker;
use dosamigos\google\maps\Map;
use dosamigos\google\maps\overlays\PolylineOptions;
use dosamigos\google\maps\overlays\Polygon;

//map//
class GisController extends \yii\web\Controller {

    public $enableCsrfValidation = false;

   public function actionJsoncvd(){
            $temp = new Temp;
             $temp->stage = [1, 2, 3, 4, 5];
        $stage_for_q = implode(',', $temp->stage);
           $sql = \Yii::$app->db->createCommand("
             SELECT c.LATITUDE as lat,c.LONGITUDE as lng
,c.cid,c.SCORE_LEVEL,CONCAT(c.name,' ',c.LNAME) as pname,c.mix_dx as diag
,CONCAT(c.home_addr,' ม.' ,RIGHT(c.home_ccaattmm,2),' ',t.full_name) as fulladd
,if(c.sex=1,'ชาย','หญิง') as sex,c.age_y as age,c.L_RISK_SCORE as score
from cvd_score45_addr as c 
LEFT OUTER JOIN thaiaddress t on LEFT(home_ccaattmm,6)=t.addressid
where 
(c.LATITUDE >1 AND c.LATITUDE is NOT null)AND 
(c.LONGITUDE >1 AND c.LONGITUDE is NOT NULL) 
AND c.SCORE_LEVEL in ($stage_for_q) limit 10")->queryAll();
        $point = [];
          foreach ($sql as $value) {
             $p['type']='Feature';
             $p['properties']['title']=$value['pname'];
             $p['properties']['marker-size']='large';
             $p['properties']['marker-color']='#FF4500';
             $p['properties']['marker-symbol']='hospital';
             $p['geometry']['type']="Point";
             $p['geometry']['coordinates'][0]=$value['lng']*1  ;
             $p['geometry']['coordinates'][1]=$value['lat']*1  ;
             $p['lat']=$value['lat'];
             $p['lng']=$value['lng'];
             $point[]=$p;
         }
         return Json::encode($point);
    }
   
       public function actionMap() {
           
           return $this->render('map');
           
       }
         public function actionLmap() {
              $temp = new Temp;
             $temp->stage = [1, 2, 3, 4, 5];
        $stage_for_q = implode(',', $temp->stage);
           $plot = \Yii::$app->db->createCommand("
             SELECT c.LATITUDE as lat,c.LONGITUDE as lng
,c.cid,c.SCORE_LEVEL,CONCAT(c.name,' ',c.LNAME) as pname,c.mix_dx as diag
,CONCAT(c.home_addr,' ม.' ,RIGHT(c.home_ccaattmm,2),' ',t.full_name) as fulladd
,if(c.sex=1,'ชาย','หญิง') as sex,c.age_y as age,c.L_RISK_SCORE as score
from cvd_score45_addr as c 
LEFT OUTER JOIN thaiaddress t on LEFT(home_ccaattmm,6)=t.addressid
where 
(c.LATITUDE >1 AND c.LATITUDE is NOT null)AND 
(c.LONGITUDE >1 AND c.LONGITUDE is NOT NULL) 
AND c.SCORE_LEVEL in ($stage_for_q)")->queryAll();
              $geojson = \Yii::$app->db->createCommand("
             SELECT geojson from geojson WHERE areacode like '14%' and areatype in (2,3)")->queryAll();
           $json=Json::encode($geojson);
              return $this->render('lmap',[
               'geojson'=>$geojson,'json'=>$json,
               'plot'=>$plot
           ]);
           
       }
    public function actionIndex() {
        $temp = new Temp;
        $getlat=0;
        $getlng=0;
        $temp->stage = [1, 2, 3, 4, 5];
        $stage_for_q = implode(',', $temp->stage);
        $stage = ArrayHelper::map(Stage::find()->all(), 'stage', 'stage_name');
        $testfunction='ยังไม่ได้';
       
        if ($temp->load(Yii::$app->request->post())) {
            if ($temp->stage == NULL) {
                $stage_for_q = '0';
            } else {
                $stage_for_q = implode(',', $temp->stage);
            }
            $getlat=$temp->getlat;
            $getlng=$temp->getlng;
        }
        $plot = \Yii::$app->db->createCommand("
             SELECT c.LATITUDE as lat,c.LONGITUDE as lng
,c.cid,c.SCORE_LEVEL,CONCAT(c.name,' ',c.LNAME) as pname,c.mix_dx as diag
,CONCAT(c.home_addr,' ม.' ,RIGHT(c.home_ccaattmm,2),' ',t.full_name) as fulladd
,if(c.sex=1,'ชาย','หญิง') as sex,c.age_y as age,c.L_RISK_SCORE as score
from cvd_score45_addr as c 
LEFT OUTER JOIN thaiaddress t on LEFT(home_ccaattmm,6)=t.addressid
where 
(c.LATITUDE >1 AND c.LATITUDE is NOT null)AND 
(c.LONGITUDE >1 AND c.LONGITUDE is NOT NULL) 
AND c.SCORE_LEVEL in ($stage_for_q)")->queryAll();

        $polygonData = \Yii::$app->db->createCommand("SELECT 
lat as latdata,lng as lngdata,areaname as tname 
FROM gis_bomkeen where areacode=14 ")->queryAll();

        
        return $this->render('index', [
                    'plot' => $plot,
                    'polygonData' => $polygonData,
                    'temp' => $temp,
                    'stage' => $stage
                    ,'getlat'=>$getlat,'getlng'=>$getlng
                        //'polygonAlert' => $polygonAlert
        ]);
    }

}
