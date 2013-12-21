<?php

class timelines_controller extends base_controller {
	
	/*-------------------------------------------------------------------------------------------------

	-------------------------------------------------------------------------------------------------*/
	public function __construct() {
		parent::__construct();
	} 

	public function index() {

		# Set up view
		$this->template->content = View::instance('v_timelines_index');
		$this->template->title = "Hello World";

		# Construct timeline
    	$q = "SELECT *
			FROM states WHERE timeline = 'Turkic'";
			//.$this->user->user_id;

		$state_timespans = DB::instance(DB_NAME)->select_rows($q);

		# Pass profile details to the view
		$this->template->content->state_timespans = $state_timespans;

		# Render template
		echo $this->template;

		//$duration = $timespan['end_date'] - $timespan['start_date']

	}

	public function turkic() {

		# Set up view
		$this->template->content = View::instance('v_timelines_index');
		$this->template->title = "Hello World";

		# Construct timeline
    	$q = "SELECT *
			FROM states WHERE timeline = 'Turkic'";
			//.$this->user->user_id;

		$state_timespans = DB::instance(DB_NAME)->select_rows($q);

		# Pass profile details to the view
		$this->template->content->state_timespans = $state_timespans;

		# Render template
		echo $this->template;

		//$duration = $timespan['end_date'] - $timespan['start_date']

	}

		public function iranian() {

		# Set up view
		$this->template->content = View::instance('v_timelines_index');
		$this->template->title = "Hello World";

		# Construct timeline
    	$q = "SELECT *
			FROM states WHERE timeline = 'Iranian'";
			//.$this->user->user_id;

		$state_timespans = DB::instance(DB_NAME)->select_rows($q);

		# Pass profile details to the view
		$this->template->content->state_timespans = $state_timespans;

		# Render template
		echo $this->template;

		//$duration = $timespan['end_date'] - $timespan['start_date']

	}

		public function chinese() {

		# Set up view
		$this->template->content = View::instance('v_timelines_index');
		$this->template->title = "Hello World";

		# Construct timeline
    	$q = "SELECT *
			FROM states WHERE timeline = 'Chinese'";
			//.$this->user->user_id;

		$state_timespans = DB::instance(DB_NAME)->select_rows($q);

		# Pass profile details to the view
		$this->template->content->state_timespans = $state_timespans;

		# Render template
		echo $this->template;

		//$duration = $timespan['end_date'] - $timespan['start_date']

	}

}