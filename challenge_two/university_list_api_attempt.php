<?php 
	// all of API pre-requisites
	require '../vendor/autoload.php';
	use GuzzleHttp\Client;
    include_once 'university.php';
	
	$client = new Client();
	
	
	// USA Universities
	$response = $client->request(
		'GET',
		'http://universities.hipolabs.com/search?country=United States'
	);
	
	sdfsdfs
	$json = json_decode($response->getBody()->getContents());
	
	//var_dump($json[0]->name);
	
	for($i=0; i< count($json); $i++){
		echo $json[i]->domains ."<br>";
	}

/*
	$university = new University();
	$university->addUniversity(); // addUniversity($country, $name, $domain);
*/
	
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Challenge Two - UNIVERSITY </title>
    <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
  <h2> University List </h2>
  <script type="text/javascript" src="index.js"></script>
</body>
</html>