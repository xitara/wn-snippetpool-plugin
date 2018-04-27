<?php namespace Xitara\Toolbox\Updates;

use October\Rain\Database\Updates\Migration;
use Schema;

class CreateXitaraToolboxContentPortals extends Migration
{
    public function up()
    {
        Schema::create('xitara_toolbox_content_portals', function ($table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('actor', 255);
            $table->string('name', 1023);
            $table->string('shortcut', 20);
            $table->string('ftp_server', 1023);
            $table->integer('ftp_port');
            $table->string('ftp_user', 255);
            $table->string('ftp_pass', 255);
            $table->string('folder_images', 1023);
            $table->string('folder_videos', 1023);
            $table->string('folder_thumbs', 1023);
            $table->string('image_fsk16', 255);
            $table->string('image_fsk18', 255);
            $table->string('image_size', 20);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('xitara_toolbox_content_portals');
    }
}
