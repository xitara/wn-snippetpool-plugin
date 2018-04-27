<?php namespace Xitara\Toolbox;

use BackendMenu;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function pluginDetails()
    {
        return [
            'name' => 'Toolbox 3.0',
            'description' => 'Version 3 of the Lady Anja Toolbox with Integration in OctoberCMS',
            'author' => 'Xitara Websolution, Manuel Burghamer',
            'icon' => 'icon-dashcube',
            'homepage' => 'https://xitara.net',
        ];
    }

    public function register()
    {
        BackendMenu::registerContextSidenavPartial(
            'Xitara.Toolbox',
            'toolbox',
            '$/xitara/toolbox/partials/_sidebar.htm'
        );
    }

    // public function registerComponents()
    // {
    // return [
    //     '\Xitara\Toolbox\Components\Dashboard' => 'dashboard',
    // ];
    // }

    // public function registerPermissions()
    // {
    //     return [
    //         'rainlab.users.access_users' => [
    //             'tab'   => 'rainlab.user::lang.plugin.tab',
    //             'label' => 'rainlab.user::lang.plugin.access_users'
    //         ],
    //     ];
    // }

    // public function registerNavigation()
    // {

    // }
}
