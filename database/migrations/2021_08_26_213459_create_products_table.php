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
            $table->string('name'); // tên SP   
            $table->integer('menu_id');// sp thuộc menu
            $table->text('description');// mô tả sp
            $table->longText('content');// nội dung chi tiết sp
            $table->integer('active');// kích hoạt
            $table->integer('price'); // giá
            $table->integer('price_sale'); // giá km
            $table->string('thumb'); // ảnh sp
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
        Schema::dropIfExists('products');
    }
}
