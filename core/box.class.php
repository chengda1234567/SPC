<?php
/**
 * 加载指定类型的类程序
 **/
class Box
{

    public static $_modelObjArr;

    public static function getObject($_appName, $_typeStr = 'controller', $product = '')
    {

        $_appName = strtolower($_appName);
        $_typeStr = strtolower($_typeStr);
        $className = $_appName . ucfirst($_typeStr);
        //var_dump($className); exit();
        if (isset(self::$_modelObjArr[$className]) && is_object(self::$_modelObjArr[$className])) {
            return self::$_modelObjArr[$className];
        }
        $appdir = ($product === '') ? PRODUCT : $product;
        $file = WEB_BASE . "/app/" . $appdir . "/${_typeStr}/${_appName}.${_typeStr}.php";
        //echo $file;
        if (file_exists($file)) {
            include_once $file;
            if (class_exists($className)) {
                return self::_createObject($className);
            }
        }
        return null;
    }

    public static function controller($appname, $product)
    {

        return self::getObject($appname, 'controller', $product);
    }

    public static function model($appname, $product)
    {

        return self::getObject($appname, 'model', $product);
    }

    public static function load_sys_class($appname, $product = '')
    {

        return self::_load_class($appname, "libs", $product);
    }

    public static function load_libs_class($appname, $libtype = 'db')
    {

        static $class_libs = array();
        $className = strtolower($appname);
        $libtype = strtolower($libtype);
        $path = "libs" . DIRECTORY_SEPARATOR . $libtype;
        $key = md5($path . $className);
        if (isset($class_libs[$key])) {
            if (!empty($class_libs[$key])) {
                return $class_libs[$key];
            } else {
                return true;
            }
        }
        if (file_exists(WEB_BASE . DIRECTORY_SEPARATOR . "app" . DIRECTORY_SEPARATOR . $path . DIRECTORY_SEPARATOR . $className . '.libs.php')) {
            include WEB_BASE . DIRECTORY_SEPARATOR . "app" . DIRECTORY_SEPARATOR . $path . DIRECTORY_SEPARATOR . $className . '.libs.php';
            $class_libs[$key] = new $className;
        }
        return $class_libs[$key];
    }


    public static function load_contorl_class($appname, $product = '')
    {

        return self::_load_class($appname, "controller", $product);
    }

    public static function load_model_class($modelName, $product = '')
    {

        return self::_load_class($modelName, "model", $product);
    }

    public static function load_entity_class($modelName, $product = '')
    {

        return self::_load_class($modelName, "entity", $product);
    }

    public static function load_config_class($configName, $key = '', $reload = false)
    {

        static $configs = array();
        $configName = strtolower($configName);
        $produceName = empty($produceName) ? PRODUCT : $produceName;

        if (!$reload && isset($configs[$configName])) {

        } else {
            $path = WEB_BASE . DIRECTORY_SEPARATOR . "config" . DIRECTORY_SEPARATOR . $produceName . DIRECTORY_SEPARATOR . $configName . ".php";
            if (file_exists($path)) {
                $configs[$configName] = include $path;
            }
        }
        if (empty($key)) {
            return $configs[$configName];
        } elseif (isset($configs[$configName][$key])) {
            return $configs[$configName][$key];
        } else {
            return '';
        }
    }


    private static function _load_class($className, $type = 'libs', $produceName)
    {

        static $classes = array();
        //$className = strtolower($className);
        $type = strtolower($type);
        $produceName = empty($produceName) ? PRODUCT : $produceName;
        $path = $type . DIRECTORY_SEPARATOR . $produceName;
        $key = md5($path . $className);
        if (isset($classes[$key])) {
            if (!empty($classes[$key])) {
                return $classes[$key];
            } else {
                return true;
            }
        }
        if (file_exists(WEB_BASE . DIRECTORY_SEPARATOR . "app" . DIRECTORY_SEPARATOR . $path . DIRECTORY_SEPARATOR . $className . "." . $type . '.php')) {
            include WEB_BASE . DIRECTORY_SEPARATOR . "app" . DIRECTORY_SEPARATOR . $path . DIRECTORY_SEPARATOR . $className . "." . $type . '.php';
            //if($type=="controller") $className = $className.ucfirst ($type);
            $classes[$key] = new $className;
        }
        return $classes[$key];
    }

    public static function load_service_class($className)
    {

        return self:: _load_class($className, "service", '');

    }

    public static function _createObject($_className)
    {

        if (isset(self::$_modelObjArr[$_className]) && is_object(self::$_modelObjArr[$_className])) {
            return self::$_modelObjArr[$_className];
        } else {
            //var_dump($_className);
             self::$_modelObjArr[$_className] = new $_className();
             return self::$_modelObjArr[$_className];
        }
    }

    //错误提示
    public static function _showErr($_errTypeStr = '')
    {

        echo $_errTypeStr;
        exit;
        //errorlog($_errTypeStr);
    }
}//end class
