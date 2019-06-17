<?php

namespace ozerich\shop\plugins\aggregators\forms;

use ozerich\shop\plugins\aggregators\constants\SettingOption;
use ozerich\shop\constants\SettingValueType;
use ozerich\shop\traits\ServicesTrait;

class OnlinerSettingsFormConvertor
{
    use ServicesTrait;

    public function initForm()
    {
        $form = new OnlinerSettingsForm();

        $form->enabled = $this->settingsService()->get(SettingOption::ONLINER_ENABLED, false, SettingValueType::BOOLEAN);
        $form->clientId = $this->settingsService()->get(SettingOption::ONLINER_CLIENT_ID);
        $form->clientSecret = $this->settingsService()->get(SettingOption::ONLINER_CLIENT_SECRET);

        return $form;
    }

    public function saveForm(OnlinerSettingsForm $form)
    {
        $this->settingsService()->set(SettingOption::ONLINER_ENABLED, $form->enabled);
        $this->settingsService()->set(SettingOption::ONLINER_CLIENT_ID, $form->clientId);
        $this->settingsService()->set(SettingOption::ONLINER_CLIENT_SECRET, $form->clientSecret);
    }
}