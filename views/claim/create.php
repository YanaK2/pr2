<?php

use yii\helpers\Html;
use app\models\User;
use yii\web\IdentityInterface;


/** @var yii\web\View $this */
/** @var app\models\Claim $model */

$this->title = 'Подать заявку';
$this->params['breadcrumbs'][] = ['label' => 'Заявки'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="claim-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
