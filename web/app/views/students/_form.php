<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Students */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="students-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'student_course_id')->textInput() ?>

    <?= $form->field($model, 'student_speciality_id')->textInput() ?>

    <?= $form->field($model, 'student_fname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'student_lname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'student_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'student_fnumber')->textInput() ?>

    <?= $form->field($model, 'student_education_form')->dropDownList([ 'Р' => 'Р', 'З' => 'З', '' => '', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
