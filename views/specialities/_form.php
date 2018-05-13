<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Specialities */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="specialities-form">

    <?php $form = ActiveForm::begin([    
            'id' => 'register-form',
            'enableClientValidation' => true,
            'options' => [
                'validateOnSubmit' => true,
                'class' => 'form'
            ],
        ]); ?>

    <?= $form->field($model, 'speciality_name_long')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'speciality_name_short')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добави' : 'Редактирай', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
