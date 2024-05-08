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
        Schema::create('parser_post_attachments', function (Blueprint $table) {
            $table->id();
			$table->bigInteger('post_id');
			$table->string('social_post_id');
			$table->string('title');
			$table->string('path');
			$table->bigInteger('file_type');
			$table->string('name_social');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parser_post_attachments');
    }
};
