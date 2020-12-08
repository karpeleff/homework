<?php

namespace app\modules\site\controllers;

use yii\web\Controller;

/**
 * Default controller for the `oprs` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
public $layout = '';//переопределяем шаблон

    public function actionIndex()
    {
        return $this->render('index');
    }
}
