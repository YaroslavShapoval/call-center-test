<?php

use app\models\Good;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/**
 * @var $this yii\web\View
 * @var $dataProvider yii\data\ActiveDataProvider
 */

$this->title = 'Товары';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="good-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить товар', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'class' => yii\grid\CheckboxColumn::className(),
            ],

            [
                'class' => yii\grid\SerialColumn::className(),
            ],

            [
                'attribute' => 'good_name',
                'format' => 'raw',
                'value' => function(Good $good) {
                    return Html::a($good->good_name, ['update', 'id' => $good->primaryKey]);
                },
            ],

            'good_price',

            [
                'attribute' => 'good_advert',
                'format' => 'raw',
                'value' => function(Good $good) {
                    return Html::a($good->advert->name, ['adverts/view', 'id' => $good->advert->primaryKey]);
                },
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
