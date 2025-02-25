<?php
//generated with gii
//php yii gii/model --tableName=users --modelClass=User

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $first_name
 * @property string|null $last_name
 * @property string $email
 * @property string $date_of_birth
 * @property string $created_at
 */
class User extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * Add validation rules
     */
    public function rules()
    {
        return [
            [['first_name', 'email', 'date_of_birth'], 'required'], // Required fields
            [['first_name', 'last_name'], 'string', 'max' => 128], // Max length 128
            [['email'], 'string', 'max' => 255], 
            [['email'], 'email'], // Must be a valid email
            [['email'], 'unique'], // Email must be unique
            [['date_of_birth'], 'date', 'format' => 'php:Y-m-d'], // Validate date format
            ['date_of_birth', 'validateAge'], // Custom validation for 18+ check
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'Email',
            'date_of_birth' => 'Date Of Birth',
            'created_at' => 'Created At',
        ];
    }

        /**
     * Custom validator to ensure user is at least 18 years old
     */
    public function validateAge($attribute, $params)
    {
        $dob = new \DateTime($this->$attribute);
        $today = new \DateTime();
        $age = $dob->diff($today)->y; // Calculate age

        if ($age < 18) {
            $this->addError($attribute, 'User must be at least 18 years old.');
        }
    }

    /**
     * Calculate and return user's age when retrieving data
     */
    public function fields()
    {
        $fields = parent::fields();
        $fields['age'] = function () {
            return $this->calculateAge();
        };
        return $fields;
    }

    /**
     * Helper function to calculate age
     */
    public function calculateAge()
    {
        $dob = new \DateTime($this->date_of_birth);
        $today = new \DateTime();
        return $dob->diff($today)->y;
    }

}
