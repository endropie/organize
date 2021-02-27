<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLedgersTable extends Migration
{

    public function up()
    {
        Schema::create('ledgers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('parent')->nullable();
            $table->string('code')->unique('code');
            $table->string('name');
            $table->enum('type', ['EXPENSE', 'INCOME', 'ASSET', 'LIABILITY', 'EQUITY']);
            $table->boolean('isgroup')->default(0);
            $table->timestamps();
        });


        Schema::create('amountables', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('ledger_id');
            $table->date('date');
            $table->string('label')->nullable();
            $table->decimal('debit', 20, 4)->default(0);
            $table->decimal('credit', 20, 4)->default(0);
            $table->nullableUuidMorphs('amountable');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ledgers');
        Schema::dropIfExists('amountables');
    }
}
