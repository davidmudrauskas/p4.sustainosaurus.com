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
		$this->template->title = "Tracing the Past -- ".ucfirst($timeline_option);

		# Construct timeline
		$q = "SELECT *
			FROM states WHERE timeline = '".$timeline_option."'";

		$state_timespans = DB::instance(DB_NAME)->select_rows($q);

		# Pass variables to the view
		$this->template->content->state_timespans = $state_timespans;
		$this->template->content->timeline_option = $timeline_option;

		# Render template
		echo $this->template;

		#Steps for view's foreach loop
		$first_start_year = $state_timespans[0]['start_year'];
		$counter = 0;

	}

}