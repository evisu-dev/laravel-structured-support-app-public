<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('顧客名');
            $table->string('email')->nullable()->comment('メール（任意）');
            $table->string('phone')->nullable()->comment('電話番号（任意）');
            $table->string('company')->nullable()->comment('会社名（任意）');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
