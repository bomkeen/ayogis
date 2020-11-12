<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SearchCvdScore45Addr */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cvd-score45-addr-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'CID') ?>

    <?= $form->field($model, 'NAME') ?>

    <?= $form->field($model, 'LNAME') ?>

    <?= $form->field($model, 'SEX') ?>

    <?= $form->field($model, 'BIRTH') ?>

    <?php // echo $form->field($model, 'AGE_Y') ?>

    <?php // echo $form->field($model, 'NATION') ?>

    <?php // echo $form->field($model, 'TYPEAREA') ?>

    <?php // echo $form->field($model, 'DISCHARGE') ?>

    <?php // echo $form->field($model, 'source_tb') ?>

    <?php // echo $form->field($model, 'hosp_dx') ?>

    <?php // echo $form->field($model, 'mix_dx') ?>

    <?php // echo $form->field($model, 't_mix_dx') ?>

    <?php // echo $form->field($model, 'date_dx') ?>

    <?php // echo $form->field($model, 'type_dx') ?>

    <?php // echo $form->field($model, 'L_SMOKING') ?>

    <?php // echo $form->field($model, 'L_SMOKE_DATE') ?>

    <?php // echo $form->field($model, 'L_SMOKE_HOSPCODE') ?>

    <?php // echo $form->field($model, 'L_SMOKE_SOURCE') ?>

    <?php // echo $form->field($model, 'L_SBP') ?>

    <?php // echo $form->field($model, 'L_SBP_DATE') ?>

    <?php // echo $form->field($model, 'L_SBP_HOSPCODE') ?>

    <?php // echo $form->field($model, 'L_SBP_SOURCE') ?>

    <?php // echo $form->field($model, 'L_CHOL') ?>

    <?php // echo $form->field($model, 'L_CHOL_DATE') ?>

    <?php // echo $form->field($model, 'L_CHOL_HOSPCODE') ?>

    <?php // echo $form->field($model, 'L_WAIST_CM') ?>

    <?php // echo $form->field($model, 'L_WAIST_DATE') ?>

    <?php // echo $form->field($model, 'L_WAIST_HOSPCODE') ?>

    <?php // echo $form->field($model, 'L_WAIST_SOURCE') ?>

    <?php // echo $form->field($model, 'L_HEIGHT_DATE') ?>

    <?php // echo $form->field($model, 'L_HEIGHT_HOSPCODE') ?>

    <?php // echo $form->field($model, 'L_HEIGHT_SOURCE') ?>

    <?php // echo $form->field($model, 'L_RISK_SCORE') ?>

    <?php // echo $form->field($model, 'SCORE_LEVEL') ?>

    <?php // echo $form->field($model, 'home_hospcode') ?>

    <?php // echo $form->field($model, 'home_addr') ?>

    <?php // echo $form->field($model, 'home_ccaattmm') ?>

    <?php // echo $form->field($model, 'addr1_hospcode') ?>

    <?php // echo $form->field($model, 'addr1_addr') ?>

    <?php // echo $form->field($model, 'addr1_ccaattmm') ?>

    <?php // echo $form->field($model, 'addr2_hospcode') ?>

    <?php // echo $form->field($model, 'addr2_addr') ?>

    <?php // echo $form->field($model, 'addr2_ccaattmm') ?>

    <?php // echo $form->field($model, 'owner_hospcode') ?>

    <?php // echo $form->field($model, 'LATITUDE') ?>

    <?php // echo $form->field($model, 'LONGITUDE') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
