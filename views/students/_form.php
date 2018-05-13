<?php
use app\models\Specialities;
use app\models\Courses;

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\Students */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="students-form">
    <?php $form = ActiveForm::begin([
            'id' => 'register-form',
            'enableClientValidation' => true,
            'options' => [
                'validateOnSubmit' => true,
                'class' => 'form'
            ],
        ]); ?>

    <?php $model?>

    <?= $form->field($model, 'student_fname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'student_lname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'student_fnumber')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'student_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model,'student_course_id')->dropDownList(ArrayHelper::map(Courses::find()
            ->orderBy('course_id')->all(), 'course_id','course_name'),['prompt' => 'Избери курс']); ?>
    
    <?= $form->field($model,'student_speciality_id')->dropDownList(ArrayHelper::map(Specialities::find()->orderBy('speciality_name_long')->asArray()->all(),
        'speciality_id', 'speciality_name_long'),['prompt' => 'Избери специалност']) ?>

    <?= $form->field($model, 'student_education_form')->dropDownList([ 'Р' => 'Р', 'З' => 'З'], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добави' : 'Редактирай', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
