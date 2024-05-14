<?php

use Illuminate\Support\Facades\Route;

Route::get('checking_install_packages', [\Antefil\Parser\Http\Controllers\InstallPakController::class, 'index'])->name('index');
Route::get('vendor/connect/add/vk', [\Antefil\Parser\Http\Controllers\ConnectController::class, 'add_connect_vk'])->name('vendor_add_connect_vk');
Route::get('vendor/connect/respons/vk', [\Antefil\Parser\Http\Controllers\ConnectController::class, 'respons_connect_vk'])->name('vendor_respons_connect_vk');