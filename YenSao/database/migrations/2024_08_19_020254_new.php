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
        Schema::create('new', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('title'); // Title of the update
            $table->text('content')->nullable(); // Description of the new
            $table->string('url')->nullable(); // URL of the related image
            $table->timestamps(); // Laravel default created_at and updated_at timestamps
      
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
