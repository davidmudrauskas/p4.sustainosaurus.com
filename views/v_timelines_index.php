<h1>json response</h1>

<?php

//Get JSON response from wikipedia
$json_response = file_get_contents('http://en.wikipedia.org/w/api.php?format=json&action=query&titles=Template:History_of_the_Turkic_peoples_pre-14th_century&prop=revisions&rvprop=content');
$decoded_response = json_decode($json_response, true);

//Display to page for identifying interesting elements to isolate
echo '<pre>';
print_r($decoded_response);
echo '</pre>';

?>

<h1>article content</h1>

<?php

//Hardcode path to dynamic identifier for interesting array
$pages_array = $decoded_response['query']['pages'];
$page_id = key($pages_array);

//Isolate and display content for further manipulation
echo $decoded_response['query']['pages'][$page_id]['revisions']['0']['*'];

?>

</br>
</br>