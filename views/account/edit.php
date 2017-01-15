<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\User */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Edit profile';
$this->params['breadcrumbs'][] = $this->title;
?>
<div>
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if ($saved) : ?>
        <div class="alert alert-success">
            Your data has been saved
        </div>
    <?php endif; ?>

    <p>Please fill out the following fields:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'edit-profile-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-2 control-label'],
        ],
    ]); ?>

    <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>
    <?= $form->field($model, 'first_name')->textInput() ?>
    <?= $form->field($model, 'last_name')->textInput() ?>
    <?= $form->field($model, 'patronymic')->textInput() ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Save', ['class' => 'btn btn-primary', 'name' => 'edit-button']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
