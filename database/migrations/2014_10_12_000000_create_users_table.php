<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void {
    Schema::create('users', function (Blueprint $table) {
      $table->id();
      $table->string('first_name');
      $table->string('last_name');
      $table->string('address');
      $table->string('gender');
      $table->string('email')->unique();
      $table->string('contact_number');
      $table->string('password');
      $table->string('user_type');
      $table->text('profile_image')->nullable();
      $table->timestamps();
    });

    DB::table('users')->insert([
      [
        'id' => 1,
        'first_name' => 'admin',
        'last_name' => 'admin',
        'address' => 'ozamiz city',
        'gender' => 'female',
        'email' => 'admin@gmail.com',
        'contact_number' => '09345324563',
        'password' => Hash::make('admin'),
        'user_type' => 'admin',
        'profile_image' => null,
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'id' => 2,
        'first_name' => 'incharge',
        'last_name' => 'incharge',
        'address' => 'ozamiz city',
        'gender' => 'male',
        'email' => 'incharge@gmail.com',
        'contact_number' => '09345324563',
        'password' => Hash::make('incharge'),
        'user_type' => 'incharge',
        'profile_image' => null,
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'id' => 3,
        'first_name' => 'user',
        'last_name' => 'user',
        'address' => 'ozamiz city',
        'gender' => 'male',
        'email' => 'user@gmail.com',
        'contact_number' => '09345324563',
        'password' => Hash::make('user'),
        'user_type' => 'user',
        'profile_image' => null,
        'created_at' => now(),
        'updated_at' => now(),
      ],
    ]);
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void {
    Schema::dropIfExists('users');
  }
};
