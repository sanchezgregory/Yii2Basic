<?php

namespace app\controllers;

use yii\web\Controller;

class PageController extends Controller
{
    public function actionAbout()
    {
        // Can share data for multiple views
        $this->view->params['sharedVariable'] = "I am a shared variable";

        return $this->render('about', [
            'a' => 'var1', 'b' => 'var2'
        ]);


        // Can render a VIEW of other controller
        //return $this->render('../site/about');

        //return $this->renderContent('<h2> Only shows this content </h2>');

        // return $this->renderPartial('about'); // without layout

        // Here needs whole path
        // return $this->renderFile('@app/views/page/about.php');

        // When request is from ajax
        // return $this->renderAjax('about');

    }
}