<?php

use app\models\Claim;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ClaimSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Claims';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="claim-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Claim', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id_claim',
           // 'id_user',
            'name',
            'discr',
            'id_cat',
            //'photobefore',
            //'time',
            //'status',
            //'photoafter',
           // [
          //      'class' => ActionColumn::className(),
         //       'urlCreator' => function ($action, Claim $model, $key, $index, $column) {
         //           return Url::toRoute([$action, 'id_claim' => $model->id_claim]);
          //       }
         //   ],
        ],
    ]); ?>


</div>
