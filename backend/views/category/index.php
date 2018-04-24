<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '栏目管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <!--
    <h1><?= Html::encode($this->title) ?></h1>
    -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <!--
        <?= Html::a('创建栏目', ['create'], ['class' => 'btn btn-success']) ?>
        -->
        <?=
        Html::a('创建栏目', ['create'], [
            'class' => 'btn btn-success',
            'id' => 'create', // 按钮的id随意
            'data-toggle' => 'modal', // 固定写法
            'data-target' => '#operate-modal', // 等于modal begin中设定的参数id值
        ])
        ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'cid',
            'name',
            'iden',
            'oid',
            'status',
            'c_time',
            'u_time',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}  {delete}',
                'header' => '操作',
                'buttons' => [
                    'update' => function ($url, $model, $key) {
                        return Html::a("栏目信息", $url, [
                            'title' => '栏目信息',
                            // btn-update 目标class
                            'class' => 'btn btn-default btn-update',
                            // 固定写法
                            'data-toggle' => 'modal',
                            // 指向modal中begin设定的id
                            'data-target' => '#operate-modal',
                        ]);
                    },
                    'delete' => function ($url, $model, $key) {
                        return Html::a('删除', $url, [
                            'title' => '删除',
                            'class' => 'btn btn-default',
                            'data' => [
                                'confirm' => '确定要删除么?',
                                'method' => 'post',
                            ],
                        ]);
                    },
                ],
            ],
        ],
    ]); ?>
</div>
<?php
use yii\bootstrap\Modal;
Modal::begin([
    'id' => 'operate-modal',
    'header' => '<h4 class="modal-title"></h4>',
]);
Modal::end();
?>

<?php
use yii\helpers\Url;
// 异步请求的地址
$requestCreateUrl = Url::toRoute('create');
$js = <<<JS
// 创建操作
$('#create').on('click', function () {
    $('.modal-title').html('创建栏目');
    $.get('{$requestCreateUrl}',
        function (data) {    
            // 弹窗的主题渲染页面
            $('.modal-body').html(data);
        }  
    );
});
JS;
$this->registerJs($js);
?>

<?php
// 更新
$requestUpdateUrl = Url::toRoute('update');
$js = <<<JS
    // 更新操作
    $('.btn-update').on('click', function () {
        $('.modal-title').html('栏目信息');
        $.get('{$requestUpdateUrl}', { id: $(this).closest('tr').data('key') },
            function (data) {
                $('.modal-body').html(data);
            }  
        );
    });
JS;
$this->registerJs($js);
?>
