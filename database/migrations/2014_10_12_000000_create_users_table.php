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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email', 100)->unique();
            $table->string('phone', 30)->default('Null_Value');
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('is_admin')->length(1)->default(0);
            $table->string('password');
            $table->double('amount')->default('0');
            $table->string('card_number', 16);
            $table->integer('card_expiry_month')->default(0);
            $table->integer('card_expiry_year')->default(0);
            $table->integer('cvv')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
