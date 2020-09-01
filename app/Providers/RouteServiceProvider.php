<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        // admin
        $this->mapWebRoutes();

        $this->mapAdminHomeRoutes();            //home
        $this->mapAdminLoginLogoutRoutes();
        $this->mapAdminMemberRoutes();         //member
        $this->mapAdminProductRoutes();
        $this->mapAdminProductTypeRoutes();
        $this->mapAdminCategoryRoutes();
        $this->mapAdminOrderRoutes();
        $this->mapAdminPermissionRoutes();
        $this->mapAdminRoleRoutes();

        $this->mapApiRoutes();

        // client
        $this->mapClientHomeRoutes();
        $this->mapClientProductRoutes();
        $this->mapClientCartRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }

    //   Admin
    protected function mapAdminHomeRoutes()                  //home
    {
        Route::middleware('web', 'CheckLoginAdmin')
            ->namespace('App\Http\Controllers\Admin')
            ->group(base_path('routes/admin/home.php'));
    }
    protected function mapAdminLoginLogoutRoutes()          //login-logout
    {
        Route::middleware('web')
            ->namespace('App\Http\Controllers\Admin')
            ->group(base_path('routes/admin/login-logout.php'));
    }
    protected function mapAdminMemberRoutes()             //member
    {
        Route::middleware('web', 'CheckLoginAdmin')
            ->namespace('App\Http\Controllers\Admin')
            ->group(base_path('routes/admin/member.php'));
    }
    protected function mapAdminProductRoutes()       //product
    {
        Route::middleware('web','CheckLoginAdmin')
            ->namespace('App\Http\Controllers\Admin')
            ->group(base_path('routes/admin/product.php'));
    }
    protected function mapAdminProductTypeRoutes()      //productType
    {
        Route::middleware('web','CheckLoginAdmin')
            ->namespace('App\Http\Controllers\Admin')
            ->group(base_path('routes/admin/productType.php'));
    }
    protected function mapAdminOrderRoutes()            //order
    {
        Route::middleware('web', 'CheckLoginAdmin')
            ->namespace('App\Http\Controllers\Admin')
            ->group(base_path('routes/admin/order.php'));
    }
    protected function mapAdminCategoryRoutes()            //category
    {
        Route::middleware('web','CheckLoginAdmin')
            ->namespace('App\Http\Controllers\Admin')
            ->group(base_path('routes/admin/category.php'));
    }
    protected function mapAdminPermissionRoutes()             //permission
    {
        Route::middleware('web','CheckLoginAdmin')
            ->namespace('App\Http\Controllers\Admin')
            ->group(base_path('routes/admin/permission.php'));
    }
    protected function mapAdminRoleRoutes()              //role
    {
        Route::middleware('web','CheckLoginAdmin')
            ->namespace('App\Http\Controllers\Admin')
            ->group(base_path('routes/admin/role.php'));
    }

    // client
    protected function mapClientHomeRoutes()
    {
        Route::middleware('web')
            ->namespace('App\Http\Controllers\Client')
            ->group(base_path('routes/client/home.php'));
    }

    protected function mapClientProductRoutes()
    {
        Route::middleware('web')
            ->namespace('App\Http\Controllers\Client')
            ->group(base_path('routes/client/product.php'));
    }
    protected function mapClientCartRoutes()
    {
        Route::middleware('web')
            ->namespace('App\Http\Controllers\Client')
            ->group(base_path('routes/client/cart.php'));
    }

}
