<?php

namespace ozerich\shop\plugins\aggregators;

use ozerich\shop\plugins\aggregators\forms\OnlinerSettingsFormConvertor;
use ozerich\shop\plugins\IPage;
use yii\web\Response;
use yii\widgets\ActiveForm;

class SettingsPage implements IPage
{
    public function pageTitle()
    {
        return 'Настройки агрегаторов';
    }

    public function menuParent()
    {
        return 'settings';
    }

    public function menuLabel()
    {
        return 'Настройки агрегаторов';
    }

    public function render()
    {
        $view = \Yii::$app->controller->view;

        $convertor = new OnlinerSettingsFormConvertor();

        $form = $convertor->initForm();

        if ($form->load(\Yii::$app->request->post())) {

            if (\Yii::$app->request->isAjax) {
                \Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($form);
            }

            $convertor->saveForm($form);

            return \Yii::$app->controller->redirect(\Yii::$app->request->referrer);
        }

        return $view->render('@vendor/ozerich/yii2-shop-plugin-aggregators/src/views/settings.php', [
            'formModel' => $form
        ]);
    }
}