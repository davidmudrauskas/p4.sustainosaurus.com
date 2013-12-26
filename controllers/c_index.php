<?php

class index_controller extends base_controller {
	
	public function __construct() {
		parent::__construct();
	} 
	
	public function index() {

		# Set up view and title
		$this->template->content = View::instance('v_index_index');
		$this->template->title = "Tracing the Past -- Central Asia";
		
		# Render the view
		echo $this->template;

	}
		
}
