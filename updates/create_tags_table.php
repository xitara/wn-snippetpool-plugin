<?php namespace Xitara\SnippetPool\Updates;

use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;
use Schema;

class CreateTagsTable extends Migration
{
    public function up()
    {
        Schema::create('xitara_snippetpool_tags', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 255)->nullable();
            $table->timestamps();
        });

        Schema::create('xitara_snippetpool_snippets_tags', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('tag_id')->nullable();
            $table->integer('snippet_id')->nullable();
            $table->index(['tag_id', 'snippet_id'], 'idx_unique');
        });
    }

    public function down()
    {
        Schema::dropIfExists('xitara_snippetpool_tags');
        Schema::dropIfExists('xitara_snippetpool_snippets_tags');
    }
}
