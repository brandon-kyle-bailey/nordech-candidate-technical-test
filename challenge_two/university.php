<?php 
	
	
class University
{
    protected $connection = null;

    public function __construct()
    {
        $this->connection = new PDO("mysql:host=127.0.0.1;dbname=nordech_challenge", "root", "Gherve2016");
    }
    
    public function addUniversity($country, $name, $domain){
    $query = "INSERT INTO `universities` (`uni_country`, `uni_name`, `uni_domain`)"
         ."VALUES ($country, $name, $domain)";
         
    $stmt = $pdo->prepare($query);
    $stmt->execute([$setValue, $searchValue]);
    return $stmt->rowCount();	    
    }
 
    public function getUniversity()
    {
        $sql = 'SELECT * FROM universities';
        $result = $this->connection->query($sql);
        $row = $result->fetch(PDO::FETCH_ASSOC);
        
        $resultArray = array();
       
        foreach($row as $column => $value) {
            $this->$column = $value;
        }
    }
}
?>