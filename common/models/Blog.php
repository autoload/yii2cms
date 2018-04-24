<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "blog".
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $file_url
 * @property string $create_time
 */
class Blog extends \yii\db\ActiveRecord
{
    public $category;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blog';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content', 'category'], 'required'],
            [['content','file_url'], 'string'],
            [['create_time'], 'safe'],
            [['title'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'content' => 'Content',
            'file_url' => 'File Url',
            'create_time' => 'Create Time',
        ];
    }
}
