<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/**
 * @var $this yii\web\View
 * @var $model app\models\Good
 * @var $form yii\widgets\ActiveForm
 */
?>

<div class="good-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'good_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'good_price')->textInput()->input('number') ?>

    <?= $form->field($model, 'good_advert')->dropDownList(ArrayHelper::map(\app\models\Advert::find()->all(), 'user_id', 'fullName'), [
        'prompt' => 'Выберите рекламодателя',
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
