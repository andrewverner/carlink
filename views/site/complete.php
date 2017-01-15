<?php

use yii\helpers\Html;

$this->title = 'Registration complete';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="alert alert-info">
    Thank you for registration. Now you can log in, using your credentials. Just
    <?php echo Html::a('click here', \yii\helpers\Url::toRoute('site/login')) ?>
</div>
