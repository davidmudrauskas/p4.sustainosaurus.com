<?php
// Call Wikipedia API to get info about state
$url = 'http://en.wikipedia.org/w/api.php?action=parse&page=Turkic_Khaganate&format=json&prop=text&section=0';
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
    print strip_tags($matches[0][1]); // Content of the first paragraph without the HTML tags.
}