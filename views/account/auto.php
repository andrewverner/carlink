<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\Auto */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Add new auto';
$this->params['breadcrumbs'][] = $this->title;
?>
<div>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields:</p>

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data'],
        'id' => 'auto-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-2 control-label'],
        ],
    ]); ?>

    <?= $form->field($model, 'brand')->textInput() ?>
    <?= $form->field($model, 'model')->textInput() ?>
    <?= $form->field($model, 'modification')->textInput() ?>
    <?= $form->field($model, 'year')->textInput() ?>
    <?= $form->field($model, 'mileage')->textInput() ?>
    <?= $form->field($model, 'image')->fileInput() ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Add auto', ['class' => 'btn btn-primary', 'name' => 'save-button']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
