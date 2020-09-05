<?php 
	
	
	    $host = '127.0.0.1';
		$db   = 'nordech_challenge';
		$user = 'root';
		$pass = 'Gherve2016';
		$port = "3306";
		
		$connexionString = "mysql:host=$host;dbname=$db;port=$port";
		
		$options = [
		\PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
		\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
		\PDO::ATTR_EMULATE_PREPARES   => false,
		];
	
class University
{
	   
    public function __construct()
    {
		 global $host, $db, $user, $pass, $port, $connexionString, $options;
		 	
        $this->$pdo = new \PDO($connexionString, $user, $pass, $options);
        
    }
    
    public function addUniversity($country, $name, $domain){
	    
           $country = addslashes($country);
           $name = addslashes($name);
           $domain =addslashes($domain);
	    
	    	   
	    $sql = "INSERT INTO universities (`uni_country`, `uni_name`, `uni_domain`)"
	         ." VALUES(:country, :name, :domain)";
	         
	    $stmt = $this->$pdo->prepare($sql)->execute([$country, $name, $domain]);     

        
    }    
    
}


    function listOfUniversities()
    {
	    global $host, $db, $user, $pass, $port, $connexionString, $options;
	    $pdo = new \PDO($connexionString, $user, $pass, $options);
	    
	    
        $sql = 'SELECT * FROM universities';
        $resultArray = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
                
        return $resultArray;        
        
    }

?>