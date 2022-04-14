<?php

namespace app\models;

use yii\base\Model;

class Form extends Model
{
    public $firstname;
    public $lastname;
    public $birthday;
    public $birthdayDate;
    public $education;
    public $phone;
    public $checkbox;

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['firstname', 'lastname'], 'string', 'max' => 255],
            [["phone"], "number"],
            [["education"], "integer"],
            [["education"], "filter", "filter" => User::EDUCATIONS],
            [["birthdayDate"], "date", "format" => "php:d.m.Y"],
            [["firstname", "lastname", "birthdayDate", "education", "phone"], "required"],
            [["firstname", "lastname", "phone"], "trim"],
            [["checkbox"], "boolean"],
            [["checkbox"], "compare", "compareValue" => true, "message" => "Необходимо приинять условия!"],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'firstname' => 'Имя',
            'lastname' => 'Фамилия',
            'birthdayDate' => 'Дата рождения',
            'education' => 'Образование',
            'phone' => 'Номер телефона',
            'checkbox' => "Принимаете условия?"
        ];
    }

    /**
     * @param array $data
     * @param null $formName
     * @return bool
     */
    public function load($data, $formName = null)
    {
        if(parent::load($data, $formName)) {
            $this->birthday = strtotime($this->birthdayDate);
            return true;
        } else {
            return parent::load($data, $formName);
        }
    }

    /**
     * @return bool
     */
    public function save()
    {
        $model = new User();
        $model->load($this->attributes, '');
        if($model->save()) {
            return true;
        }
        return false;
    }
}