<?php
/**
 * Plugin Name: Rug Example
 */
class Rug_Plugin_Helper {
	
    
    private  static $instance;
	
	private $path;
	private $url;
	
	
    private function __construct() {
		
		$this->path = plugin_dir_path( __FILE__ );
		$this->url = plugin_dir_url( __FILE__ );
            
		
		add_action( 'bp_loaded', array( $this, 'load' ) );
		
	}
		
   /**
    * Singleton Instance
    * 
    * @return Rug_Plugin_Helper
    */
    public static function get_instance() { 
        
        if( ! isset ( self::$instance ) )
            self::$instance = new self();
        
        return self::$instance;
    }
	
	
	public function load() {
		
		$path = $this->path;
		
		
		$files = array(
			'group-extension.php',
			'functions.php',
		);
		
		foreach( $files as $file )
			require_once $path . $file ;
	}
	
	
	
}

Rug_Plugin_Helper::get_instance();


