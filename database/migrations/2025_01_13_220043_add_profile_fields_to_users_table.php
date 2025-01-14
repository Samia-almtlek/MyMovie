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
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->nullable()->after('name'); // اسم المستخدم
            $table->date('birthday')->nullable()->after('username'); // تاريخ الميلاد
            $table->string('profile_photo')->nullable()->after('birthday'); // الصورة الشخصية
            $table->text('about_me')->nullable()->after('profile_photo'); // النص "عنّي"
        });
    }
    
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['username', 'birthday', 'profile_photo', 'about_me']);
        });
    }
    
};