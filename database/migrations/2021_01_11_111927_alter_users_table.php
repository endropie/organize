<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersTable extends Migration
{

    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->jsonb('ability')->after('password');
            $table->string('avatar')->nullable()->after('password');
        });
    }

    public function down()
    {

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('rules');
            $table->dropColumn('avatar');
        });
    }
}
