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
    if (Schema::hasTable('MUnit_Color')) {
      return;
    }

    Schema::create('MUnit_Color', function (Blueprint $table) {
      $table->id('ColorId');
      $table->string('ColorCode')->unique();
      $table->string('ColorName')->nullable();
      $table->timestamps();
      $table->softDeletes();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('MUnit_Color');
  }
};
