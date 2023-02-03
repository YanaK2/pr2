<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Claim $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Заявки'];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="claim-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_claim' => $model->id_claim], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_claim' => $model->id_claim], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_claim',
            //'id_user',
            'name',
            'discr',
            ['attribute'=>'Категория', 'value'=> function($data){return
                $data->getCat()->One()->name;}],
                ['attribute'=>'Фото проблемы', 'format'=>'html',
                'value'=>function($data){return"<img src='{$data->photobefore}'  style='width: 350px;'>";}],
            'time',
            'status',
            ['attribute'=>'Фото результата', 'format'=>'html',
                'value'=>function($data){return"<img src='{$data->photoafter}'  style='width: 350px;'>";}],
        ],
    ]) ?>

</div>
