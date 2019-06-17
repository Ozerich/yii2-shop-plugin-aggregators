<?php

namespace ozerich\shop\plugins\aggregators\forms;

use yii\base\Model;

class OnlinerSettingsForm extends Model
{
    public $enabled;

    public $clientId;

    public $clientSecret;

    public function rules()
    {
        return [
            [['enabled'], 'safe'],

            [['clientId', 'clientSecret'], 'required', 'when' => function (self $model) {
                return $model->enabled;
            }]
        ];
    }

    public function attributeLabels()
    {
        return [
            'enabled' => 'Включено',
            'clientId' => 'Client ID',
            'clientSecret' => 'Сlient Secret'
        ];
    }
}