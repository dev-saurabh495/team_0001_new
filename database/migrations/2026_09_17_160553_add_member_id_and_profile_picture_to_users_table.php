<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        /*
        |--------------------------------------------------------------------------
        | member_id
        |--------------------------------------------------------------------------
        | The column may already exist because the previous migration attempt
        | partially succeeded.
        */
        if (!Schema::hasColumn('users', 'member_id')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('member_id', 20)
                    ->nullable()
                    ->after('id');
            });
        }

        /*
        |--------------------------------------------------------------------------
        | profile_picture
        |--------------------------------------------------------------------------
        */
        if (!Schema::hasColumn('users', 'profile_picture')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('profile_picture')
                    ->nullable()
                    ->after('phone');
            });
        }

        /*
        |--------------------------------------------------------------------------
        | Generate member IDs for existing users
        |--------------------------------------------------------------------------
        */
        DB::table('users')
            ->whereNull('member_id')
            ->orderBy('id')
            ->eachById(function ($user) {
                DB::table('users')
                    ->where('id', $user->id)
                    ->update([
                        'member_id' => 'T0001-' . str_pad(
                            $user->id,
                            6,
                            '0',
                            STR_PAD_LEFT
                        ),
                    ]);
            });

        /*
        |--------------------------------------------------------------------------
        | Add unique index if it doesn't already exist
        |--------------------------------------------------------------------------
        */
        $indexes = DB::select("SHOW INDEX FROM users WHERE Key_name = 'users_member_id_unique'");

        if (empty($indexes)) {
            Schema::table('users', function (Blueprint $table) {
                $table->unique('member_id');
            });
        }

        /*
        |--------------------------------------------------------------------------
        | Make member_id required
        |--------------------------------------------------------------------------
        */
        Schema::table('users', function (Blueprint $table) {
            $table->string('member_id', 20)
                ->nullable(false)
                ->change();
        });
    }

    public function down(): void
    {
        if (Schema::hasColumn('users', 'member_id')) {
            $indexes = DB::select(
                "SHOW INDEX FROM users WHERE Key_name = 'users_member_id_unique'"
            );

            if (!empty($indexes)) {
                Schema::table('users', function (Blueprint $table) {
                    $table->dropUnique('users_member_id_unique');
                });
            }

            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('member_id');
            });
        }

        if (Schema::hasColumn('users', 'profile_picture')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('profile_picture');
            });
        }
    }
};
