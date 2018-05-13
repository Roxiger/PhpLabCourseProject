<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Specialities */

$this->title = 'Редактиране:' . $model->speciality_id;
$this->params['breadcrumbs'][] = ['label' => 'Specialities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->speciality_id, 'url' => ['view', 'id' => $model->speciality_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="specialities-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
