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
    var $_admin = array('theme'  => 'default',
                        'donate' => true
                        );
    
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
        $this->_options = array_merge($this->_options, $options);
        $this->_admin   = array_merge($this->_admin, $admin);
    }
    
    /**
     * _updateCache
     *
     * Update cache of style file
     * 
     * @return  rettype  return
     */
    function _updateCache() 
    {
        global $blog_id;
        
        if (!$blog_id) {
            $blog_id = 1;
        }
        
        $css = "/*generated ".date('Y-m-d H:i')."*/\n\n";
        
        ob_start();
        include_once CONSTRUCTOR_DIRECTORY .'/css.php';
        $css .= ob_get_contents();
        ob_end_clean();
        
	    file_put_contents(CONSTRUCTOR_DIRECTORY .'/cache/style'.$blog_id.'.css', $css);
    }
    
    /**
     * _updateOptions
     *
     * update constructor options
     *
     * @param   array    $data
     * @return  array
     */
    function _updateOptions($data = array()) 
    {
        $this->_options = array_merge($this->_options, $data);
        
        update_option('constructor', $this->_options);
        
        // need update style cache
        $this->_updateCache();

    }
    
    /**
     * _updateAdmin
     *
     * update constructor admin options
     *
     * @param   array    $data
     * @return  array
     */
    function _updateAdmin($data = array()) 
    {
        $this->_admin = array_merge($this->_admin, $data);
        update_option('constructor_admin', $this->_admin);
    }
}
?>