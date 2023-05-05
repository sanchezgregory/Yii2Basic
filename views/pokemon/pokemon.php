<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */

$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Pokemons';
\yii\web\YiiAsset::register($this);
?>
<div class="article-view">

    <h1><?= Html::encode($this->title) ?></h1>

    Ver pokemon: <?php \yii\helpers\VarDumper::dump($pokemon->getAttributeLabel('name') . ': ' . $pokemon->name) ?>


<!--    <div>-->
<!--        --><?php //echo Html::encode($model->body)?>
<!--    </div>-->


</div>
