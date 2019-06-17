<?php

namespace ozerich\shop\plugins\onliner;

use ozerich\shop\plugins\BasePlugin;
use ozerich\shop\plugins\onliner\actions\ManufacturesAction;
use ozerich\shop\plugins\onliner\actions\ProductsAction;
use ozerich\shop\plugins\onliner\actions\SectionsAction;

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
        $this->registerAction('manufactures', ManufacturesAction::class);
        $this->registerAction('products', ProductsAction::class);

        $this->registerPage('list', new ListPage());
        $this->registerPage('settings', new SettingsPage());
    }
}