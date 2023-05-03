<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Article $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="article-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p class="text-muted">
        <small>Created At: <b><?php echo Yii::$app->formatter->asRelativeTime($model->created_at) ?></b>
            By: <?php echo $model->createdBy->username ?>
        </small>
    </p>
    <?php if(!Yii::$app->user->isGuest): ?>
        <p>
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    <?php endif; ?>


<!--    --><?php //= DetailView::widget([
//        'model' => $model,
//        'attributes' => [
//            'id',
//            'title',
//            'slug',
//            'body:ntext',
//            'created_at',
//            'updated_at',
//            'created_by',
//            'updated_by',
//        ],
//    ]) ?>

<!--    <div>-->
<!--        --><?php //echo Html::encode($model->body)?>
<!--    </div>-->
    <div>
        <?php echo $model->getEncodingBody() ?>
    </div>

</div>
