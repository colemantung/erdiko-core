<?php
/**
 * Controller
 *
 * Base request handler, All controllers should inherit this class.
 * 
 * @category   Erdiko
 * @package    Core
 * @copyright  Copyright (c) 2014, Arroyo Labs, http://www.arroyolabs.com
 * @author	   John Arroyo
 */
namespace erdiko\core;
use Erdiko;

/**
 * AjaxController class
 */
class AjaxController extends Controller 
{
	/**
 	 * Contructor
 	 */
	public function __construct()
	{
		$this->_webroot = ROOT;
		$this->_response = new \erdiko\core\AjaxResponse;
    }
}