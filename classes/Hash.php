<?php
class Hash {
    public static function make($string,$salt='') {
        return hash('sha256',$string.$salt);
    }
    
    public static function salt() {
        return bin2hex(mcrypt_create_iv(16));
    }
    
    public static function unique(){
        return self::make(uniqid());
    }
}