<?php

/* @var $this yii\web\View */

$this->title = 'Carlink test case';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Welcome!!!</h1>

        <p class="lead">This is a carlink test case. If you want to add some autos to this
        database, please log in. You might have to register at first :)</p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?php echo \yii\helpers\Html::a('Reset filters', \yii\helpers\Url::toRoute('site/index'), [
                    'class' => 'btn btn-primary'
                ]); ?>
                <br /><br />
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 autos-grid">
                <?php
                echo \yii\grid\GridView::widget([
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
                                return \yii\helpers\Html::img(
                                    \app\models\Image::getPath($data->image),
                                    [
                                        'alt' => "{$data->brand} {$data->model}",
                                        'class' => 'img-thumbnail'
                                    ]
                                );
                            }
                        ]
                    ]
                ]);
                ?>
            </div>
        </div>

    </div>
</div>
