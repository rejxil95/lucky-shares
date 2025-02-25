<?php

namespace app\controllers; // Defines the namespace of this controller

/**
 * UserController handles API requests for the User model.
 * It extends ActiveController to provide built-in RESTful actions.
 */
class UserController extends \yii\rest\ActiveController // Imports the base REST controller class
{
    /**
     * Specifies the model class that this controller will handle.
     * ActiveController will automatically generate CRUD actions based on this model.
     */
    public $modelClass = 'app\models\User';
}
