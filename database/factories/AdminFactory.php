<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'name' => "your name",
            'email' => "your email",
            'email_verified_at' => now(),
            'password' => Hash::make("your password"), // password
            'remember_token' => Str::random(10),
        ];
    }
}
