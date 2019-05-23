<?php

namespace app\models;

use yii\base\Model;
use app\validators;

class Task extends Model
{
    public $id;
    public $name;
    public $description;
    public $creatorId;
    public $responsibleId;
    public $deadline;
    public $status;

    public function rules()
    {
        return [
            [['name', 'description', 'creatorId', 'responsibleId'], 'required'],
            [['name', 'description'], 'string', 'max' => 1000],
        ];
    }

/*    public function statusValidate($attribute, $params)
    {
        if(!in_array($this->$attribute, ['В работе', 'Закрыта'])){
            $this->addError($attribute, 'Неверный статус');
        }
    }*/


}