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
        Schema::create('user_profile_infos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('kana');
            $table->foreignId('user_id')->constrained();
            $table->string('tel')->unique();
            $table->string('postcode');
            $table->string('address');
            $table->tinyInteger('gender'); // 0男性, 1女性、2その他
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profile_infos');
        Schema::dropIfExists('users');
    }
};
