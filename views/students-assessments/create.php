<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\StudentsAssessments */

$this->title = '';
$this->params['breadcrumbs'][] = ['label' => 'Students Assessments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="students-assessments-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
