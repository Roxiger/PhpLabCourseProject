<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Courses */

$this->title = 'Редактиране: ' . $model->course_id;
$this->params['breadcrumbs'][] = ['label' => 'Courses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->course_id, 'url' => ['view', 'id' => $model->course_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="courses-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
