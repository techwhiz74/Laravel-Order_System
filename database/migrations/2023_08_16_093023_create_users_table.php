<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('salutation')->nullable();
            $table->string('company')->nullable();
            $table->string('contact_no')->nullable();
            $table->text('address')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('place')->nullable();
            $table->string('vat_no')->nullable();
            $table->string('site')->nullable();
            $table->string('thread')->nullable();
            $table->string('emb_fileType')->nullable();
            $table->string('vec_fileType')->nullable();
            $table->string('thread_notes')->nullable();
            $table->string('thread_cut_notes')->nullable();
            $table->string('needle_notes')->nullable();
            $table->string('font_notes')->nullable();
            $table->string('special_notes')->nullable();
            $table->longText('address_file')->nullable();
            $table->string('image')->nullable();
            $table->string('user_type')->default('customer');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
        Schema::dropIfExists('users');
    }
};
