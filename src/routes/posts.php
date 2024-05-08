<?php

use Illuminate\Support\Facades\Route;

Route::get('/install/pak', [\Parser\Posts\Http\Controllers\InstallPakController::class, 'index'])->name('index');
Route::get('vendor/connect/add/vk', [\Parser\Posts\Http\Controllers\ConnectController::class, 'add_connect_vk'])->name('vendor_add_connect_vk');
Route::get('vendor/connect/respons/vk', [\Parser\Posts\Http\Controllers\ConnectController::class, 'respons_connect_vk'])->name('vendor_respons_connect_vk');