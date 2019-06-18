<?php namespace Xitara\SnippetPool\Updates;

use Db;
use October\Rain\Database\Updates\Migration;
use Schema;

class CreateXitaraSnippetPoolSnippets extends Migration
{
    public function up()
    {
        Schema::create('xitara_snippetpool_snippets', function ($table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 255);
            $table->text('snippet')->nullable();
            $table->text('comment')->nullable();
            $table->integer('group_id')->default(0);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('xitara_snippetpool_snippets');
        Db::table('xitara_toolbox_config')
            ->where('var', 'SideMenuItems[snippetpool]')
            ->delete();

        Db::table('xitara_toolbox_config')
            ->where('module', 'Xitara.SnippetPool')
            ->delete();
    }
}
