<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name');
            $table->string('cover_image');
            $table->string('email');
            $table->string('social_instagram')->nullable();
            $table->string('social_artstation')->nullable();
            $table->string('social_twitter')->nullable();
            $table->string('social_twitch')->nullable();
            $table->string('social_youtube')->nullable();
            $table->string('social_patreon')->nullable();
            $table->timestamps();
        });

        DB::table('settings')->insert(
            array(
                'site_name' => 'Site Name',
                'cover_image' => 'cover.png',
                'email' => 'admin@test.com'
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
