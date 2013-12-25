<?php

class wikipedia_descriptions_controller extends base_controller {
	
	/*-------------------------------------------------------------------------------------------------

	-------------------------------------------------------------------------------------------------*/
	public function __construct() {
		parent::__construct();
	} 

	public function index() {

		$css_id = $_POST['state_identifier'];
		//$css_id = "Zhou_Dynasty";
		//echo $css_id;

		# Set up view
		//$this->template->content = View::instance('v_timelines_index');
		//$this->template->title = "Tracing the Past -- ".ucfirst($timeline_option);

		# Construct timeline
    	$q = "SELECT * 
    		FROM sustaino_p4_sustainosaurus_com.states WHERE css_id ='".$css_id."'";

    	//echo $q;

		$results = DB::instance(DB_NAME)->select_rows($q);

		$description_location = $results['0']['description_location'];
		$state = $results['0']['state'];

		//echo $description_location;
		//echo $state;

		# Pass variables to the view
		//$this->template->content->state_timespans = $state_timespans;
		//$this->template->content->timeline_option = $timeline_option;

		# Render template
		//echo $this->template;

		$url = "http://en.wikipedia.org/w/api.php?action=parse&page=".$state."&format=json&prop=text&section=0";
		$ch = curl_init($url);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt ($ch, CURLOPT_USERAGENT, "TestScript"); // required by wikipedia.org server; use YOUR user agent with YOUR contact information. (otherwise your IP might get blocked)
		$c = curl_exec($ch);

		$json = json_decode($c);

		$content = $json->{'parse'}->{'text'}->{'*'}; // get the main text content of the query (it's parsed HTML)

		// pattern for first match of a paragraph
		$pattern = '#<p>(.*)</p>#Us'; // http://www.phpbuilder.com/board/showthread.php?t=10352690
		if(preg_match_all($pattern, $content, $matches))
		{
		    print strip_tags($matches[0][$description_location]); // Content of the first paragraph without the HTML tags.
		}

	}

}



// $css_id = $_POST['state_identifier'];

// //echo $css_id;

// $mysqli = new mysqli("127.0.0.1", "sustaino_p4", "RM-WWe@uQO$U", "sustaino_p4_sustainosaurus_com", 3306);
// if ($mysqli->connect_errno) {
//     echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
// }

// //echo $mysqli->host_info . "\n";

// $result = $mysqli->query("SELECT * FROM sustaino_p4_sustainosaurus_com.states WHERE css_id ='".$css_id."'");
// if ($result == FALSE) {
//     echo "Uh oh something went wrong";
// }

// $row = $result->fetch_array();
// //print_r($row);

// $description_location = $row['description_location'];
// $state = $row['state'];

// //echo $description_location;
// //echo $state;

// $url = "http://en.wikipedia.org/w/api.php?action=parse&page=".$state."&format=json&prop=text&section=0";
// $ch = curl_init($url);
// curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
// curl_setopt ($ch, CURLOPT_USERAGENT, "TestScript"); // required by wikipedia.org server; use YOUR user agent with YOUR contact information. (otherwise your IP might get blocked)
// $c = curl_exec($ch);

// $json = json_decode($c);

// $content = $json->{'parse'}->{'text'}->{'*'}; // get the main text content of the query (it's parsed HTML)

// // pattern for first match of a paragraph
// $pattern = '#<p>(.*)</p>#Us'; // http://www.phpbuilder.com/board/showthread.php?t=10352690
// if(preg_match_all($pattern, $content, $matches))
// {
//     print strip_tags($matches[0][$description_location]); // Content of the first paragraph without the HTML tags.
//}