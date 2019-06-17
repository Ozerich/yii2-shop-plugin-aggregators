<?php

namespace ozerich\shop\plugins\onliner\services;

use ozerich\shop\plugins\onliner\constants\SettingOption;
use ozerich\shop\plugins\onliner\sdk\Onliner;
use ozerich\shop\traits\ServicesTrait;

class OnlinerService
{
    use ServicesTrait;

    private $onliner = null;

    /**
     * @return Onliner
     */
    public function onliner()
    {
        if ($this->onliner == null) {
            $this->onliner = new Onliner(
                $this->settingsService()->get(SettingOption::ONLINER_CLIENT_ID),
                $this->settingsService()->get(SettingOption::ONLINER_CLIENT_SECRET)
            );
        }

        return $this->onliner;
    }
}