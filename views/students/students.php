<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Students */
/* @var $form ActiveForm */
?>
<?php
    /**
     * @TODO
     * Dropdown for Course id
     * Dropdown for speciality id
     * 
     */
?>
<div class="students">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'student_course_id') ?>
        <?= $form->field($model, 'student_speciality_id') ?>
        <?= $form->field($model, 'student_fnumber') ?>
        <?= $form->field($model, 'student_education_form') ?>
        <?= $form->field($model, 'student_fname') ?>
        <?= $form->field($model, 'student_lname') ?>
        <?= $form->field($model, 'student_email') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- students -->
