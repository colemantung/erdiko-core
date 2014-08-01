<?php
/**
 * AjaxResponse
 * 
 * @category   Erdiko
 * @package    Core
 * @copyright  Copyright (c) 2014, Arroyo Labs, http://www.arroyolabs.com
 * @author	   John Arroyo
 */
namespace erdiko\core;
use Erdiko;

/**
 * AjaxResponse class
 */
class AjaxResponse extends Response 
{
    /**
     * Theme
     */
	protected $_theme;
    /**
     * Content
     */
	protected $_content = null;

    /**
     * Ajax render function
     *
     * @return string
     */
    public function render()
    {
        $responseData = array(
            "status" => 500,
            "body" => $this->_content,
            "errors" => array()
            );

        return json_encode($responseData);
    }

}
