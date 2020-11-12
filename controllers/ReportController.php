<?php

namespace app\controllers;

use yii;

class ReportController extends \yii\web\Controller {

    public $enableCsrfValidation = false;

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionReport1() {
        $dist = '01';
        if (Yii::$app->request->isPost) {
            $request = Yii::$app->request;
            $dist = $request->post('dist');
        }
        $sql = "SELECT 
c.owner_hospcode,h.hosname,h.distcode
,COUNT(DISTINCT c.CID) as n
,SUM(CASE WHEN (c.LATITUDE IS NULL OR c.LONGITUDE IS NULL) THEN 1 ELSE 0 END) as t
 from cvd_score45_addr as c 
JOIN chospital h ON c.owner_hospcode=h.hoscode
WHERE c.owner_hospcode is NOT NULL". 
" and h.distcode like '%$dist%' "
."GROUP BY c.owner_hospcode ORDER BY h.distcode ";
        $d_list = \Yii::$app->db->createCommand("SELECT amppart as dist,name as dist_name from thaiaddress WHERE chwpart=14 AND amppart<>00 AND amppart<=16 GROUP BY amppart")->queryAll();
        if($dist==''){
            $d_name='เลือกทั้งหมด';
        }  else {
            $d_name=\Yii::$app->db->createCommand("SELECT name as dist_name from thaiaddress WHERE chwpart=14 AND amppart<>00 AND amppart=$dist GROUP BY amppart")->queryScalar();
        }
        
        $rs = \Yii::$app->db->createCommand("$sql")->queryAll();
        $dataProvider = new \yii\data\ArrayDataProvider([
            'allModels' => $rs,
            'pagination' => FALSE,
        ]);
        return $this->render('report1', [
                    'dataProvider' => $dataProvider,
                    'dist' => $dist, 'd_list' => $d_list
                ,'d_name'=>$d_name
        ]);
    }

}
