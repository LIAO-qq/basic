<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Contient */
/* @var $form ActiveForm */
?>
<div class="site-contient">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'Num_eleve') ?>
        <?= $form->field($model, 'Num_Classe') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-contient -->
