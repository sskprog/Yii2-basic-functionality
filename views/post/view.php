<?php
use yii\helpers\Html;

$this->title = Html::encode($model->title);
?>

<h2 class="page-header"><?= Html::encode($model->title) ?> </h2>
<p><em><?=Yii::$app->formatter->asDate($model->created_at, 'php:d.m.Y')?></em></p>
<?php if ($author):?>
<p><i><?=$author->fullname; ?> </i></p>
<?php endif; ?>

<?= $model->body; ?>



