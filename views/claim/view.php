<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Claim $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Заявки', 'url' => ['index']];
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
            'photobefore',
            'time',
            'status',
            'photoafter',
        ],
    ]) ?>

</div>
