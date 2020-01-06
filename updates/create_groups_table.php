<?php namespace Xitara\SnippetPool\Updates;

use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;
use Schema;

class CreateGroupsTable extends Migration
{
    public function up()
    {
        Schema::create('xitara_snippetpool_groups', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('xitara_snippetpool_groups');
    }
}
