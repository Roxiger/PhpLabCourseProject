<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Specialities;

/* @var $this yii\web\View */
/* @var $model app\models\StudentsAssessmentsSearchs */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="students-assessments-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>


    <?= $form->field($model, 'sa_student_id') ?>

    <?php  echo $form->field($model, 'sa_assesment') ?>

    <div class="form-group">
        <?= Html::submitButton('Търси', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
