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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->integer('client_id');
            $table->string('project_title');
            $table->string('web_front_url')->nullable();
            $table->string('admin_url')->nullable();
            $table->string('google_play_store_url')->nullable();
            $table->string('apple_store_url')->nullable();
            $table->string('extra_info')->nullable();
            $table->integer('delivery_manager_id')->nullable();
            $table->integer('project_manager_id')->nullable();
            $table->integer('tl_id');
            $table->integer('bde_id');
            $table->integer('ba_id');
            $table->string('status')->default(1)->comment('0=>Inactive,1=>Active');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
