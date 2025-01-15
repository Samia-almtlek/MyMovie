<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id(); // بدلاً من increments
            $table->string('slug');
            $table->string('title');
            $table->longText('description');
            $table->longText('my_review');
            $table->string('image_path');
            $table->string('genre'); 
            $table->integer('release_year'); 
            $table->timestamps();
            $table->unsignedBigInteger('user_id'); // مفتاح أجنبي
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // حذف البيانات المرتبطة عند حذف المستخدم
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};