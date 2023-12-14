<?php
/**
 * @var yii\data\ActiveDataProvider $dataProvider;
 */

use yii\bootstrap5\Html;
use yii\grid\GridView;
?>
<?= Html::a(
    'Add',
    ['person/create'], // Link to the creation action ('person/create' in this example)
    ['class' => 'btn btn-primary'] // CSS classes for styling (Bootstrap classes used here)
) ?>

<?= GridView::widget([

    'dataProvider' => $dataProvider,


    	'pager' => [
            'class' => '\yii\widgets\LinkPager',
            'pageCssClass' => 'page-link',
            'options' => ['class' => 'pagination'],
            'maxButtonCount' => 5,
            'nextPageLabel' => 'Keyingi',
            'prevPageLabel' => 'Oldingi'
            ],

//    'filterModel' => $searchModelB,

    'columns' => [

        ['class' => 'yii\grid\SerialColumn'],

        'first_name',

        'last_name',

        'gender',

        'email',

        ['class' => 'yii\grid\ActionColumn'],

    ],

]); ?>


