<?php


class Registration{

//db stuff
private $conn;
private $table = "Registration";
private $alias = "u";

//Adding Properties
public $db;


public $product_Name;
public $purchase_Date;

public $serial_Number;

//constructor with db connection
// a function that is triggered automatically when an instance of the class is created

public function __construct($db){
    $this->conn = $db;
    }
    
    
    //Read all Registration Records
     public function read_Registration(){
        $query = "SELECT *
        FROM {$this->table} p
        ORDER BY p.registrationID ASC;";
    
        $stmt = $this->conn->prepare($query);
    
        $stmt->execute();
    
        return $stmt;
    
    
    }
    
    public function createRegistration(){
        $query = "INSERT INTO {$this->table}
        (serial_Number, product_Name , purchase_Date)
        VALUES (:serial_Number :product_Name, :purchase_Date);";
    
        $stmt = $this->conn->prepare($query);
    
    
    
        //Binding parameters
        $stmt->bindParam(":product_Name", $this->product_Name);
        $stmt->bindParam(":purchase_Date", $this->purchase_Date);
        $stmt->bindParam(":serial_Number", $this->serial_Number);
    
        if($stmt->execute()){
            return true;
        }
    
        printf("Error %s. /n", $stmt->error);
        return false;
    
      }
    }
    ?>