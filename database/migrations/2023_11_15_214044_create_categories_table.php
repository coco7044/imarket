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
        //カテゴリーのテーブル設定
        Schema::create('primary_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('sort_order');
            $table->timestamps();
        });

        //サブカテゴリーのテーブル設計
        Schema::create('secondary_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('sort_order');
            $table->foreignId('primary_category_id')
            ->constrained();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //テーブルの削除メソッド。注意として外部キー制約があるので先にサブカテゴリーを削除しないとエラーがでます。
        Schema::dropIfExists('secondary_categories');
        Schema::dropIfExists('primary_categories');
    }
};
