<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Students */

$this->title = $model->student_id;
$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="students-view">

    <h1><?= Html::encode($this->title) ?></h1>
    
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'student_id',
            'student_course_id',
            'student_speciality_id',
            'student_fname',
            'student_lname',
            'student_email:email',
            'student_fnumber',
            'student_education_form',
        ],
    ]) ?>

</div>
