<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sub_categories_id');
            $table->string('title');
            $table->string('slug');
            $table->float('normal_price');
            $table->float('spacial_price')->nullable();
            $table->text('short_detail')->nullable();
            $table->text('detail')->nullable();
            $table->text('title1')->nullable();
            $table->text('detail1')->nullable();
            $table->text('title2')->nullable();
            $table->text('detail2')->nullable();
            $table->text('title3')->nullable();
            $table->text('detail3')->nullable();
            $table->boolean('publish')->default(1);
            $table->integer('sort')->default(0);
            $table->text('meta_tag')->nullable();
            $table->text('meta_description')->nullable();
            $table->timestamps();

            $table->foreign('sub_categories_id')
            ->references('id')
            ->on('sub_product_categories')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
