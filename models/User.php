<?php

namespace app\models;

/**
 * Class User
 * @package app\models
 */
class User extends \dektrium\user\models\User
{
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['auth_key' => $token]);
    }

    public static function findIdentityByUserName($username, $type = null)
    {
        return static::findOne(['username' => $username]);
    }
}
