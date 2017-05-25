<?php
$app['router']->get('/',function() {

    $a = array(1, 2, 3, 4, 5);
    $x = array();
    $b = array_reduce($a, function ($v, $w) {
        $v += $w;
        return $v;
    });
    print_r($b);
    $c = array_reduce($a,function($v,$w){
        $v += $w;
        return $v;
    },10);
    echo $c;

    $d = array_reduce([],function($v,$w){
        $v += $w;
        return $v;
    },1);
    echo $d;
});
//欢迎
$app['router']->get('welcome','App\Http\Controllers\WelcomeController@index');



