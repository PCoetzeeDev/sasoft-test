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
        Schema::create('employee_addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('street');
            $table->text('city');
            $table->text('postal_code');
            $table->text('country');
            $table->timestamps();
            $table->softDeletes();

            create_foreign_key($table, 'employees', '', 'employee_id', false, true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_addresses');
    }
};
