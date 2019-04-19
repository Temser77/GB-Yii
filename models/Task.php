<?php

namespace app\models;

use yii\base\Model;
use app\validators\StatusValidator;

class Task extends Model
{
    public $title;
    public $description;
    public $author;
    public $responsible;
    public $status;

    public function rules()
    {
        return [
            [['title', 'description', 'author', 'status'], 'required'],
            [['author', 'responsible'], 'string', 'max' => 1000],
            [['status'], StatusValidator::class],
        ];
        // 'app\validators\StatusValidator'
    }

/*    public function statusValidate($attribute, $params)
    {
        if(!in_array($this->$attribute, ['В работе', 'Закрыта'])){
            $this->addError($attribute, 'Неверный статус');
        }
    }*/


}