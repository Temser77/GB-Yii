<?php

namespace app\models\tables;



use \yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "tasks".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $creator_id
 * @property int $responsible_id
 * @property string $deadline
 * @property int $status_id
 * @property string created
 * @property string updated
 *
 * @property Users $creator
 * @property Users $responsible
 * @property Statuses $status
 */
class Tasks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tasks';
    }

    /**
     * {@inheritdoc}
     */

    public function behaviors()
    {
        return [
          [
              'class' => TimestampBehavior::className(),
              'createdAtAttribute' => 'created',
              'updatedAtAttribute' => 'updated',
              'value' => new Expression('NOW()'),
          ],
      ];
    }

    public function rules()
    {
        return [
            [['name', 'description'], 'required'],
            [['creator_id', 'responsible_id', 'status_id'], 'integer'],
            [['deadline'], 'safe'],
            [['name', 'description'], 'string', 'max' => 255],
            [['creator_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['creator_id' => 'id']],
            [['responsible_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['responsible_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название задачи',
            'description' => 'Описание задачи',
            'creator_id' => 'Создал',
            'responsible_id' => 'Ответственный',
            'deadline' => 'Срок до',
            'status_id' => 'Статус',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreator()
    {
        return $this->hasOne(Users::class, ['id' => 'creator_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Statuses::class, ['id' => 'status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResponsible()
    {
        return $this->hasOne(Users::class, ['id' => 'responsible_id']);
    }

    public function setCreated($value) {
        $this->created = $value;
    }

    public function setUpdated($value) {
        $this->updated = $value;
    }


}
