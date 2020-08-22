<?php

use App\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table("users")->insert([
      "name"              => "Jose Guerrero",
      "email"             => "jose.guerrero.carrizo@gmail.com",
      "password"          => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi", // password
      "created_at"        => now(),
      "updated_at"        => now(),
      "email_verified_at" => now(),
      "remember_token"    => Str::random(10),
    ]);
    factory(User::class, 50)->create();
  }
}
