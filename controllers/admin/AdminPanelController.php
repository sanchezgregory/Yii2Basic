<?php

namespace app\controllers\admin;

use yii\web\Controller;
use function PHPStan\dumpType;

class AdminPanelController extends Controller
{

    public $defaultAction = 'hello-world';
    // hello
    public function actionHelloWorld($id = '')
    {
        return $this->render('hello', ['params' => $id]);
    }
}