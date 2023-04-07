<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    const TBL_PROFILES = 'profiles';
    const TBL_PROFILE_TYPES = 'profile_types';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        create_valueobject_schema(self::TBL_PROFILE_TYPES);
        populate_vo_data([
            'guest',
            'user',
            'business',
            'admin',
        ], self::TBL_PROFILE_TYPES);

        $guestProfileTypeId = DB::table(self::TBL_PROFILE_TYPES)->where('slug', '=', 'guest')->first()->id;

        Schema::create(self::TBL_PROFILES, function (Blueprint $table) use ($guestProfileTypeId) {
            $table->id();
            $table->text('first_name')->nullable();
            $table->text('last_name')->nullable();
            $table->text('company_name')->nullable();
            create_foreign_key(
                $table,
                self::TBL_PROFILE_TYPES,
                'restrict',
                'profile_type_id',
                false,
                false,
                'id',
                'NO ACTION',
                $guestProfileTypeId
            );
            $table->softDeletes();
            $table->timestamps();
        });

        DB::statement("
            alter table profiles
            add constraint check_name
            check (company_name is not null or (first_name is not null and last_name is not null))
        ;");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(self::TBL_PROFILES);
        Schema::dropIfExists(self::TBL_PROFILE_TYPES);
    }
};
