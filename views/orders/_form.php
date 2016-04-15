<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var $this yii\web\View
 * @var $model app\models\Order
 * @var $form yii\widgets\ActiveForm
 */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'order_state')->dropDownList(ArrayHelper::map(\app\models\State::find()->all(), 'state_id', 'state_name'), [
        'prompt' => 'Статус',
    ]) ?>

    <?= $form->field($model, 'order_add_time')->widget(\kartik\datetime\DateTimePicker::className(), [
        'convertFormat' => false,

        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy/mm/dd hh:ii:ss',
            'startDate' => date('now'),
            'todayHighlight' => true,
            'todayBtn' => true,
        ]
    ]);?>

    <?= $form->field($model, 'order_good')->dropDownList(ArrayHelper::map(\app\models\Good::find()->all(), 'good_id', 'good_name'), [
        'prompt' => 'Выберите товар',
    ]) ?>

    <?= $form->field($model, 'order_client_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_client_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group text-right">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
