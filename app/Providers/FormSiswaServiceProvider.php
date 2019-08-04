<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Kelas;

class FormSiswaServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('master.siswa.form', function ($view) {
            $view->with('kelas_list', Kelas::pluck('nama_kelas', 'id'));
        });
    }
}
