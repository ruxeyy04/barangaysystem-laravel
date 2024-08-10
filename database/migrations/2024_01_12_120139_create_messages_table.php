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
    Schema::create('messages', function (Blueprint $table) {
      $table->id();
      $table->foreignId('user_id')->constrained()->cascadeOnDelete();
      $table->string('subject');
      $table->text('message');
      $table->string('status')->default('Pending');
      $table->timestamps();
    });

    DB::table('messages')->insert([
      [
        'user_id' => 3,
        'subject' => 'Sewer smell',
        'message' => 'Why does our sewer smell so much. Baho kaayo please fix chatgpt',
        'status' => 'Completed',
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'user_id' => 3,
        'subject' => 'Tubig wala',
        'message' => 'Di mi kaligo way tubig, please fix chatgpt. Ayoha among tubig salamat',
        'status' => 'Pending',
        'created_at' => now(),
        'updated_at' => now(),
      ]
    ]);
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void {
    Schema::dropIfExists('messages');
  }
};
