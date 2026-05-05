<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("ALTER TABLE tickets MODIFY status ENUM('open','pending','resolved','closed','success') NOT NULL DEFAULT 'open'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Convert any success values back to closed before shrinking the enum.
        DB::statement("UPDATE tickets SET status = 'closed' WHERE status = 'success'");
        DB::statement("ALTER TABLE tickets MODIFY status ENUM('open','pending','resolved','closed') NOT NULL DEFAULT 'open'");
    }
};
