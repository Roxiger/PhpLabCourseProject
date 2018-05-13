<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CourseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Курсове';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="courses-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Нов', ['value'=> Url::to('index.php?r=courses/create') ,'class' => 'btn btn-success', 'id'=> 'modalButton']) ?>
    </p>
        
    <?php 
        Modal::begin([
            'header'=> '<h4>Добавяне на курс</h4>',
            'id'=> 'modal',
            'size'=> 'modal-lg',
        ]);
        echo "<div id='modalContent'></div>";
        
        Modal::end();
    ?>
    
    
<?php yii\widgets\Pjax::begin(); ?>   
  <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'course_name',
            ['class' => 'yii\grid\ActionColumn',
                'template'=>'{update}{delete}',
                'buttons' => [//new code for pop up
                'update' => function ($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url , ['class' => 'view', 'data-pjax' => '0']);
                    },
                ], 
            ],
        ],
    ]);
        $this->registerJs(
    "$(document).on('ready pjax:success', function() { 
        $('.view').click(function(e){
            e.preventDefault();      
            $('#pModal').modal('show')
                .find('.modal-content')
                .load($(this).attr('href'));
                });
            });
        ");
        Modal::begin([
            'id'=>'pModal',
            ]);
        Modal::end();
        ?>
    <?php yii\widgets\Pjax::end(); ?>
</div>
