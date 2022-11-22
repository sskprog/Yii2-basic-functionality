<?php
use yii\helpers\Html;

$this->title = Html::encode($model->title);
?>

<h2 class="page-header"><?= Html::encode($model->title) ?> </h2>
<div><em><?=Yii::$app->formatter->asDate($model->created_at, 'php:d.m.Y')?></em></div>
<?php if ($author):?>
    <div><?php echo Html::a($model->user->fullname, ['user', 'id' => $model->user_id]); ?></div>    
<?php endif; ?>

<?= $model->body; ?>



