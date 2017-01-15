<?php

/* @var $this yii\web\View */

use \yii\grid\GridView;
use \yii\helpers\Html;
use \yii\helpers\Url;

$this->title = 'My autos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">

    <div class="body-content">

        <h1><?= Html::encode($this->title) ?></h1>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?php echo Html::a('Add new auto', Url::toRoute('account/auto'), [
                    'class' => 'btn btn-primary'
                ]); ?>
                <?php echo Html::a('Reset filters', Url::toRoute('account/autos'), [
                    'class' => 'btn btn-primary'
                ]); ?>
                <br /><br />
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 autos-grid">
                <?php
                echo GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'brand', 'model', 'modification', 'year',
                        'mileage',
                        [
                            'label' => 'Image',
                            'format' => 'raw',
                            'value' => function($data) {
                                return Html::img(
                                    \app\models\Image::getPath($data->image),
                                    [
                                        'alt' => "{$data->brand} {$data->model}",
                                        'class' => 'img-thumbnail'
                                    ]
                                );
                            }
                        ],
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'header' => 'Actions',
                            'template' => '{delete}{link}',
                        ]
                    ]
                ]);
                ?>
            </div>
        </div>

    </div>

</div>
