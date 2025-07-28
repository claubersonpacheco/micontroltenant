<?php

//use App\Models\Setting;
use Illuminate\Support\Facades\App;
use Stancl\Tenancy\Contracts\Tenant;
use Illuminate\Support\Facades\Schema;

//if (!function_exists('setting')) {
//    function setting()
//    {
//        // Evita erro se a tabela ainda não foi criada
//        if (!Schema::hasTable('settings')) {
//            return null;
//        }
//
//        try {
//            return Setting::first(); // funciona para tenant e central
//        } catch (\Exception $e) {
//            return null;
//        }
//    }
//}


