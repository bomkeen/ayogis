<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CvdScore45Addr */

$this->title = $model->NAME;
$this->params['breadcrumbs'][] = ['label' => 'Cvd Score45 Addrs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cvd-score45-addr-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->CID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->CID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'CID',
            'NAME',
            'LNAME',
            'SEX',
            'BIRTH',
            'AGE_Y',
            'NATION',
            'TYPEAREA',
            'DISCHARGE',
            'source_tb',
            'hosp_dx',
            'mix_dx',
            't_mix_dx',
            'date_dx',
            'type_dx',
            'L_SMOKING',
            'L_SMOKE_DATE',
            'L_SMOKE_HOSPCODE',
            'L_SMOKE_SOURCE',
            'L_SBP',
            'L_SBP_DATE',
            'L_SBP_HOSPCODE',
            'L_SBP_SOURCE',
            'L_CHOL',
            'L_CHOL_DATE',
            'L_CHOL_HOSPCODE',
            'L_WAIST_CM',
            'L_WAIST_DATE',
            'L_WAIST_HOSPCODE',
            'L_WAIST_SOURCE',
            'L_HEIGHT_DATE',
            'L_HEIGHT_HOSPCODE',
            'L_HEIGHT_SOURCE',
            'L_RISK_SCORE',
            'SCORE_LEVEL',
            'home_hospcode',
            'home_addr',
            'home_ccaattmm',
            'addr1_hospcode',
            'addr1_addr',
            'addr1_ccaattmm',
            'addr2_hospcode',
            'addr2_addr',
            'addr2_ccaattmm',
            'owner_hospcode',
            'LATITUDE',
            'LONGITUDE',
        ],
    ]) ?>

</div>
