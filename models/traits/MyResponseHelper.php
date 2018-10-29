<?php

namespace app\models\traits;

use Yii;

trait MyResponseHelper {

    public function ok($somedata) {
        Yii::$app->response->statusCode = 200 ;
        $data['message'] = "ok";
        $data[] = $somedata ;
        return $data;
    }

    public function badRequest($somedata)
    {
        Yii::$app->response->statusCode = 400 ;
        $data['message'] = "Bad request";
        $data['data'] = $somedata;
        return $data;
    }

    public function notFound($somedata)
    {
        Yii::$app->response->statusCode = 400 ;
        $data['message'] = "Not Found";
        $data['data'] = $somedata;
        return $data;
    }

}