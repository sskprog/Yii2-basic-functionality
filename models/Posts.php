<?php
namespace app\models;

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
            [['body'], 'string'],
            [['created_at'], 'safe'],
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
            'title' => 'Title',
            'body' => 'Body',
            'is_published' => 'Is Published',
            'created_at' => 'Created At',
        ];
    }
}
