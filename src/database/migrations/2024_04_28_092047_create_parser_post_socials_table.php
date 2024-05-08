<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('parser_post_socials', function (Blueprint $table) {
            $table->id();
			$table->string('social_id_post');
			$table->string('social_post_title', 500)->nullable();
			$table->string('social_post_text', 3000)->nullable();
			$table->string('unical', 50)->nullable();
			$table->string('attachments')->nullable();
			$table->string('url', 1000)->nullable();
			$table->integer('punlish_vk')->nullable();
			$table->integer('punlish_ok')->nullable();
			$table->integer('punlish_tg')->nullable();
			$table->integer('punlish_site')->nullable();
			$table->bigInteger('activ');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parser_post_socials');
    }
};
