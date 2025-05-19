<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\SupportStatusType;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('supports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->comment('顧客情報ID')->constrained()->cascadeOnDelete();
            $table->string('subject')->comment('対応件名');
            $table->text('description')->nullable()->comment('内容');
            $table->unsignedTinyInteger('status')->default(SupportStatusType::RECEPTION->value)->comment('Enum値（SupportStatusType）');
            $table->foreignId('first_contact_user_id')->nullable()->comment('初期対応者のユーザーID')->constrained('users')->nullOnDelete();
            $table->text('first_contact_memo')->nullable()->comment('初期対応メモ');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('supports');
    }
};
