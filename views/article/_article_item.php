<?php

/** @var $model \app\models\Article */

?>

<div>
    <a href="<?php echo  \yii\helpers\Url::to(['/article/view', 'id'=> $model->id]) ?>">
        <h3><?php echo \yii\helpers\Html::encode($model->title) ?></h3>
    </a>
    <div>
        <?php echo \yii\helpers\StringHelper::truncateWords($model->getEncodingBody(), 40)  ?>
    </div>
    <p class="text-muted">
        <small>Created At: <b><?php echo Yii::$app->formatter->asRelativeTime($model->created_at) ?></b>
            By: <?php echo $model->createdBy->username ?>
        </small>

    </p>
    <hr>
</div>
