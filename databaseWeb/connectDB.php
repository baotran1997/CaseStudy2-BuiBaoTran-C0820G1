<?php

class connectDB {

       private const SERVERNAME = "127.0.0.1";
       private const  USERNAME = "root";
       private const PASSWORD = "0935332882";
       private const DBNAME = "casestudy2";
       protected $conn = null;
        

       public function __construct()
       {
          // Create connection
        $this->conn = mysqli_connect( self::SERVERNAME, self::USERNAME, self::PASSWORD, self::DBNAME );
        
        // Check connection
        if (!$this->conn) {
          die("Connection failed: " . mysqli_connect_error());
        }
        echo "";
       }
      

     } 
    
    //  $connect = new connectDB();
?>