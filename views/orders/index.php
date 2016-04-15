<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/**
 * @var $this yii\web\View
 * @var $searchModel app\models\search\OrderSearch
 * @var $dataProvider yii\data\ActiveDataProvider
 */

$this->title = 'Заказы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">
    <div class="row">
        <div class="col-sm-6">
            <h1 style="margin-top: 0;"><?= Html::encode($this->title) ?></h1>
        </div>

        <div class="col-sm-6 text-right">
            <?= Html::a('Добавить заказ', ['create'], ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php Pjax::begin([
        'timeout' => false,
        'enablePushState' => false,
    ]); ?>

    <?= $this->render('_search', [
        'model' => $searchModel,
    ]) ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        #'filterModel' => $searchModel,

        'columns' => [
            [
                'attribute' => 'order_id',
                'label' => '#',
                'format' => 'raw',
                'value' => function(\app\models\Order $order) {
                    return Html::a($order->primaryKey, ['update', 'id' => $order->primaryKey]);
                },
            ],

            'order_add_time',
            'order_client_name',
            'order_client_phone',

            [
                'attribute' => 'order_good',
                'format' => 'raw',
                'value' => function(\app\models\Order $order) {
                    return Html::a($order->good->good_name, ['goods/update', 'id' => $order->good->primaryKey]);
                },
                'filter' => Html::activeDropDownList($searchModel, 'order_good', ArrayHelper::map(\app\models\Good::find()->all(), 'good_id', 'good_name'), [
                    'class' => 'form-control',
                    'prompt' => 'Товар',
                ]),
            ],

            [
                'attribute' => 'order_state',
                'value' => function(\app\models\Order $order) {
                    return $order->state->state_name;
                },
                'filter' => Html::activeDropDownList($searchModel, 'order_good', ArrayHelper::map(\app\models\State::find()->all(), 'state_id', 'state_name'), [
                    'class' => 'form-control',
                    'prompt' => 'Статус',
                ]),
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>
</div>
