<?php

use App\Models\Region;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegionsTable extends Migration
{
    public function up()
    {
        Schema::create('regions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
        });

        Region::create(['name' => 'Jabodetabek']);
        Region::create(['name' => 'Bandung']);
        Region::create(['name' => 'Surabaya']);
        Region::create(['name' => 'Kalimantan']);
        Region::create(['name' => 'Pekanbaru']);
        Region::create(['name' => 'Batam']);
        Region::create(['name' => 'Malaysia']);
        Region::create(['name' => 'Ranah']);
    }

    public function down()
    {
        Schema::dropIfExists('regions');
    }
}
