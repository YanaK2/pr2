<?php

namespace app\controllers;

use Yii;

class AdminController extends \yii\web\Controller
{
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest || Yii::$app->user->identity->is_admin==0){$this->redirect(['site/login']);} 
        return $this->render('index');
    }


}
