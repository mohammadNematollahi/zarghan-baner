<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $salt = Hash::make(Str::random(20));
        $password = Hash::make("123456789" . $salt);
        return [
            "username" => "admin",
            "salt" => $salt,
            "password" => $password,
            "email" => "nematollahi27@gmail.com",
            "status" => 1       
        ];
    }
}
