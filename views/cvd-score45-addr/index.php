<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchCvdScore45Addr */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cvd Score45 Addrs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cvd-score45-addr-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Cvd Score45 Addr', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'CID',
            'NAME',
            'LNAME',
            'SEX',
            'BIRTH',
            // 'AGE_Y',
            // 'NATION',
            // 'TYPEAREA',
            // 'DISCHARGE',
            // 'source_tb',
            // 'hosp_dx',
            // 'mix_dx',
            // 't_mix_dx',
            // 'date_dx',
            // 'type_dx',
            // 'L_SMOKING',
            // 'L_SMOKE_DATE',
            // 'L_SMOKE_HOSPCODE',
            // 'L_SMOKE_SOURCE',
            // 'L_SBP',
            // 'L_SBP_DATE',
            // 'L_SBP_HOSPCODE',
            // 'L_SBP_SOURCE',
            // 'L_CHOL',
            // 'L_CHOL_DATE',
            // 'L_CHOL_HOSPCODE',
            // 'L_WAIST_CM',
            // 'L_WAIST_DATE',
            // 'L_WAIST_HOSPCODE',
            // 'L_WAIST_SOURCE',
            // 'L_HEIGHT_DATE',
            // 'L_HEIGHT_HOSPCODE',
            // 'L_HEIGHT_SOURCE',
            // 'L_RISK_SCORE',
            // 'SCORE_LEVEL',
            // 'home_hospcode',
            // 'home_addr',
            // 'home_ccaattmm',
            // 'addr1_hospcode',
            // 'addr1_addr',
            // 'addr1_ccaattmm',
            // 'addr2_hospcode',
            // 'addr2_addr',
            // 'addr2_ccaattmm',
            // 'owner_hospcode',
            // 'LATITUDE',
            // 'LONGITUDE',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
