<?php
use yii\widgets\ListView;

$this->title = 'Записи';

echo ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_list',
    'layout' => "{items}\n{pager}",
]);
