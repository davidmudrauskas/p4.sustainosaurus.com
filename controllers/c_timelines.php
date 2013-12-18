<?php

class timelines_controller extends base_controller {
	
	/*-------------------------------------------------------------------------------------------------

	-------------------------------------------------------------------------------------------------*/
	public function __construct() {
		parent::__construct();
	} 

	public function index() {

		$this->template->content = View::instance('v_timelines_index');
		
		$this->template->title = "Hello World";
	
		# CSS/JS includes
		/*
		$client_files_head = Array("");
    	$this->template->client_files_head = Utils::load_client_files($client_files);
    	
    	$client_files_body = Array("");
    	$this->template->client_files_body = Utils::load_client_files($client_files_body);   
    	*/
	      					     		
		echo $this->template;

	}

}