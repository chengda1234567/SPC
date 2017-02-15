<?php

/** 重写数据库
 * Created by PhpStorm.
 * User: cd
 * Date: 2017/2/14
 * Time: 14:49
 */
class DB extends Illuminate\Database\Eloquent\Model
{
        /**
         * 开启ORM 模式
         */
        function __construct()
        {

        }

        //开启ORM 模式
        function ORM_Model(){
            $capsule=new Illuminate\Database\Capsule\Manager();
            $capsule->addConnection([
                'driver'    => 'mysql',
                'host'      => 'localhost',
                'database'  => 'test',
                'username'  => 'root',
                'password'  => '',
                'charset'   => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix'    => '',
            ]);
            $capsule->bootEloquent();

        }


        function  PDO_Model(){

        }




}