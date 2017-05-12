<?php

require_once( config_get( 'class_path' ) . 'MantisPlugin.class.php' );

class PasteZonePlugin extends MantisPlugin  {

	/**
	 *  A method that populates the plugin information and minimum requirements.
	 */
	function register( ) {
		$this->name = "PasteZone";
		$this->description = "Paste screenshots, pictures or files into 'Issue Details' form";
		$this->page = '';

		$this->version = '1.0.1';
		$this->requires = array(
			'MantisCore' => '2.0.0',
		);

		$this->author = 'Pawel Rojek';
		$this->contact = 'pawel@pawelrojek.pl';
		$this->url = 'https://github.com/pawelrojek/mantisbt-pastezone';
	}


	function init() {
		plugin_event_hook( 'EVENT_REPORT_BUG_FORM', 'add_resources' );
		plugin_event_hook( 'EVENT_VIEW_BUG_DETAILS', 'add_resources' );
		plugin_event_hook( 'EVENT_CORE_HEADERS', 'csp_headers' );
	}


    function csp_headers()
    {
         http_csp_add( 'img-src', 'self data:' );
	}


	function add_resources( $p_event, $p_project_id )
    {
        //language strings for JS
        echo '<script type="text/javascript" src="'.plugin_page( "js_params.php" ).'&ext=.js"></script>';
        echo '<script type="text/javascript" src="'.plugin_file( "PasteZone.js" ).'"></script>';
	}

}
?>