<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Models\Role;
use App\Models\User;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('user:make-admin {email}', function (string $email) {
    $user = User::where('email', $email)->first();

    if (! $user) {
        $this->error('User dengan email tersebut tidak ditemukan.');

        return;
    }

    $adminRole = Role::where('name', 'admin')->first();

    if (! $adminRole) {
        $this->error('Role "admin" tidak ditemukan.');

        return;
    }

    $user->role_id = $adminRole->id;
    $user->save();

    $this->info('User '.$user->email.' sekarang sudah menjadi admin.');
})->purpose('Ubah role user menjadi admin');
