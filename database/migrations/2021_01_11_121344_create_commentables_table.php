<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentablesTable extends Migration
{
    public function up()
    {
        Schema::create('commentables', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuidMorphs('commentable');
            $table->text('text');
            $table->boolean('is_log')->default(0);
            $table->uuid('created_by');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('commentables');
    }
}
