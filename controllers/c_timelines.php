<?php

class timelines_controller extends base_controller {
	
	/*-------------------------------------------------------------------------------------------------

	-------------------------------------------------------------------------------------------------*/
	public function __construct() {
		parent::__construct();
	} 

	public function index($timeline_option) {

		# Set up view
		$this->template->content = View::instance('v_timelines_index');
		$this->template->title = "Hello World";

		# Construct timeline
    	$q = "SELECT *
			FROM states WHERE timeline = '".$timeline_option."'";
			//.$this->user->user_id;

		$state_timespans = DB::instance(DB_NAME)->select_rows($q);

		# Pass variables to the view
		$this->template->content->state_timespans = $state_timespans;
		$this->template->content->timeline_option = $timeline_option;

		# Render template
		echo $this->template;

		//$duration = $timespan['end_date'] - $timespan['start_date']

	}

}