<?php


class Customer{

//db stuff
private $conn;
private $table = "Customer";

private $alias = "u";

//Adding Properties
private static $db;


private int $customerID;
private $customer_Name;
private $customer_Surname;
private $email;
private int $registration_Date;

//constructor with db connection
// a function that is triggered automatically when an instance of the class is created

public function __construct($db){
    $this->conn = $db;
    }
    
    
    //Read all User Records
     public function read(){
        $query = "SELECT *
        FROM {$this->table} p
        ORDER BY p.customerID ASC;";
    
        $stmt = $this->conn->prepare($query);
    
        $stmt->execute();
    
        return $stmt;
    
    
    }
    
    //Display a single Customer
    public function readSingleAccount(){
        $query = "SELECT * FROM {$this->table} {$this->alias}
        WHERE {$this->alias}.customerID = ?
        LIMIT 1;";
    
        $stmt = $this->conn->prepare ($query);
        $stmt->bindParam(1, $this->customerID);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if($row > 0){
            $this->customer_Name = $row["customer_Name"];
            $this->customer_Surname = $row["customer_Surname"];
            $this->customerID = $row["customerID"];
            $this->email = $row["email"];
            $this->mobile_Number = $row["mobile_Number"];

    
            
        }
        return $stmt;
    }
    }
    
    ?>