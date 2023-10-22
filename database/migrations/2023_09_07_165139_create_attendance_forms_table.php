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
            $table->enum('種別', ['休暇', '遅刻', '早退', 'その他']);
            $table->text('フリーテキスト', 1000)->nullable();
            $table->text('その他備考', 1000)->nullable();
            $table->string('入力者')->nullable(false);
            $table->date('入力日')->nullable(false);
            $table->enum('タイプ',['有給','残業']);
            $table->timestamps();
            $table->time('早退タイム');           // leave early time (start time) as end time will be 23:59
            $table->time('遅刻タイム');     // late arrival time (end time) as start time will be 0:00
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
