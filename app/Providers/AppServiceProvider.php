<?php

namespace App\Providers;

use Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $halaman = '';
        $menu = '';
        if (Request::segment(1) == 'home') {
            $halaman = 'home';
        }
        if (Request::segment(1) == 'kelas') {
            $halaman = 'kelas';
            $menu = 'master';
        }
        if (Request::segment(1) == 'siswa') {
            $halaman = 'siswa';
            $menu = 'master';
        }
        View::share('halaman', $halaman);
        View::share('menu', $menu);
    }
}
