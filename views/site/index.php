<?php

use app\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Турнир';
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Зарегистрироваться на турнир', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'firstname',
            'lastname',
            'birthday:date',
            [
                "attribute" => "education",
                "filter" => User::educationLabels(),
                "value" => function(User $model) {
                    return User::educationLabels()[$model->education];
                }
            ],
            'phone',
            'created_at:date',
        ],
    ]); ?>


</div>
