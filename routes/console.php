<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

 # Laravel 11 -> routes/console.php
 use Illuminate\Support\Facades\Schedule;
 use NjoguAmos\Pesapal\Models\PesapalToken;
 
 Schedule::command('pesapal:auth')->everyFourMinutes();
 Schedule::command('model:prune', ['--model' => [PesapalToken::class]])->everyFiveMinutes();