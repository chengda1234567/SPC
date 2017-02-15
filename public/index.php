<?php
// Autoload 自动载入
require '../vendor/autoload.php';
/**
 * 采用klein 路由  熟悉
 */
use Klein\Klein;
$klein = new Klein();

// 二级请求 c + f 模式
$klein->respond('/[:controller]/[:function]', function ($request) {
    $ConstrollerName=$request->controller;
    //var_dump($ConstrollerName);
    $obj=Box::getObject($ConstrollerName);
    //var_dump($obj);

});


// 首页
$klein->respond('GET', '/', function () {
    return 'Hello World!';
});


//$klein->afterDispatch();
$klein->dispatch();