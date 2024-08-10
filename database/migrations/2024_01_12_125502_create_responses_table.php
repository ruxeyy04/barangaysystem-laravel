<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void {
    Schema::create('responses', function (Blueprint $table) {
      $table->id();
      $table->foreignId('message_id')->constrained()->cascadeOnDelete();$table->foreignId('user_id')->constrained()->cascadeOnDelete();
      $table->text('response');
      $table->timestamps();
    });
    
    DB::table('responses')->insert([
      [
        'message_id' => 1,
        'user_id' => 3,
        'response' => 'Imong anak sig kalibang dra bahala namo inyo nang sala',
        'created_at' => now(),
        'updated_at' => now(),
      ],
    ]);
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void {
    Schema::dropIfExists('responses');
  }
};
