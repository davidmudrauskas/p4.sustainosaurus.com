<?php

class wikipedia_descriptions_controller extends base_controller {
	
	/*-------------------------------------------------------------------------------------------------

	-------------------------------------------------------------------------------------------------*/
	public function __construct() {
		parent::__construct();
	} 

	public function index() {

		# Capture ID from AJAX
		$css_id = $_POST['state_identifier'];
		//$css_id = "Zhou_Dynasty";
		//echo $css_id;

		# Get additional details for state ID from DB
		$q = "SELECT * 
			FROM sustaino_p4_sustainosaurus_com.states WHERE css_id ='".$css_id."'";

		//echo $q;

		$results = DB::instance(DB_NAME)->select_rows($q);

		$description_location = $results['0']['description_location'];
		$state = $results['0']['state'];

		//echo $description_location;
		//echo $state;

		# Make API call
		$url = "http://en.wikipedia.org/w/api.php?action=parse&page=".$state."&format=json&prop=text&section=0";
		$ch = curl_init($url);

		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt ($ch, CURLOPT_USERAGENT, "TestScript"); // required by wikipedia.org server; use YOUR user agent with YOUR contact information. (otherwise your IP might get blocked)
		$c = curl_exec($ch);

		# Decode and parse HTML content
		$json = json_decode($c);
		$content = $json->{'parse'}->{'text'}->{'*'}; // get the main text content of the query (it's parsed HTML)

		# Isolate first paragraph for display
		$pattern = '#<p>(.*)</p>#Us'; // http://www.phpbuilder.com/board/showthread.php?t=10352690
		if (preg_match_all($pattern, $content, $matches)) {
			print strip_tags($matches[0][$description_location]); // Content of the first paragraph without the HTML tags.
		}

	}

}