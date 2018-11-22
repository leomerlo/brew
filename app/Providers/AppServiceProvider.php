<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Auth;
use App\Models\RecordType;
use App\Models\Record;
use App\Repositories\Contracts\RecordRepositoryContract;
use App\Repositories\EloquentRecordRepository;

class AppServiceProvider extends ServiceProvider
{
    /*
    @var array Define las vinculaciones de interfaces a implementaciones. */
    public $bindings = [
        RecordRepositoryContract::class => EloquentRecordRepository::class
    ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Illuminate\Support\Facades\Schema::defaultStringLength(191);

        $record_types = RecordType::all();
        view()->share('adminMenu', $record_types);

        $pages = array_merge(Record::where('show_on_menu',1)->get()->toArray(),RecordType::where('show_on_menu',1)->get()->toArray());
        view()->share('frontMenu', $pages);

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
