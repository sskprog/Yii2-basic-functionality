<?php

use app\models\Posts;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\StringHelper;

/** @var yii\web\View $this */
/** @var app\models\PostsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Записи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="posts-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]);?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            // 'user_id',
            'title',
            [
                'attribute' => 'body',
                'value' => function ($model) {
                    return StringHelper::truncate($model->body, 250);
                }
            ],
            //'body:ntext',
            //'is_published',

            [
                'attribute' => 'is_published',
                'format' => 'raw',
                'headerOptions' => ['width' => '160'],
                'filter' => [
                    0 => 'Черновик',
                    1 => 'Опубликовано',
                ],
                'value' => function ($model, $key, $index, $column) {
                    $active = $model->{$column->attribute};
                    if (!$active) {
                        return Html::tag(
                            'span',
                            'Черновик',
                            [
                                'class' => 'badge bg-danger',
                            ]
                        );
                    } else {
                        return Html::tag(
                            'span',
                            'Опубликовано',
                            [
                                'class' => 'badge bg-success',
                            ]
                        );
                    }
                },
            ],

            'created_at',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Posts $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>
