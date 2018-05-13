<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\StudentsAssessmentsSearchs */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Оценки ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="students-assessments-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <p>
        <?= Html::button('Нов', ['value'=> Url::to('index.php?r=students-assessments%2Fcreate') ,'class' => 'btn btn-success', 'id'=> 'modalButton']) ?>
    </p>
    
            <?php 
        Modal::begin([
            'header'=> '<h4>Добавяне на oценки</h4>',
            'id'=> 'modal',
            'size'=> 'modal-lg',
        ]);
        echo "<div id='modalContent'></div>";
        
        Modal::end(); ?>
    
<?php Pjax::begin(); ?>   
 <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'filterSelector' => "select[name='".$dataProvider->getPagination()->pageSizeParam."'],input[name='".$dataProvider->getPagination()->pageParam."']",
        'pager' => [
        'class' => \liyunfang\pager\LinkPager::className(),
        'template' => '{pageButtons} {customPage}',
        'customPageWidth' => 50,
        'customPageBefore' => 'Страница',
        'customPageMargin' => 'margin-bottom:0px;margin-top:0px;',
        'customPageOptions' => ['class' => 'form-control','style' =>
            'display: inline-block;margin-bottom:0px;'],
    ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                    'label' => 'Име',
                    'attribute'=> 'priority',
                    'value' => 'saStudent.priority'
            ],
            [
                'label' => 'Дисциплина',
                'value' => 'subjects.subject_name'
            ],
            'sa_assesment',

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
    "$(document).on('ready pjax:success', function() {  // 'pjax:success' use if you have used pjax
        $('.view').click(function(e){
            e.preventDefault();      
            $('#pModal').modal('show')
                .find('.modal-content')
                .load($(this).attr('href'));
                });
            });
        ");
        yii\bootstrap\Modal::begin([
            'id'=>'pModal',
            ]);
        yii\bootstrap\Modal::end();
        ?>
    <?php \yii\widgets\Pjax::end(); ?>
</div>
