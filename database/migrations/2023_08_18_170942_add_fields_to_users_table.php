<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('photo')->nullable()->after('password');
            $table->string('phone')->nullable()->after('password');
            $table->text('address')->nullable()->after('password');
            $table->enum('role',['admin','user'])->default('user')->after('password');
            $table->enum('status',['active','inactive'])->default('active')->after('password');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('photo');
            $table->dropColumn('phone');
            $table->dropColumn('address');
            $table->dropColumn('role');
            $table->dropColumn('status');
        });
    }
};
