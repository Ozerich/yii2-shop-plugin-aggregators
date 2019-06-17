<?php

namespace ozerich\shop\plugins\onliner;

use ozerich\shop\plugins\BasePlugin;
use ozerich\shop\plugins\onliner\actions\ConnectAction;
use ozerich\shop\plugins\onliner\actions\ConnectionsAction;
use ozerich\shop\plugins\onliner\actions\DisconnectAction;
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
        $this->registerAction('sections', SectionsAction::class);
        $this->registerAction('manufactures', ManufacturesAction::class);
        $this->registerAction('products', ProductsAction::class);
        $this->registerAction('connections', ConnectionsAction::class);
        $this->registerAction('connect', ConnectAction::class);
        $this->registerAction('disconnect', DisconnectAction::class);

        $this->registerPage('list', new ListPage());
        $this->registerPage('settings', new SettingsPage());
    }
}