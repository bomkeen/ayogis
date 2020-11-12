<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CvdScore45Addr */

$this->title = 'Update Cvd Score45 Addr: ' . $model->NAME;
$this->params['breadcrumbs'][] = ['label' => 'Cvd Score45 Addrs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->NAME, 'url' => ['view', 'id' => $model->CID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cvd-score45-addr-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
