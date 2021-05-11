<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model app\models\Competence */

$this->title = $model->Num_Competence;
$this->params['breadcrumbs'][] = ['label' => 'Competences', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

?>
<div class="competence-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->Num_Competence], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->Num_Competence], [
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
            'Num_Competence',
            'Libelle_Competence',
            [
                    'attribute' =>'image',
                     'value' => Yii::getAlias('@imageUrl').'/'.$model ->image,
                     'format' =>['image',['width' => '100','height' => '100']]
            ]
        ],
    ]) ?>

</div>
