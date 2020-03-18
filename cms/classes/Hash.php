<?php
class Hash {
	public static function make($string, $salt =''){
		return hash('sha256', $string . $salt);
	}
	public static function salt($hash_length){
		return openssl_random_pseudo_bytes($hash_length);
		
	}
	public static function unique(){
		return self::make(uniqid());
		
	}
}