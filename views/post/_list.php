<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\StringHelper;

?>
 
<div class="news-item">
    <h2 class="page-header"><?= Html::encode($model->title) ?></h2> 
    <div><?php echo Html::a($model->user->fullname, ['user', 'id' => $model->user_id]); ?></div>    
    <div><em ><?=Yii::$app->formatter->asDate($model->created_at, 'php:d.m.Y')?></em></div> 
    
    <?= HtmlPurifier::process(StringHelper::truncate($model->body, 250))?> 
    <?php if (mb_strlen($model->body) > 249):
    echo Html::a('Читать далее', ['view', 'id' => $model->id]);
     endif?>
</div>


