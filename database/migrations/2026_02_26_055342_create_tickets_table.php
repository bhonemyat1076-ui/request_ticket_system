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
    Schema::create('tickets', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // The person who created it
        $table->string('title');
        $table->text('description');
        $table->enum('priority', ['low', 'medium', 'high'])->default('low');
        $table->enum('status', ['open', 'pending', 'resolved', 'closed'])->default('open');
        
        // This will store the path to the uploaded file (e.g., images/tickets/filename.jpg)
        $table->string('attachment')->nullable(); 
        
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
