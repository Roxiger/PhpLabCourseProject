<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\StudentsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="students-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'student_id') ?>

    <?= $form->field($model, 'student_course_id') ?>

    <?= $form->field($model, 'student_speciality_id') ?>

    <?= $form->field($model, 'student_fname') ?>

    <?= $form->field($model, 'student_lname') ?>

    <?php // echo $form->field($model, 'student_email') ?>

    <?php // echo $form->field($model, 'student_fnumber') ?>

    <?php // echo $form->field($model, 'student_education_form') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
