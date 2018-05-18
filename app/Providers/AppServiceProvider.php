<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\category;
use App\Author;
use Illuminate\Support\Facades\DB;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        view()->composer('layout.elements.side_bar',function($view)
        {
            $listCategory=category::all();
            $listAuthor=Author::all();
            $view->with('listCategory',$listCategory);
            $view->with('listAuthor',$listAuthor);


            $listCategoryAndQuantity = DB::table('book')
            ->join('category','category.category_id','=','book.category_id')
            ->selectraw('category.category_id,category.category_name, COUNT(*) AS "Sum"')
            ->groupBy('category.category_id','category.category_name')
            ->get();
            $view->with('listCategoryAndQuantity',$listCategoryAndQuantity);
        });
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
