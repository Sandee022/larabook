<?php

$factory('Larabook\Users\User',[
    'username' => $faker->userName,
    'email' => $faker->email,
    'password' => $faker->word
]);

$factory('Larabook\Statuses\Status', [
    'user_id' => 'factory:Larabook\Users\User',
    'body' => $faker->paragraph(),
]);