<?php

use app\models\User;
use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model app\models\Form */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'firstname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'birthdayDate')->widget(DatePicker::class, [
            'value' => date("d.m.Y", $model->birthday),
            'type' => DatePicker::TYPE_INPUT,
            'pluginOptions' => [
                "autoclose" => true,
                "orientation" => 'bottom'
            ]
    ]) ?>

    <?= $form->field($model, 'education')->dropDownList(User::educationLabels()) ?>

    <?= $form->field($model, 'phone')->widget(MaskedInput::class, [
            "mask" => "+380999999999"
    ]) ?>

    <?= $form->field($model, 'checkbox')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Готово', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
