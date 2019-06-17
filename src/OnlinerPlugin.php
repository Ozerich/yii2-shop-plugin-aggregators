<?php

namespace ozerich\shop\plugins\onliner;

use ozerich\shop\plugins\onliner\actions\SectionsAction;
use ozerich\shop\plugins\BasePlugin;

class OnlinerPlugin extends BasePlugin
{
    public function id()
    {
        return 'onliner';
    }

    public function bootstrap()
    {
        $this->registerProductTab(new ProductTab());

        $this->registerAction('sections', SectionsAction::class);
        $this->registerAction('manufactures', SectionsAction::class);
        $this->registerAction('products', SectionsAction::class);

        $this->registerPage('settings', new SettingsPage());
    }
}