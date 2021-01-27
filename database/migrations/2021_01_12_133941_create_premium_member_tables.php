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
            $table->string('number')->unique();
            $table->decimal('cost')->default(0);
            $table->foreignId('region_id');
            $table->string('capture_name')->nullable();

            $table->dateTime('verified_at')->nullable();
            $table->timestamps();
        });

        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('number')->unique();
            $table->string('name');
            $table->enum('gender', ['MALE', 'FEMALE']);
            $table->string('birth_place');
            $table->date('birth_date');
            $table->string('contact_code')->nullable();
            $table->string('contact')->nullable();
            $table->text('address')->nullable();
            $table->enum('relate', ['PUSAKO', 'SUMANDO', 'ANAK', 'PARTISIPATISAN']);
            $table->foreignId('premium_id');
            $table->string('capture_name')->nullable();

            $table->dateTime('verified_at')->nullable();
            $table->timestamps();

            $table->foreign('premium_id')->references('id')->on('premiums')->onDelete('CASCADE');

        });
    }

    public function down()
    {
        Schema::dropIfExists('members');
        Schema::dropIfExists('premiums');
    }
}
