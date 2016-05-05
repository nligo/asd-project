<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * RedisClient class
 * @author bret
 * @
 */
class Redisclient
{
	private static $_redisObj;
	
	private static $redisConfig;
	
	private static $count=0;
	
    public function __construct($config=array('default')) {
    	
    	include(APPPATH.'config/redis.php');
    	self::$redisConfig = $redisconfig[$config[0]];
    	
	}
	
	public function init()
	{
		$conf = self::$redisConfig;
		if(empty($conf)){
			throw new Exception('redis 配置为空');
		}

		if(self::$_redisObj)
		{
			if(is_callable(array(self::$_redisObj,'ping')))
			{
				try {
					self::$_redisObj->ping();
					return self::$_redisObj;
				}catch (Exception $e) {
					echo '<!--Caught exception: '.$e->getMessage()."-->";
				}
			}
		}
		
		if(!class_exists('Redis'))
		{
			exit('<!--redis client not installed-->');
		}
		
		self::$_redisObj = new Redis();
		self::$_redisObj->connect($conf['redis_host'], $conf['redis_port']);
		$conf['redis_auth'] && self::$_redisObj->auth($conf['redis_auth']);
		$conf['redis_db'] && self::$_redisObj->select($conf['redis_db']);
		return self::$_redisObj;
	}
	
	public function __clone () {
		throw new Exception('不允许Clone.');
	}
	
	private function close() {
		if(self::$_redisObj)
		{
			if(is_callable(array(self::$_redisObj,'ping')))
			{
				self::$_redisObj->close();
			}
		}
		return true;
	}

	public function __destruct()
	{
		$this->close();
	}
}


