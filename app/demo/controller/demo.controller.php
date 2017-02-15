<?php

class DemoController {

    function __construct(){
        //echo '123';
        $db=new DB();
        $this->_ORM=$db->ORM_Model();
    }
    /*
     * 默认首页
     */
    function render(){
        //echo "123";
    }
    /*
     * 其他页面
     */
    public static function demo(){
        //echo "This is a demo ";
        // article::first();
        Box::getObject('articles','model');
        //var_dump(Article::first());
        $demo= Articles::find(1);
       // var_dump($demo);
        $aa=new twig();
        $aa->assign('demo',$demo);
        echo $aa->display('demo.html');

    }


}