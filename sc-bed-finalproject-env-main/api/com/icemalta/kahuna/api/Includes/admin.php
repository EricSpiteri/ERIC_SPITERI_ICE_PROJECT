<?php


class Admin{

//db stuff
private $conn;
private $table = "Product";

private $alias = "u";

//Adding Properties
private static $db;


private int $serial_Number;
private $product_Name;
private $warranty;
private $price;
private int $product_Image_Id;

//constructor with db connection
// a function that is triggered automatically when an instance of the class is created

public function __construct($db){
    $this->conn = $db;
    }
    
    
    //Read all Customer Records
     public function read(){
        $query = "SELECT *
        FROM {$this->table} p
        ORDER BY p.serial_Number ASC;";
    
        $stmt = $this->conn->prepare($query);
    
        $stmt->execute();
    
        return $stmt;
    
    
    }
    
    //Add a Product (ADMIN ONLY)
    public function readSingleCustomer(){
        $query = "INSERT * INTO {$this->table}
        LIMIT 1;";
    
        $stmt = $this->conn->prepare ($query);
        $stmt->bindParam(1, $this->serial_Number);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if($row > 0){
            $this->serial_Number = $row["serial_Number"];
            $this->product_Name = $row["product_Name"];
            $this->warranty = $row["warranty"];
            $this->price = $row["price"];
            $this->product_Image_ID = $row["product_Image_ID"];
            

    
            
        }
        return $stmt;
    }
    }
    
    ?>