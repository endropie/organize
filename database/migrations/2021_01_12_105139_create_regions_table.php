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
            $table->id();
            $table->string('name');
        });

        Region::create(['id' => 1, 'name' => 'Jabodetabek']);
        Region::create(['id' => 2, 'name' => 'Bandung']);
        Region::create(['id' => 3, 'name' => 'Surabaya']);
        Region::create(['id' => 4, 'name' => 'Kalimantan']);
        Region::create(['id' => 5, 'name' => 'Pekanbaru']);
        Region::create(['id' => 6, 'name' => 'Batam']);
        Region::create(['id' => 7, 'name' => 'Malaysia']);
        Region::create(['id' => 8, 'name' => 'Ranah']);
    }

    public function down()
    {
        Schema::dropIfExists('regions');
    }
}
