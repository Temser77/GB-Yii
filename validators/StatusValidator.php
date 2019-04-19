<?php
namespace app\validators;

use Yii;
use yii\validators\Validator;

class StatusValidator extends Validator {

    public $possibleStatus = [
      'В очереди',
      'Назначен исполнитель',
      'В работе',
      'Выполнена',
      'Отправлена на доработку'
    ];
    public function init() {
        parent::init();
        if ($this->message === null) {
            $this->message = Yii::t('yii', '{attribute} must be in array of possible statuses".');
        }
    }

    public function validateAttribute($model, $attribute)
    {
        $value = $model->$attribute;
        if(!in_array($value, $this->possibleStatus)){
            $this->addError($model, $attribute, $this->message);
            return;
        }
    }

    public function validateValue($value) {
        if(!in_array($value, $this->possibleStatus)){
            return [$this->message, false];
        }
        return true;
        // return in_array($value, $this->possibleStatus);
    }

}