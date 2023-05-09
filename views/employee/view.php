<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Employee $model */

$this->title = $model->emp_no;
$this->params['breadcrumbs'][] = ['label' => 'Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="employee-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'emp_no' => $model->emp_no], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'emp_no' => $model->emp_no], [
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
            'emp_no',
            'birth_date',
            'first_name',
            'last_name',
            'gender',
            'hire_date',
        ],
    ]) ?>

    <hr>
    <b>Departamentos adscrito | 1 relación </b>
    <ul>
        <?PHP
            foreach ($model->deptNos as $dep) {
            echo $dep->dept_name . "<br>";
            }
        ?>
    </ul>

    <hr>
    <b>Departamentos de managers | dos relaciones</b>
    <ul>
        <?PHP
        foreach ($model->deptManagers as $man) {
            echo $man->deptNo->dept_name;
        }
        ?>
    </ul>

    <hr> <b>Titulos</b>
    <ul>
        <?php foreach ($model->titles as $title ): ?>
            <li><?php echo $title->title  ?></li>
        <?php endforeach; ?>
    </ul>


    <hr> <b>Salaries</b>
    <ul>
        <?php foreach ($model->salaries as $salary ): ?>
            <li><?php echo $salary->salary  ?></li>
        <?php endforeach; ?>
    </ul>
</div>
