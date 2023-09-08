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
        Schema::create('attendance_forms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->date('日付')->nullable(false);
            $table->enum('種別', ['オプション１', 'オプション２', 'オプション３']);
            $table->text('その他備考', 1000)->nullable();
            $table->string('入力者')->nullable(false);
            $table->date('入力日')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance_forms');
    }
};
