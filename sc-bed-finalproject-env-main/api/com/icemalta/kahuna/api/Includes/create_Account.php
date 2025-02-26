<?php


class User_Account{

//db stuff
private $conn;
private $table = "Account";

private $alias = "u";

//Adding Properties
private static $db;


private int $AccountID;
private $account_Name;
private $account_Surname;
private $nationality;
private int $house;
private $street;
private $locality;
private int $country_Number;
private int $Mobile_Number;
private $email ;
private $password;

//constructor with db connection
// a function that is triggered automatically when an instance of the class is created

public function __construct($db){
    $this->conn = $db;
    }
    
        //Read all Account Records
        public function read(){
            $query = "SELECT *
            FROM {$this->table} p
            ORDER BY p.AccountID ASC;";
        
            $stmt = $this->conn->prepare($query);
        
            $stmt->execute();
        
            return $stmt;
        
        
        }
    

    
    //Create an Account
    public function createAccount(){
        $query = "INSERT * INTO {$this->table}
        LIMIT 1;";
    
        $stmt = $this->conn->prepare ($query);
        $stmt->bindParam(1, $this->AccountID);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if($row > 0){
            $this->account_Name = $row["account_Name"];
            $this->account_Surname = $row["account_Surname"];
            $this->AccountID = $row["AccountID"];
            $this->email = $row["email"];
            $this->nationality = $row["nationality"];
            $this->house_Number = $row["house_Number"];
            $this->street = $row["street"];
            $this->locality = $row["locality"];
            $this->country_Number = $row["country_Number"];
            $this->mobile_Number = $row["mobile_Number"];

    
            
        }
        return $stmt;
    }
    }
    
    ?>








?>