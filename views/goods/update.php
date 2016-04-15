<?php

use yii\helpers\Html;

/**
 * @var $this yii\web\View
 * @var $model app\models\Good
 */

$this->title = 'Обновить товар: ' . $model->good_id;
$this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="good-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
