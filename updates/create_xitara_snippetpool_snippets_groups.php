<?php namespace Xitara\SnippetPool\Updates;

use October\Rain\Database\Updates\Migration;
use Schema;

class CreateXitaraSnippetPoolSnippetsGroups extends Migration
{
    public function up()
    {
        Schema::create('xitara_snippetpool_snippets_groups', function ($table) {
            $table->engine = 'InnoDB';
            $table->integer('snippet_id')->default(0);
            $table->integer('group_id')->default(0);
            $table->primary(['snippet_id', 'group_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('xitara_snippetpool_snippets_groups');
    }
}
