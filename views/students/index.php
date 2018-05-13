<?php
use app\models\Specialities;
use app\models\Courses;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\StudentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Студенти';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="students-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Нов', ['value'=>Url::to('index.php?r=students%2Fcreate'), 'class' => 'btn btn-success', 'id'=> 'modalButton']) ?>
    </p>

    
    <?php
        Modal::begin([
           'header'=> '<h4>Добави студент</h4>',
           'id' => 'modal',
           'size'=> 'modal-lg',
        ]);
        
        echo "<div id='modalContent'></div>";
        Modal::end();
    ?>
    
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'filterSelector' => "select[name='".$dataProvider->getPagination()->pageSizeParam."'],input[name='".$dataProvider->getPagination()->pageParam."']",
        'pager' => [
        'class' => \liyunfang\pager\LinkPager::className(),
        'template' => '{pageButtons} {customPage}',
        'pageSizeMargin' => 'margin-left:5px;margin-right:5px;',
        'customPageMargin' => 'margin-left:5px;margin-right:5px;',
    ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [              
                'label' => 'Име, Фамилия',
                'attribute' => 'priority',
            ],
            'student_email',
            'student_fnumber',
               ['class' => 'yii\grid\ActionColumn',
                   'template'=>'{update}{delete}',
                'buttons' => [
                    'update' => function ($url, $model) {
                                 return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url , ['class' => 'view', 'data-pjax' => '1']);
                         },              
                ],
            ],
        ],
    ]);

    /*
     * @TODO put this in js folder then registerJS
     */
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