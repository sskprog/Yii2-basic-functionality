<?php
use yii\widgets\ListView;

$this->title = 'Записи';

echo ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_list',
    'layout' => "{items}\n{pager}",
    'pager' => [
        'prevPageLabel' => 'Назад',
        'prevPageCssClass' => 'page-item',
        'nextPageLabel' => 'Вперед',
        'linkOptions' => ['class' => 'page-link'],
        'disabledListItemSubTagOptions' => ['class' => 'page-link'],
    ],
]);
