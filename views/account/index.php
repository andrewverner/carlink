<?php

/* @var $this yii\web\View */

use \yii\helpers\Html;
use \yii\helpers\Url;

$this->title = 'Account';
?>
<div class="site-index">

    <div class="body-content">

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h3>Welcome, <span class="user-name"><?php echo Yii::$app->user->identity->username ?></span>!</h3>
            </div>
            <?php if (!$filled) : ?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="alert alert-warning">
                    You haven't specified your first name, last name and patronymic yet. Please,
                    <?php echo Html::a('edit your profile', Url::toRoute(['account/edit'])) ?>
                </div>
            </div>
            <?php endif; ?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul>
                    <li><?php echo Html::a('Edit profile', Url::toRoute('account/edit')) ?></li>
                    <li><?php echo Html::a('Change password', Url::toRoute('account/password')) ?></li>
                </ul>
            </div>
        </div>

    </div>

</div>
