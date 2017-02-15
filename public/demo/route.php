<?php
// Autoload 自动载入
use Klein\Klein;
require '../../vendor/autoload.php';
require 'config.php';

/**
 * 采用klein 路由  熟悉
 */
$klein = new Klein();
$klein->respond('/[:controller]/[:function]', function ($request) {

    $ConstrollerName=$request->controller;
    $obj=Box::getObject($ConstrollerName);

    if($obj == null){
        header('HTTP/1.1 404 Not Found');
        exit();
    }

    $func = $request->function;

    // 判断类中是否存在该方法 如果不存在抛出异常
    if(!method_exists ($obj,$func)){
        header('HTTP/1.1 404 Not Found');
        exit();
    }
    return $obj->$func();
});


$klein->respond('/[:controller]', function ($request) {

    $ConstrollerName=$request->controller;
    $obj=Box::getObject($ConstrollerName);

    if($obj == null){
        header('HTTP/1.1 404 Not Found');
        exit();
    }
    $func = 'render';
    return $obj->$func();
});


// 首页
$klein->respond('GET', '/', function () {
    return 'Hello World!';
});


//$klein->afterDispatch();
$klein->dispatch();