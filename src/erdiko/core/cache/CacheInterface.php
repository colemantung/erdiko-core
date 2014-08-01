<?php
/**
 * Interface for all supported php caches
 * 
 * @category  	Erdiko
 * @package   	core
 * @copyright 	Copyright (c) 2012, Arroyo Labs, www.arroyolabs.com
 * @author		Varun Brahme
 */
namespace erdiko\core\cache;

/**
 * Cache Interface
 */
interface CacheInterface
{
	/**
 	 * Put cache
     */
	public function put($key,$data);
	
	/**
 	 * Get cache
     */
	public function get($key);
	
	/**
 	 * Forget cache
     */
	public function forget($key);
	
	/**
 	 * Check if the cache exists
     */
	public function has($key);
	
	/**
 	 * Forget all cache
     */
	public function forgetAll();
}
