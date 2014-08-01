<?php
/**
 * Container
 * Base view layer object
 * 
 * @category   Erdiko
 * @package    Core
 * @copyright  Copyright (c) 2014, Arroyo Labs, http://www.arroyolabs.com
 * @author	   John Arroyo
 */
namespace erdiko\core;

/**
 * Container Class
 */
abstract class Container
{
    /** Template */
    protected $_template = null;
    /** Data */
    protected $_data = null;
    /** Default Template */
    protected $_defaultTemplate = 'default';
    /** Template Folder */
    protected $_templateFolder = null;

    /**
     * Constructor
     * @param string $template , Theme Object (Contaier)
     * @param mixed $data
     */
    public function __construct($template = null, $data = null)
    {
        $template = ($template === null) ? $this->_defaultTemplate : $template;
        $this->setTemplate($template);
        $this->setData($data);
    }
	
    /**
     * Set Container template
     * 
     * @param string $template
     */
    public function setTemplate($template)
    {
    	$this->_template = $template;
    }

    /**
     * Set data
     *
     * @param mixed $data , data injected into the container
     */
    public function setData($data)
    {
        $this->_data = $data;
    }

    /**
     * Get data
     *
     * @return mixed $data , data injected into the container
     */
    public function getData()
    {
        return $this->_data;
    }

    /**
     * Get Template folder
     */
    public function getTemplateFolder()
    {
        return APPROOT.'/'.$this->_templateFolder.'/';
    }

    /**
     * Get rendered template file
     * Accepts one of the types of template files in this order:
     * php (.php), html/mustache (.html), markdown (.md)
     * 
     * @param string $filename , file without extension
     * @param array $data , associative array of data
     * @throws \Exception , template file does not exist
     */
    public function getTemplateFile($filename, $data)
    {
        if (is_file($filename.'.php'))
        {
            ob_start();
            include $filename.'.php';
            return ob_get_clean();

        } elseif (is_file($filename.'.html')) {
            $file = file_get_contents($filename.'.html');
            $m = new \Mustache_Engine;
            return $m->render($file, $data); 

        } elseif (is_file($filename.'.md')) {
            $parsedown = new \Parsedown();
            return $parsedown->text(file_get_contents($filename.'.md'));
        }
        
        throw new \Exception("Template file does not exist");
    }

    /**
     * Render container to HTML
     * 
     * @return string $html
     */
    public function toHtml()
    {
        $filename = $this->getTemplateFolder().$this->_template;
        $data = (is_subclass_of($this->_data, 'erdiko\core\Container')) ? $this->_data->toHtml() : $this->_data;
        // error_log("toHtml filename: $filename");

        return $this->getTemplateFile($filename, $data);
    }
}
