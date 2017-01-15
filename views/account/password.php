<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\PasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Change password';
$this->params['breadcrumbs'][] = $this->title;
?>
<div>
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if ($saved) : ?>
        <div class="alert alert-success">
            Password has been changed
        </div>
    <?php endif; ?>

    <p>Please fill out the following fields:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'password-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-2 control-label'],
        ],
    ]); ?>

    <?= $form->field($model, 'password1')->passwordInput() ?>
    <?= $form->field($model, 'password2')->passwordInput() ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Change password', ['class' => 'btn btn-primary', 'name' => 'save-button']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
