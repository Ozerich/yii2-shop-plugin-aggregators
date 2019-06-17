<?php

namespace ozerich\shop\plugins\aggregators;

use ozerich\shop\plugins\aggregators\actions\TestAction;
use ozerich\shop\plugins\BasePlugin;

class AggregatorsPlugin extends BasePlugin
{
    public function id()
    {
        return 'aggregators';
    }

    public function bootstrap()
    {
        $this->registerProductTab(new ProductTab());

        $this->registerAction('test', TestAction::class);

        $this->registerPage('settings', new SettingsPage());
    }
}