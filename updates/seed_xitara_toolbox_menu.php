<?php namespace Xitara\SnippetPool\Updates;

use October\Rain\Database\Updates\Seeder;
use Xitara\Toolbox\Models\SideMenu;

class SeedAllTables extends Seeder
{
    public function run()
    {
        $json = json_encode(
            [
                'groups' => [
                    'group' => 'xitara.snippetpool::lang.snippetpool.snippets',
                    'label' => 'xitara.snippetpool::lang.snippetpool.groups',
                    'url' => 'xitara/snippetpool/group',
                    'icon' => 'icon-archive',
                ],
            ]
        );

        $description = 'Snipped Pool';

        SideMenu::create([
            'var' => 'SideMenuItems[snippetpool]',
            'display_order' => '25',
            'value' => $json,
            'description' => $description,
        ]);
    }
}
