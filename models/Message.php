<?php
/**
 * Created by PhpStorm.
 * User: ducntq
 * Date: 14/09/2015
 * Time: 02:03
 */

namespace app\models;


use yii\db\ActiveRecord;

/**
 * Class Message
 * @package app\models
 *
 * @property int $id
 * @property string $content
 */
class Message extends ActiveRecord
{
    public static function tableName()
    {
        return 'message';
    }

    public function rules()
    {
        return [
            [['id'], 'safe'],
            [['content'], 'required']
        ];
    }
}
