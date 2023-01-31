<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Claim $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="claim-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_user')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'discr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_cat')->textInput() ?>

    <?= $form->field($model, 'photobefore')->fileInput() ?>

    <?= $form->field($model, 'time')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([ 'Новая' => 'Новая', 'Решена' => 'Решена', 'Отклонена' => 'Отклонена', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'photoafter')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
