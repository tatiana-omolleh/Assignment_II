<?php
class dbConn {
    private $connection;
    
    // Define the database connection variables here
    private $db_host = 'localhost';
    private $db_name = 'info';
    private $db_user = 'root';
    private $db_pass = '';
    private $db_port = '3306';

    public function __construct() {
        $this->connection();
    }

    private function connection() {
        $dsn = "mysql:host=$this->db_host;port=$this->db_port;dbname=$this->db_name";
        
        try {
            $this->connection = new PDO($dsn, $this->db_user, $this->db_pass);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function insert($table, $data){
        ksort($data);
        $fieldNames = implode('`, `', array_keys($data));
        $fieldPlaceholders = ':' . implode(', :', array_keys($data));
        
        $sql = "INSERT INTO $table (`$fieldNames`) VALUES ($fieldPlaceholders)";
        $stmt = $this->connection->prepare($sql);
    
        // Bind values to placeholders
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
    
        try {
            $stmt->execute();
            return true; // Insertion was successful
        } catch (PDOException $e) {
            return false; // Insertion failed
        }
    }
    
    public function select($sql, $param = array()) {
        try {
            $stmt = $this->connection->prepare($sql);
            $stmt->execute($param);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }
    
}
