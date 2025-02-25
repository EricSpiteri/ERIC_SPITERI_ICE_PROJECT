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
private int $purchase_Date;

//constructor with db connection
// a function that is triggered automatically when an instance of the class is created

public function __construct($db){
    $this->conn = $db;
    }
    
    
    //Read all Customer Records
     public function read(){
        $query = "SELECT *
        FROM {$this->table} p
        ORDER BY p.customerID ASC;";
    
        $stmt = $this->conn->prepare($query);
    
        $stmt->execute();
    
        return $stmt;
    
    
    }
    
    //Register a single Product
    public function readSingleProduct(){
        $query = "INSERT * INTO {$this->table}
        LIMIT 1;";
    
        $stmt = $this->conn->prepare ($query);
        $stmt->bindParam(1, $this->customerID);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if($row > 0){
            $this->customerID = $row["customerID"];
            $this->purchase_Date = $row["purchase_Date"];
            $this->customer_Name = $row["customer_Name"];
            $this->customer_Surname = $row["customer_Surname"];
            $this->customer_Email = $row["customer_Email"];
            

    
            
        }
        return $stmt;
    }
    }
    
    ?>