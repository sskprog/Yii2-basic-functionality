<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\StringHelper;

?>

<div class="card">
    <div class="card-body">
        <h2 class="card-title"><?= Html::encode($model->title) ?></h2>
        <div class="card-text"><?php echo Html::a($model->user->fullname, ['user', 'id' => $model->user_id]); ?>
            <span class="float-end"><?= Yii::$app->formatter->asDate($model->created_at, 'php:d.m.Y') ?></span>
        </div>
        <div class="card-text"><?= HtmlPurifier::process(StringHelper::truncate($model->body, 250)) ?></div>
            <?php if (mb_strlen($model->body) > 249) :
                echo
                Html::a('Читать далее', ['view', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm float-end']);
            endif ?>
    </div>
</div>
<p></p>