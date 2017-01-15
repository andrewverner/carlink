<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AutoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auto-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'brand') ?>

    <?= $form->field($model, 'model') ?>

    <?= $form->field($model, 'modification') ?>

    <?= $form->field($model, 'year') ?>

    <?php // echo $form->field($model, 'mileage') ?>

    <?php // echo $form->field($model, 'image') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
