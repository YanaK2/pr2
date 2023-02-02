<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\Claim;
use yii\bootstrap5;

/** @var app\models\ClaimSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Решение городских проблем';
//$this->params['breadcrumbs'][] = $this->title;
?>

<?php $claims=Claim::find()->where(['status'=>'Решена'])->orderBy(['time'=>SORT_DESC])->limit(4)->all();
echo "<div class='d-flex flex-row flex-wrap justify-content-start align-items-end'>";
foreach ($claims as $claim){
        echo "<div class='card m-1' style='width:22%; min-width: 300px; height:50%; min-height:500px;'>
 <a href='/claim/index?id_claim={$claim->id_claim}'><img src='{$claim->photoafter}' 
 data-before='$claim->photobefore' data-after='$claim->photoafter'
 onMouseOver='hover(this)' onMouseOut='back(this)'
class='card-img-top' style='height: 300px; width: 300px;' alt='image'></a>
 <div class='card-body'>
 <h5 class='card-title'>{$claim->name}</h5>
 <p >{$claim->discr}</p>";
        
        echo "</div>
</div>";
}
echo "</div>";
?>
<script>

function hover(el){

el.src=el.dataset.before;

}

function back(el){

el.src=el.dataset.after;

}

</script>