<?php namespace Xitara\SnippetPool;

use App;
use Backend;
use BackendMenu;
use System\Classes\PluginBase;
use Xitara\Core\Plugin as Core;
use Xitara\SnippetPool\Models\Group;

class Plugin extends PluginBase
{
    /**
     * @var array Plugin dependencies
     */
    public $require = ['Xitara.Core'];

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name' => 'xitara.snippetpool::lang.plugin.name',
            'description' => 'xitara.snippetpool::lang.plugin.description',
            'author' => 'xitara.snippetpool::lang.plugin.author',
            'homepage' => 'xitara.snippetpool::lang.plugin.homepage',
            'icon' => 'icon-leaf',
        ];
    }

    public function register()
    {
        BackendMenu::registerContextSidenavPartial(
            'Xitara.SnippetPool',
            'snippetpool',
            '$/xitara/core/partials/_sidebar.htm'
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
        Core::getSideMenu('Xitara.SnippetPool', 'snippetpool');
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return [
            'snippetpool' => [
                'label' => 'xitara.snippetpool::lang.snippetpool.snippetpool',
                'url' => Backend::url('xitara/snippetpool/snippets'),
                'icon' => 'icon-life-ring',
                'permissions' => ['xitara.snippetpool.*'],
                'order' => 500,
            ],
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return [
            'xitara.snippetpool.snippets' => [
                'tab' => 'SnippetPool',
                'label' => 'Snippets bearbeiten',
                'order' => 40,
            ],
            'xitara.snippetpool.groups' => [
                'tab' => 'SnippetPool',
                'label' => 'Gruppen bearbeiten',
                'order' => 41,
            ],
        ];
    }

    /**
     * get groups from db and inject it into sidemenu
     * @autor   mburghammer
     * @date    Di 21 Aug 2018 19:46:53 CEST
     *
     * @see Xitara\Toolbox::getSideMenu
     *
     * @version 0.0.1
     * @since   0.0.1
     * @return  array                   sidemenu-data
     */
    public static function injectSideMenu()
    {
        $groups = Group::select('id', 'name')
            ->orderBy('name', 'ASC')
            ->get();

        $inject = [
            'snippets.all' => [
                'group' => 'xitara.snippetpool::lang.submenu.label',
                'label' => 'xitara.snippetpool::lang.snippetpool.all',
                'url' => Backend::url('xitara/snippetpool/snippets'),
                'icon' => 'icon-archive',
                'permissions' => ['xitara.snippetpool.snippets'],
                'order' => 1300,
            ],
            'snippets.groups' => [
                'group' => 'xitara.snippetpool::lang.submenu.label',
                'label' => 'xitara.snippetpool::lang.snippetpool.groups',
                'url' => Backend::url('xitara/snippetpool/group'),
                'icon' => 'icon-archive',
                'permissions' => ['xitara.snippetpool.groups'],
                'order' => 1301,
            ],
            'snippets.placeholder' => [
                'group' => 'xitara.snippetpool::lang.submenu.label',
                'label' => 'xitara.snippetpool::lang.snippetpool.groups',
                // 'url' => Backend::url('xitara/snippetpool/group'),
                // 'icon' => 'icon-archive',
                // 'permissions' => ['xitara.snippetpool.groups'],
                'order' => 1302,
                'placeholder' => true,
            ],
        ];

        foreach ($groups as $group) {
            $inject['snippets.' . $group->id] = [
                'group' => 'xitara.snippetpool::lang.submenu.label',
                'label' => $group->name,
                'url' => Backend::url('xitara/snippetpool/snippets/index/' . $group->id),
                'icon' => 'icon-archive',
                'permissions' => ['xitara.snippetpool.groups'],
                'order' => 1310,
            ];
        }

        return $inject;
    }
}
