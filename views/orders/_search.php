<?php

use kartik\datetime\DateTimePicker;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var $this yii\web\View
 * @var $model app\models\search\OrderSearch
 * @var $form yii\widgets\ActiveForm
 */
?>

<div class="row order-search">
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="col-xs-12 col-sm-6 col-md-4">
        <?= $form->field($model, 'dateFrom')->widget(DateTimePicker::className(), [
            'convertFormat' => false,

            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy/mm/dd HH:mm',
                'startDate' => date('now'),
                'todayHighlight' => true,
            ]
        ]);?>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-4">
        <?= $form->field($model, 'dateTo')->widget(DateTimePicker::className(), [
            'convertFormat' => false,

            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy/mm/dd HH:mm',
                'startDate' => date('now'),
                'todayHighlight' => true,
            ]
        ]);?>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-4">
        <?= $form->field($model, 'order_state')->dropDownList(ArrayHelper::map(\app\models\State::find()->all(), 'state_id', 'state_name'), [
            'prompt' => 'Статус заказа',
        ]) ?>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-4">
        <?= $form->field($model, 'order_client_phone') ?>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-4">
        <?= $form->field($model, 'order_client_name') ?>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-4">
        <?= $form->field($model, 'order_good')->dropDownList(ArrayHelper::map(\app\models\Good::find()->all(), 'good_id', 'good_name'), [
            'prompt' => 'Выберите товар',
        ]) ?>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-4">
        <?= $form->field($model, 'order_id') ?>
    </div>

    <div class="col-xs-12 text-right">
        <div class="form-group">
            <?= Html::submitButton('Показать', ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton('Сбросить', ['class' => 'btn btn-default']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>
