<?php namespace Xitara\Toolbox\Updates;

use October\Rain\Database\Updates\Migration;
use Schema;

class CreateXitaraToolboxContent extends Migration
{
    public function up()
    {
        Schema::create('xitara_toolbox_content', function ($table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('nasid')->default(0); // nummer
            $table->integer('cmsid')->default(0); // erocmsid
            $table->string('actor', 255);
            $table->string('type', 255);
            $table->string('title', 1023); // titel - name
            $table->text('description'); // beschreibung
            $table->string('duration', 20);
            $table->integer('price');
            $table->string('url', 1023);
            $table->integer('width');
            $table->integer('height');
            $table->string('image_fsk16', 1023); // fsk16
            $table->string('image_fsk18', 1023); // fsk18
            $table->integer('totalimages');
            $table->string('categories', 1023);
            $table->timestamp('created_at')->nullable(); // timestamp
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('xitara_toolbox_content');
    }
}
