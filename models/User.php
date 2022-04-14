<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "user".
 *
 * @property int $id Порядковый номер
 * @property string|null $firstname Имя
 * @property string|null $lastname Фамилия
 * @property int|null $birthday Дата рождения
 * @property int|null $education Образование
 * @property string|null $phone Номер телефона
 * @property int|null $created_at Зарегистрирован
 * @property int|null $updated_at
 */
class User extends \yii\db\ActiveRecord
{
    const EDUCATION_SECONDARY = 1;
    const EDUCATION_HIGHER = 2;

    const EDUCATIONS = [
        self::EDUCATION_SECONDARY,
        self::EDUCATION_HIGHER
    ];

    /**
     * @return string[]
     */
    public function behaviors()
    {
        return [TimestampBehavior::class];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['birthday', 'education', 'created_at', 'updated_at'], 'integer'],
            [['firstname', 'lastname', 'phone'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Порядковый номер',
            'firstname' => 'Имя',
            'lastname' => 'Фамилия',
            'birthday' => 'Дата рождения',
            'education' => 'Образование',
            'phone' => 'Номер телефона',
            'created_at' => 'Зарегистрирован',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return string[]
     */
    public static function educationLabels()
    {
        return [
            self::EDUCATION_SECONDARY => "Среднее образование",
            self::EDUCATION_HIGHER => "Высшее образование",
        ];
    }
}
