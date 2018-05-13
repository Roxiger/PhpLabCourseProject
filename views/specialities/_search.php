<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SpecialitiesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="specialities-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'speciality_name_long') ?>


    <div class="form-group">
        <?= Html::submitButton('Търси', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
