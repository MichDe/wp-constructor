<?php
/**
 * @package WordPress
 * @subpackage Constructor
 */
class Constructor_Abstract 
{
    /**
     * Options by key "constructor"
     *
     * @var array
     */
    var $_options = array();
    
    /**
     * Options by key "constructor_admin"
     *
     * @var array
     */
    var $_admin = array();
    
    /**
     * Nix_Abstract
     * 
     * @access  public
     */
    function Nix_Abstract($options = array(), $admin = array()) 
    {
        $this->__construct($options, $admin);
    }
    
    /**
     * Constructor of Nix_Abstract
     *
     * @access  public
     */
    function __construct($options = array(), $admin = array()) 
    {
        $this->_options = $options;
        $this->_admin   = $admin;
    }
    
    /**
     * _updateOptions
     *
     * update constructor options
     *
     * @param   array    $data
     * @return  array
     */
    function _updateOptions($data) 
    {
        $this->_options = array_merge($this->_options, $data);
        update_option('constructor', $this->_options);
        // need style cache
        $this->_updateAdmin(array('cache' => true));
    }
    
    /**
     * _updateAdmin
     *
     * update constructor admin options
     *
     * @param   array    $data
     * @return  array
     */
    function _updateAdmin($data) 
    {
        $this->_admin = array_merge($this->_admin, $data);
        update_option('constructor_admin', $this->_admin);
    }
}
?>