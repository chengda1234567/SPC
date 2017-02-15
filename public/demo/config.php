<?php
/**
 * demo 项目配置
 */
#路径配置
define ('WEB_ROOT', __DIR__ . '/');
define ('WEB_BASE', dirname(dirname(WEB_ROOT)));
define('PRODUCT','demo');//产品名称
#数据库配置
define('DB_IP',         'localhost');
define('DB_IP_PORT',    '3306');
define('DB_IP_USERNAME', 'root');
define('DB_IP_PASSWORD', '');
define('DB_Driver ','mysql');

date_default_timezone_set('Etc/GMT-8');