<?php namespace Xitara\SnippetPool\Updates;

use October\Rain\Database\Updates\Seeder;
use Xitara\SnippetPool\Models\Group;

class SeedGroupTable extends Seeder
{
    public function run()
    {
        Group::create([
            'id' => 0,
            'name' => 'Default',
            'description' => 'Default Group',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
