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
        create_valueobject_schema('skill_ratings');
        populate_vo_data([
            'Beginner',
            'Intermediate',
            'Expert',
        ], 'skill_ratings');

        Schema::create('employee_skills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('skill_name');
            $table->text('years_experience');
            $table->timestamps();
            create_foreign_key($table, 'employees', 'cascade');
            create_foreign_key($table, 'skill_ratings', 'restrict');

            $table->unique(['skill_name', 'employee_id']); // compound index to make sure there are no duplicate skills created per employee
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_skills_tbls');
        Schema::dropIfExists('skill_ratings');
    }
};
