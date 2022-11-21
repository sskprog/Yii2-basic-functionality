<?php
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

?>
<div class="site-login">

    <?php $form = ActiveForm::begin([
        'id' => 'registrationForm',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n{input}\n{error}",
            'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
            'inputOptions' => ['class' => 'col-lg-3 form-control'],
            'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
        ],

    ]); ?>

        <?= $form->field($model, 'username')->textInput() ?>
        <?= $form->field($model, 'email')->textInput() ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model, 'confirm')->passwordInput() ?>
        <div class="form-group">
            <div class="offset-lg-1 col-lg-11">
                <?= Html::submitButton('Регистрация', ['class' => 'btn btn-primary', 'name' => 'reg-button']) ?>
            </div>
        </div>
       
    <?php ActiveForm::end(); ?> 
</div>
