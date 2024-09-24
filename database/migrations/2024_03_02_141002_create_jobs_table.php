<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->text("description");
            $table->text("address");
            $table->string("rights");
            $table->string("company_or_shop_name");
            $table->string("phone");
            $table->text("advantages");
            $table->string("slug")->unique();
            $table->timestamp("published_at")->default(now());
            $table->tinyInteger("gender")->comment("0 => man , 1 => woman");
            $table->tinyInteger("status")->comment("0 => inactive , 1 => active");
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
        Schema::dropIfExists('jobs');
    }
}
