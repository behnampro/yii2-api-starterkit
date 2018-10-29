<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;
use yii\filters\VerbFilter;
use yii\rest\ActiveController;
use app\models\User;

class AuthController extends MyActiveController
{
    Public $input;

    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['corsFilter'] = [
            'class' => \yii\filters\Cors::className(),
        ];
        return $behaviors;
    }

    public function actionLogin()
    {
        $input = Yii::$app->request->post();

        $username = $input['username'] ?? null;
        $password = $input['password'] ?? null;

        $user = User::findOne(['username' => $username]);

        if ($user != null) {
            if (Yii::$app->getSecurity()->validatePassword($password, $user->password_hash)) {
                $success['token'] = $user->auth_key;
                return  $this->ok($success) ;
            } else {
                return $this->notFound(['error'=>'Unauthorised']);
            }
        } else {
            return $this->notFound(['error'=>'Unauthorised']);
        }
    }
}