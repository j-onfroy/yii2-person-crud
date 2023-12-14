<?php

use \common\models\Person;

/** @var yii\web\View $this
 *
 * @var $model  Person
 *
 * *
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin([
    'id'=>'person-form',
    'options'=>[
        'class'=>'form-horizontal'
    ],
]);

echo $form->field($model,'first_name')->textInput(['value'=> $model->first_name]);
echo $form->field($model,'last_name')->textInput(['value'=> $model->last_name]);
echo $form->field($model,'email')->input('email')->textInput(['value'=> $model->email]);
echo $form->field($model,'gender')->textInput(['value'=> $model->gender]);
echo Html::submitButton('Yuborish',['class'=>'btn btn-success']);

ActiveForm::end(); ?>
