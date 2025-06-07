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
        Schema::create('merchants', function (Blueprint $table) {
            $table->id();
            $table->boolean('active')->default(0);
            $table->string('code', 50)->unique();
            $table->dateTime('modified_at', 6)->nullable();
            $table->string('name', 50);
            $table->boolean('own_config')->default(0);
            $table->string('sms_from', 50)->nullable();
            $table->string('sms_login', 50)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('auths', function (Blueprint $table) {
            $table->id();
            $table->boolean('active')->default(0);
            $table->string('code', 50)->unique();
            $table->dateTime('modified_at', 6)->nullable();
            $table->string('password', 100)->nullable();
            $table->text('token')->nullable();
            $table->string('username', 100)->nullable();
            $table->foreignId('merchant_id')->nullable()->constrained('merchants');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('auth_tokens', function (Blueprint $table) {
            $table->binary('id', 16)->primary();
            $table->boolean('active')->default(1);
            $table->string('code', 200);
            $table->dateTime('expires_at', 6)->nullable();
            $table->dateTime('modified_at', 6)->nullable();
            $table->text('token')->nullable();
            $table->foreignId('auth_id')->nullable()->constrained('auths');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('configurations', function (Blueprint $table) {
            $table->id();
            $table->boolean('active')->default(0);
            $table->string('code', 50)->unique();
            $table->dateTime('modified_at', 6)->nullable();
            $table->string('schedule_date_format', 100)->nullable();
            $table->string('schedule_date_value', 100)->nullable();
            $table->string('sms_from', 50)->nullable();
            $table->string('sms_login', 50)->nullable();
            $table->string('sms_url', 200)->nullable();
            $table->string('sms_url_check', 200)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('messages', function (Blueprint $table) {
            $table->binary('id', 16)->primary();
            $table->boolean('closed')->default(0);
            $table->text('content')->nullable();
            $table->boolean('delivered')->default(0);
            $table->dateTime('modified_at', 6)->nullable();
            $table->integer('nb_trial_check')->default(0);
            $table->text('notification')->nullable();
            $table->string('phone_number', 20)->nullable();
            $table->string('reference', 50)->nullable();
            $table->text('response')->nullable();
            $table->boolean('sent')->default(0);
            $table->string('sms_from', 50)->nullable();
            $table->string('sms_login', 50)->nullable();
            $table->foreignId('auth_id')->nullable()->constrained('auths');
            $table->foreignId('merchant_id')->nullable()->constrained('merchants');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('messages');
        Schema::dropIfExists('configurations');
        Schema::dropIfExists('auth_tokens');
        Schema::dropIfExists('auths');
        Schema::dropIfExists('merchants');
    }
};
