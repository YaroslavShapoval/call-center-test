<?php

use yii\helpers\Html;

/**
 * @var $this yii\web\View
 * @var $model app\models\Order
 */

$this->title = 'Обновление заказа: ' . $model->order_id;
$this->params['breadcrumbs'][] = ['label' => 'Заказы', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="order-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
