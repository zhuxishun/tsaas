<?php
/*********************************************************************************
 *  PhpStorm - composer
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By cw100.com
 * 文件内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:index.php
 * $Author:zxs
 * $Dtime:2017/5/24
 ***********************************************************************************/
require __DIR__ . "/../vendor/autoload.php";

$app = new \Illuminate\Container\Container;
\Illuminate\Container\Container::setInstance($app);

with( new \Illuminate\Events\EventServiceProvider($app))->register();
with( new \Illuminate\Routing\RoutingServiceProvider($app))->register();

//启动eloquent
$manager = new \Illuminate\Database\Capsule\Manager();
$manager->addConnection(require __DIR__ . '/../config/database.php');
$manager->bootEloquent();

$app->instance('config',new \Illuminate\Support\Fluent());
$app['config']['view.compiled'] = __DIR__ . '/../storage/framework/views';
$app['config']['view.paths'] = [__DIR__ . '/../resources/views'];

with(new \Illuminate\View\ViewServiceProvider($app))->register();
with(new \Illuminate\Filesystem\FilesystemServiceProvider($app))->register();

//路由和请求
require_once __DIR__ . '/../app/Http/routes.php';

$request = \Illuminate\Http\Request::createFromGlobals();

$response = $app['router']->dispatch($request);

$response->send();
