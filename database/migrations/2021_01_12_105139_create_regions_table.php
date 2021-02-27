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
            $table->string('code',2)->unique();
            $table->string('name');
        });

        Region::create(['code' => '01', 'name' => 'Jabodetabek']);
        Region::create(['code' => '02', 'name' => 'Bandung']);
        Region::create(['code' => '03', 'name' => 'Surabaya']);
        Region::create(['code' => '04', 'name' => 'Kalimantan']);
        Region::create(['code' => '05', 'name' => 'Pekanbaru']);
        Region::create(['code' => '06', 'name' => 'Batam']);
        Region::create(['code' => '07', 'name' => 'Malaysia']);
        Region::create(['code' => '08', 'name' => 'Ranah']);
    }

    public function down()
    {
        Schema::dropIfExists('regions');
    }
}
