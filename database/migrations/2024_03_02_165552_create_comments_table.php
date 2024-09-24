<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string("body");
            $table->string("slug")->unique();
            $table->tinyInteger("seen")->comment("0 => unseen , 1 => seen")->default(0);
            $table->tinyInteger("status")->comment("0 => inactive , 1 => active")->default(0);
            $table->foreignId("user_id")->constrained("users")->onUpdate("cascade")->onDelete("cascade");
            $table->foreignId("market_id")->constrained("markets")->onUpdate("cascade")->onDelete("cascade");
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
