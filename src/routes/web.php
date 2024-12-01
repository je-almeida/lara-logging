<?php

use Jeff\LaraLogger\App\Models\LogModel;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

Route::get('/xxx', function () {
  return view('welcome');
});

Route::get('/x', function () {
  Log::info('okok');
  return LogModel::all(['level', 'message']);
});
