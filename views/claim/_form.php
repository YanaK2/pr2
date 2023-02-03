<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Claim $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="claim-form">
    <?php $li=[]; $categories=\app\models\Category::find()->all();
    foreach ($categories as $category)
    {
    $li[$category->id_cat]=$category->name;
    }?>

    <?php
    //die('jjjjjjj');
    $form = ActiveForm::begin(); ?>

    <!--?= $form->field($model, 'id_user')->textInput() ?-->

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'discr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_cat')->dropDownList($li) ?>
    <br>

    <?= $form->field($model, 'photobefore')->fileInput() ?>

    <!--?= $form->field($model, 'time')->textInput() ?-->

    <br>

    <?= Yii::$app->user->identity->is_admin==1 ? $form->field($model, 'status')->dropDownList([ 'Новая' => 'Новая', 'Решена' => 'Решена', 'Отклонена' => 'Отклонена', ], ['prompt' => '']) : 
        ''?>

    <br>

    <?=  Yii::$app->user->identity->is_admin==1 ? $form->field($model, 'photoafter')->fileInput() : '' ?>
    <br>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
