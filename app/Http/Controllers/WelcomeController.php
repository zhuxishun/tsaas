<?php namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Container\Container;

class WelcomeController {
    public function index()
    {
        $tenant = Tenant::all();
        $app = Container::getInstance();
        $factory = $app->make('view');
        return $factory->make('welcome')->with('tenant',$tenant);
    }
}