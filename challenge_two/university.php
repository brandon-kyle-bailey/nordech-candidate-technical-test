<?php 
	

// Ideally the connection is handled elsewhere in the code. Using it here for brevity sake. 	
try {
    $pdo = new PDO("mysql:host=127.0.0.1;dbname=nordech_challenge", "root", "Gherve2016", [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                        PDO::ATTR_EMULATE_PREPARES => false,
                        ]
                    );
} catch(\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
};
	
	
	class University
{
    protected $connection = null;

    public function __construct()
    {
        $this->connection = $pdo;
    }

    public function getUniversity($id)
    {
        $sql = 'SELECT * FROM universities';
        $result = $this->connection->query($sql);
        $row = $result->fetch(PDO::FETCH_ASSOC);

        foreach($row as $column => $value) {
            $this->$column = $value;
        }
    }
}
?>