<?php

/** @var yii\web\View $this
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

echo $form->field($model,'first_name')->textInput(['value'=>Yii::$app->request->get('first_name')?? $model->first_name]);
echo $form->field($model,'last_name')->textInput(['value'=>Yii::$app->request->get('last_name')?? $model->last_name]);
echo $form->field($model,'email')->input('email')->textInput(['value'=>Yii::$app->request->get('email')?? $model->email]);
echo $form->field($model,'gender')->textInput(['value'=>Yii::$app->request->get('gender')?? $model->gender]);
echo Html::submitButton('Yuborish',['class'=>'btn btn-success']);

ActiveForm::end(); ?>
