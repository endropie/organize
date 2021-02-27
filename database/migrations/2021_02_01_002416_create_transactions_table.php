<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{

    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->date('date');
            $table->string('number')->unique();
            $table->enum('type', ['GENERAL', 'EXPENSE', 'INCOME', 'PREMIUM']);
            $table->jsonb('variability');
            $table->decimal('amount', 20, 4);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
