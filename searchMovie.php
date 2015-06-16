<?php
//	$apikey = 'fvhxbnuhymnqfn6qdpkkq7s7';
	$apikey = 'cqkqdys7rzvkwawfzn762wkn';
		
	$q = urlencode($_POST['search']); // make sure to url encode an query parameters
	$p = urlencode($_POST['page']);
	
	// construct the query with our apikey and the query we want to make
	$endpoint = 'http://api.rottentomatoes.com/api/public/v1.0/movies.json?apikey=' . $apikey . '&q=' . $q .'&page_limit=30&page=' . $p;

	// setup curl to make a call to the endpoint
	$session = curl_init($endpoint);

	// indicates that we want the response back
	curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

	// exec curl and get the data back
	$data = curl_exec($session);

	// remember to close the curl session once we are finished retrieveing the data
	curl_close($session);

	// decode the json data to make it easier to parse the php
	$search_results = json_decode($data);
	if ($search_results === NULL) die('Error parsing json');
	
	echo json_encode($search_results);

?>