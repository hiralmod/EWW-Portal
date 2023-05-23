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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('client_name')->nullable();
            $table->string('client_email')->unique();
            $table->string('whatsapp_number')->nullable();
            $table->string('skype')->nullable();
            $table->string('hangout')->nullable();
            $table->string('other_contact_info')->nullable();
            $table->text('address')->nullable();
            $table->integer('city_id');
            $table->integer('state_id');
            $table->integer('country_id');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
