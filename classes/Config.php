<?php 
class Config{
    public static function get($path=null) {
        if($path) {
            $config=$GLOBALS['config'];
            $path=explode('/',$path);
            foreach($path as $bit){
                if(isset($config[$bit])) {
                    $config=$config[$bit];
                }
            }
            return $config;
        }
        return false;
    }
}
/*define('host','localhost');
define('usename','root');
define('password','');
define('db','loginregdb');*/
?>