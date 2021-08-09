<?php

use App\Models\City;
use App\Models\DonationRequest;
use App\Models\User;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('make:user', function () {
    $faker = Faker\Factory::create();
    $phone = 9800000100;
    for ($i = 0; $i < 1000; $i++) {
        # code...
        $user = new User();
        $user->name = $faker->name();
        $user->role = 2;
        $user->phone = $phone + $i;
        $user->blood_group = mt_rand(0, 7);
        $user->city_id = mt_rand(1, 100);
        $user->address = $faker->streetAddress;
        $user->ldd = $faker->dateTimeThisYear($max = 'now');
        // $user->email_verified_at= now();
        $user->password = bcrypt("admin123"); // password
        // $user->remember_token = Str::random(10);
        $user->save();
    }
})->purpose('Display an inspiring quote');

Artisan::command('make:city', function () {
    $faker = Faker\Factory::create();
    for ($i = 0; $i < 100; $i++) {
        $city = new City();
        $city->name = $faker->city();
        $city->save();
    }
});

Artisan::command('make:request', function () {
    $faker = Faker\Factory::create();
    for ($i = 0; $i < 2000; $i++) {
        $donationRequest = new DonationRequest();
        $donationRequest->user_id = mt_rand(10, 1000);
        $donationRequest->city_id = mt_rand(1, 100);
        $donationRequest->address = $faker->streetAddress;
        $donationRequest->blood_group = mt_rand(0, 7);
        $donationRequest->required_amount = mt_rand(1, 4);
        $donationRequest->required_date = $faker->dateTimeThisYear($max = 'now');
        $donationRequest->isComplete = mt_rand(0, 1);
        $donationRequest->hospital = $faker->company;
        $donationRequest->save();
    }
});
