<?php

use yii\helpers\Html;

$this->title = Html::encode($model->title);
?>
<div class="card">
    <div class="card-body">

        <h2 class="card-title"><?= Html::encode($model->title) ?> </h2>
        <div class="card-text"><?php echo Html::a($model->user->fullname, ['user', 'id' => $model->user_id]); ?>
            <span class="float-end"><?= Yii::$app->formatter->asDate($model->created_at, 'php:d.m.Y') ?></span>
        </div>

        <div class="card-text"><?= $model->body; ?></div>
    </div>
</div>