<?php
?>
<h1>Hello from pageController. $this->render()</h1>


<?php echo $a. "<br>";
    echo $b."<br>";
    echo Yii::$app->view->params['sharedVariable'];
    echo $this->render('foot_page')?>

If you want to know where the shared variable come from, write this $this->context->id

<div><b>
    <?php echo $this->context->id . "Controller"   ?>
    </b>
</div>