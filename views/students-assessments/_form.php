<?php
use app\models\Specialities;
use app\models\Courses;

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\StudentsAssessments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="students-assessments-form">

    <?php $form = ActiveForm::begin([
            'id' => 'register-form',
            'enableClientValidation' => true,
            'options' => [
                'validateOnSubmit' => true,
                'class' => 'form'
            ],
        ]); ?>

    <?= $form->field($model, 'sa_student_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sa_subject_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model,'sa_subject_id')->dropDownList(ArrayHelper::map(Specialities::find()->orderBy('speciality_name_long')->asArray()->all(),
        'speciality_id', 'speciality_name_long'),['prompt' => 'Избери специалност']) ?>

    <?= $form->field($model, 'sa_workload_lectures')->textInput() ?>

    <?= $form->field($model, 'sa_workload_exercises')->textInput() ?>

    <?= $form->field($model, 'sa_assesment')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добави' : 'Редактирай', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
