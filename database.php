<?php
class Database{
    private $db_host; //database server
    private $db_user; //database login name
    private $db_pass; //database login password
    private $db_name; //database name
    private $connection;

    //constructor for database class
    public function __construct($db_host, $db_user, $db_pass, $db_name) {
        $this->db_host = $db_host;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_name = $db_name;
        $this->connection = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
    }

    //method connection, connects to the database
    public function connect() {
        if (mysqli_connect_error()) {
            return null;
            exit;
        }else{
            return $this->connection;
        }
    }

    //method checks to the errors in connection
    public function checkError(){
        if(mysqli_connect_error()){
            return mysqli_connect_error();
        }else{
            return "ok";
        }
    }
}
?>