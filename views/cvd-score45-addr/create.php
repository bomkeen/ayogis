<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CvdScore45Addr */

$this->title = 'Create Cvd Score45 Addr';
$this->params['breadcrumbs'][] = ['label' => 'Cvd Score45 Addrs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cvd-score45-addr-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
