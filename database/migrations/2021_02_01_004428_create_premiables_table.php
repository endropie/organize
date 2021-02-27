<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePremiablesTable extends Migration
{
    public function up()
    {
        Schema::create('premiables', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('premium_id');
            $table->uuid('transaction_id')->nullable();
            $table->date('period');
            $table->decimal('price', 18, 2)->default(0);
        });
    }

    public function down()
    {
        Schema::dropIfExists('premiables');
    }
}
