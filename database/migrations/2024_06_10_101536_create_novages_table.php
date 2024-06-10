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
        Schema::create('novages', function (Blueprint $table) {
            $table->id();
            $table->string('phone_number');
            $table->string('mobile_network')->enum(['MTN', 'ETISALAT', 'ZAIN', 'GLO', 'AIRTEL']);
            $table->text('message');
            $table->string('ref_code')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('novages');
    }
};
