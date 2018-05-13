<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Courses;
use app\models\Specialities;

/* @var $this yii\web\View */
/* @var $model app\models\StudentsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="students-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'student_fname') ?>
    
    <?= $form->field($model, 'student_email') ?>  
    
    <?= $form->field($model, 'student_fnumber') ?>   
    
    <?= $form->field($model, 'student_course_id')->dropDownList(ArrayHelper::map(Courses::find()
            ->orderBy('course_id')->all(), 'course_id','course_name'),['prompt' => 'Избери курс']); ?>

    <?= $form->field($model, 'student_speciality_id')->dropDownList(ArrayHelper::map(Specialities::find()->orderBy('speciality_name_long')->asArray()->all(),
        'speciality_id', 'speciality_name_long'),['prompt' => 'Избери специалност']) ?>

    
    <div class="form-group">
        <?= Html::submitButton('Търси', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
