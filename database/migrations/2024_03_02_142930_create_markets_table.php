<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('markets', function (Blueprint $table) {
            $table->id();
            $table->string("company_or_shop_name");
            $table->text("address");
            $table->string("description");
            $table->text("phone");
            $table->text("image");
            $table->text("images")->nullable();
            $table->string("slug")->unique();
            $table->tinyInteger("status")->comment("0 => inactive , 1 => active");
            $table->tinyInteger("commentable")->comment("0 => uncommentable , 1 => commentable");
            $table->foreignId('user_id')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('markets');
    }
}
