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
        Schema::create('parser_social_groups', function (Blueprint $table) {
            $table->id();
			$table->bigInteger('id_group');
			$table->string('name_group', 1000)->nullable();
			$table->string('url_group');
			$table->string('avatar_group', 1000)->nullable();
			$table->bigInteger('subscribers_count');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parser_social_groups');
    }
};
