<?php
/**
 * Copyright (c) 2022 Jorge Powers
 * @link https://jorgeuos.github.io/
 * @license https://github.com/jorgeuos/CleanPii/blob/main/LICENSE MIT License
 */

namespace Piwik\Plugins\CleanPii;

use Piwik\Menu\MenuAdmin;
use Piwik\Menu\MenuTop;

/**
 * This class allows you to add, remove or rename menu items.
 * To configure a menu (such as Admin Menu, Top Menu, User Menu...) simply call the corresponding methods as
 * described in the API-Reference http://developer.piwik.org/api-reference/Piwik/Menu/MenuAbstract
 */
class Menu extends \Piwik\Plugin\Menu
{

    public function configureTopMenu(MenuTop $menu)
    {
        // $menu->addItem('CleanPii_MyTopItem', null, $this->urlForDefaultAction(), $orderId = 30);
    }

    public function configureAdminMenu(MenuAdmin $menu)
    {
        $menu->addItem(
            'CleanPii_CleanPii',
            'CleanPii_Manage',
            $this->urlForDefaultAction(),
            $orderId = 30
        );
        // reuse an existing category. Execute the showList() method within the controller when menu item was clicked
        // $menu->addManageItem('CleanPii_MyUserItem', $this->urlForAction('showList'), $orderId = 30);
        // $menu->addPlatformItem('CleanPii_MyUserItem', $this->urlForDefaultAction(), $orderId = 30);

        // or create a custom category
        // $menu->addItem('CoreAdminHome_MenuManage', 'CleanPii_MyUserItem', $this->urlForDefaultAction(), $orderId = 30);
    }
}
