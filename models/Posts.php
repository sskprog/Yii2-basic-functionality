<?php
namespace app\models;

use Yii;

/**
 * This is the model class for table "posts".
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $title
 * @property string|null $body
 * @property int|null $is_published
 * @property string|null $created_at
 */
class Posts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'posts';
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'is_published'], 'integer'],
            [['user_id'], 'default', 'value' => Yii::$app->user->identity->id],
            [['body'], 'string'],
            [['created_at'], 'safe'],
            [['created_at'], 'default', 'value' => date('Y-m-d H:i:s')],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'title' => 'Заголовок',
            'body' => 'Текст',
            'is_published' => 'Статус',
            'created_at' => 'Дата',
        ];
    }
}
