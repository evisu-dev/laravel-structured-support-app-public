<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('support_status_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('support_id')->constrained()->cascadeOnDelete();
            $table->unsignedTinyInteger('from_status')->nullable()->comment('変更前のステータス'); // 最初はnull（新規作成時）
            $table->unsignedTinyInteger('to_status')->comment('変更後のステータス');
            $table->foreignId('updated_by')->nullable()->comment('対象のユーザー')->constrained('users')->nullOnDelete(); // BreezeのUser想定
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('support_status_logs');
    }
};
