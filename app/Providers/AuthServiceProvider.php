<?php

namespace App\Providers;

// use App\Policies\Policy;
// use App\Models\Category;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App]\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $this->defineGateCategory();
        $this->defineGateMember();
        $this->defineGateOrder();
        $this->defineGatePermission();
        $this->defineGateProduct();
        $this->defineGateRole();

    }
    public function defineGateCategory(){
        Gate::define('category_list','App\Policies\CategoryPolicy@view');
        Gate::define('category_add','App\Policies\CategoryPolicy@create');
        Gate::define('category_edit','App\Policies\CategoryPolicy@update');
        Gate::define('category_delete','App\Policies\CategoryPolicy@delete');
    }
    public function defineGateProduct(){
        Gate::define('product_list','App\Policies\ProductPolicy@view');
        Gate::define('product_add','App\Policies\ProductPolicy@create');
        Gate::define('product_edit','App\Policies\ProductPolicy@update');
        Gate::define('product_delete','App\Policies\ProductPolicy@delete');
    }
    public function defineGateMember(){
        Gate::define('member_list','App\Policies\MemberPolicy@view');
        Gate::define('member_add','App\Policies\MemberPolicy@create');
        Gate::define('member_edit','App\Policies\MemberPolicy@update');
        Gate::define('member_delete','App\Policies\MemberPolicy@delete');
    }
    public function defineGateOrder (){
        Gate::define('order_list','App\Policies\OrderPolicy@view');
        Gate::define('order_detail','App\Policies\OrderPolicy@detail');
        Gate::define('order_cancel','App\Policies\OrderPolicy@cancel');
        Gate::define('order_delete','App\Policies\OrderPolicy@delete');
    }
    public function defineGateRole (){
        Gate::define('role_list','App\Policies\RolePolicy@view');
        Gate::define('role_add','App\Policies\RolePolicy@create');
        Gate::define('role_edit','App\Policies\RolePolicy@update');
        Gate::define('role_delete','App\Policies\RolePolicy@delete');
    }
    public function defineGatePermission (){
        Gate::define('permission_list','App\Policies\PermissionPolicy@view');
        Gate::define('permission_add','App\Policies\PermissionPolicy@create');
        Gate::define('permission_edit','App\Policies\PermissionPolicy@update');
        Gate::define('permission_delete','App\Policies\PermissionPolicy@delete');
    }

}
