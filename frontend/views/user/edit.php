<?php
use frontend\models\User;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
?>

<?php $model = new User;?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'], 'id' => 'edit-form'])?>

    <?= $form->field($model, 'email')->textInput(['value' => $userInfo->email])?>
    <?= $form->field($model, 'name')->textInput(['value' => $userInfo->name])?>
    <?= $form->field($model, 'surname')->textInput(['value' => $userInfo->surname])?>
    <?= $form->field($model, 'age')->textInput(['value' => $userInfo->age])?>
    <?= $form->field($model, 'sex')->textInput(['value' => $userInfo->sex])?>
    <?= $form->field($model, 'about')->textArea(['value' => $userInfo->about])?>
    <?= $form->field($model, 'tags')->textInput(['value' => $userInfo->tags])?>
    <?= $form->field($model, 'country')->textInput(['value' => $userInfo->country])?>
    <?= $form->field($model, 'city')->textInput(['value' => $userInfo->city])?>
    <?= $form->field($model, 'avatar')->fileInput()?>

    <div class = "form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-success'])?>
    </div>

<?php ActiveForm::end();?>