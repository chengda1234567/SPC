<?php
/** 加载twig工具
 * Created by PhpStorm.
 * User: cd
 * Date: 2017/2/13
 * Time: 15:53
 */
class twig{
    protected  $_twig;
    function __construct($templatesPath = "")
    {
        $this->_vars = array();
    }
        public function display($file){
        //将文件路径拼出来
        $file_url = WEB_BASE.'/app/'.PRODUCT.'/views/'.$file;
        //判断是不是文件，如果是文件就将文件引进来
        if(is_file($file_url)){
            $loader = new \Twig_Loader_Filesystem(WEB_BASE.'/app/'.PRODUCT.'/views/');
            $twig = new \Twig_Environment($loader,array(
               'cache' => WEB_BASE.'/log/'.PRODUCT.'/twig',
            ));
            $template = $twig->load($file);
            echo $template->render($this->_vars);
        }
    }

    public function assign($var, $val)
    {
        $this->_vars[$var] = $val;
    }



}