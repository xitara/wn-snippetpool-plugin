<?php namespace Xitara\SnippetPool\Updates;

use October\Rain\Database\Updates\Migration;
use Schema;

class BuilderTableCreateXitaraSnippetPoolSnippets extends Migration
{
    public function up()
    {
        Schema::create('xitara_snippetpool_snippets', function ($table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 255);
            $table->text('snippet');
            $table->text('comment');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('xitara_snippetpool_snippets');
    }
}
