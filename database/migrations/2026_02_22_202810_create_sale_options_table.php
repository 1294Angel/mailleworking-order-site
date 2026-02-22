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
        Schema::create('sale_options', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->boolean("is_avalible");
            $table->string("item_name");
            $table->longText("item_description");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_options');
    }
};
