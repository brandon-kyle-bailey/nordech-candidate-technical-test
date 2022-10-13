<?php 
    include_once 'university.php';
    
    // returns php array of universities
    function getCountryUniversitiesFromApi(string $countryName){
	    $apiUrl = 'http://universities.hipolabs.com/search?country='. urlencode($countryName);
	    $universityJsonFormat = file_get_contents($apiUrl);
	    $universityPhpArray = json_decode($universityJsonFormat, true);
	    return $universityPhpArray;
    }
    
    // sends each elt of uni array to DB
    function writeUniversitiesToDb($universityArray){
		
		$universityObj = new University();
		      
		for($uni=0; $uni<count($universityArray); $uni++){		
			$ctry = $universityArray[$uni]['country'];
			$name = $universityArray[$uni]['name'];
			$domain = $universityArray[$uni]['web_pages'][0];
			
			try{
				$universityObj->addUniversity($ctry, $name, $domain);
			} catch(Error $e){
				echo "This error happened: ".$e->getMessage();
			}
			
		} //for		
	}
    
	
	function trySendingUniversitiesToDatabase(){
		
	    $canadaUniversities = getCountryUniversitiesFromApi('canada');
	    $unitedStatesUniversities = getCountryUniversitiesFromApi('united states');		
		
		if(count($canadaUniversities)>0){
			writeUniversitiesToDb($canadaUniversities);
		} else {echo "No universities in Canada i am afraid";}	
		
		
		if(count($unitedStatesUniversities)>0){
			writeUniversitiesToDb($unitedStatesUniversities);
		} else {echo "No universities in the US i am afraid";}				
	}
	
	function getUniversityList(){
		$universityArray = listOfUniversities();
		return $universityArray;
	}
	
	// Uncomment the following line to send universities to DB. 
	  // trySendingUniversitiesToDatabase();
	
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Challenge Two - UNIVERSITY </title>
    <link rel="stylesheet" type="text/css" href="index.css">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    
 <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>   
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	
	<script src="http://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	<link href="http://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet" />
	
</head>

<body>
  <p> University List </p>
  <table id="myTable" class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">COUNTRY</th>
      <th scope="col">UNIVERSITY NAME</th>
      <th scope="col">UNIVERSITY DOMAIN</th>
    </tr>
  </thead>
  <tbody>
	 <?php 
		 $Canada_US_universities = getUniversityList();
		 $numberOfUniversities = count($Canada_US_universities);
		 
		 if($numberOfUniversities > 0){
			 for($i=0; $i<$numberOfUniversities; $i++){
					echo '	 
				    <tr>
				      <th scope="row">'.$i.'</th>
				      <td>'.$Canada_US_universities[$i]["uni_country"].'</td>
				      <td>'.$Canada_US_universities[$i]["uni_name"].'</td>
				      <td>'.$Canada_US_universities[$i]["uni_domain"].'</td>
				    </tr>';				 
		       }
			 
		 }		 
	 ?>

  </tbody>
</table>

<script type="text/javascript">
	$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
</body>
</html>