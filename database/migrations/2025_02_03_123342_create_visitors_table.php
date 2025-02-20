<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->string('locale')->nullable();
            $table->string('ip_address');
            $table->string('user_agent');
            $table->json('page_visited');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('visitors');
    }
};
