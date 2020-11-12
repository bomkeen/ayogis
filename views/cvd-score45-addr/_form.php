<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CvdScore45Addr */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cvd-score45-addr-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'CID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NAME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LNAME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SEX')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'BIRTH')->textInput() ?>

    <?= $form->field($model, 'AGE_Y')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NATION')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TYPEAREA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DISCHARGE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'source_tb')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hosp_dx')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mix_dx')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 't_mix_dx')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_dx')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type_dx')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'L_SMOKING')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'L_SMOKE_DATE')->textInput() ?>

    <?= $form->field($model, 'L_SMOKE_HOSPCODE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'L_SMOKE_SOURCE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'L_SBP')->textInput() ?>

    <?= $form->field($model, 'L_SBP_DATE')->textInput() ?>

    <?= $form->field($model, 'L_SBP_HOSPCODE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'L_SBP_SOURCE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'L_CHOL')->textInput() ?>

    <?= $form->field($model, 'L_CHOL_DATE')->textInput() ?>

    <?= $form->field($model, 'L_CHOL_HOSPCODE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'L_WAIST_CM')->textInput() ?>

    <?= $form->field($model, 'L_WAIST_DATE')->textInput() ?>

    <?= $form->field($model, 'L_WAIST_HOSPCODE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'L_WAIST_SOURCE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'L_HEIGHT_DATE')->textInput() ?>

    <?= $form->field($model, 'L_HEIGHT_HOSPCODE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'L_HEIGHT_SOURCE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'L_RISK_SCORE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SCORE_LEVEL')->textInput() ?>

    <?= $form->field($model, 'home_hospcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'home_addr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'home_ccaattmm')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'addr1_hospcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'addr1_addr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'addr1_ccaattmm')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'addr2_hospcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'addr2_addr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'addr2_ccaattmm')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'owner_hospcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LATITUDE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LONGITUDE')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
