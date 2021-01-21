<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePremiumMemberTables extends Migration
{

    public function up()
    {
        Schema::create('premiums', function (Blueprint $table) {
            $table->id();
            $table->string('no');
            $table->decimal('amount');
            $table->foreignId('region_id');
            $table->timestamps();
        });

        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('no');
            $table->string('name');
            $table->text('address');
            $table->foreignId('premium_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('members');
        Schema::dropIfExists('premiums');
    }
}
