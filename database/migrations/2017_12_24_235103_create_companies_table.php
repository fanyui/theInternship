<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->integer('address_id')->unsigned();
            $table->string('name');//done
            $table->enum('internship_reward',['paid','not paid','allowance']);
            $table->string('logo');
            $table->text('description');//done
            $table->string('website');//done
            $table->integer('duration');//done
            $table->string('application_period'); //done
            $table->string('intern_number');//done
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
        Schema::dropIfExists('companies');
    }
}
