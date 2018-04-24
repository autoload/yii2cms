<?php

namespace common\models;
use yii\helpers\ArrayHelper;
use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id 栏目ID
 * @property string $name 栏目名
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cid' => '父栏目ID',
            'name' => '名称',
            'iden' => '唯一标示',
            'title' => 'SEO标题',
            'keywords' => 'SEO关键字',
            'desc' => 'SEO描述',
            'oid' => '排序ID',
            'status' => '状态',
            'c_time' => '创建时间',
            'u_time' => '更新时间',
        ];
    }

    public static function dropDownList ()
    {
        $query = static::find();
        $enums = $query->all();
        return $enums ? ArrayHelper::map($enums, 'id', 'name') : [];
    }
}
