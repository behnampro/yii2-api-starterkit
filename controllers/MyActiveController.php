<?php

namespace app\controllers;


use app\models\traits\MyResponseHelper;
use yii\rest\ActiveController;

class MyActiveController extends ActiveController
{
    use MyResponseHelper;

    public $modelClass = '';
}