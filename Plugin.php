<?php namespace Xitara\SnippetPool;

use App;
use Backend;
use BackendMenu;
use System\Classes\PluginBase;
use Xitara\Toolbox\Plugin as Toolbox;

class Plugin extends PluginBase
{
    public function pluginDetails()
    {
        return [
            'name' => 'Snippet Pool',
            'description' => 'LA FetEnt Toolbox 3.0 - Snippet Pool',
            'author' => 'Xitara Websolution, Manuel Burghamer',
            'icon' => 'icon-dashcube',
            'homepage' => 'https://xitara.net',
        ];
    }

    public function register()
    {
        BackendMenu::registerContextSidenavPartial(
            'Xitara.SnippetPool',
            'snippetpool',
            '$/xitara/toolbox/partials/_sidebar.htm'
        );
    }

    public function boot()
    {
        /**
         * Check if we are currently in backend module.
         */
        if (!App::runningInBackend()) {
            return;
        }

        /**
         * add items to sidemenu
         */
        Toolbox::getSideMenu('Xitara.SnippetPool', 'snippetpool');
    }
}
