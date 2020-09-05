<?php 
    include_once 'university.php';

	$university = new University();
	
	$universityDataFromDB = $university->getUniversity();
	
	var_dump($university->getUniversity());
	
	
	
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Challenge Two - UNIVERSITY </title>
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>

<body>
  <p> University List </p>
  <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">COUNTRY</th>
      <th scope="col">UNIVERSITY NAME</th>
      <th scope="col">UNIVERSITY DOMAIN</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Canada</td>
      <td>McGill</td>
      <td>mcgill.ca</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>USA</td>
      <td>caltech</td>
      <td>caltech.edu</td>
    </tr>
  </tbody>
</table>
</body>
</html>