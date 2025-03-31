<?php


class Admin{

//db stuff
private $conn;
private $table = "Product";

private $alias = "u";

//Adding Properties
private static $db;


public int $serial_Number;
public $product_Name;
public $warranty;
public $price;
public $product_Image_ID;

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
    public function add_Product(){
        $query = "INSERT INTO {$this->table}
        (serial_Number, product_Name, warranty, price, product_Image_ID)
        VALUES (:serial_Number, :product_Name, :warranty, :price, :product_Image_ID);";
    
        $stmt = $this->conn->prepare($query);
    
        //clean data sent by user for security
        $this->product_Name = htmlspecialchars(strip_tags($this->product_Name));
        $this->warranty = htmlspecialchars(strip_tags($this->warranty));
        $this->price = htmlspecialchars(strip_tags($this->price));
        
        $stmt->bindParam(":serial_Number", $this->serial_Number);
        $stmt->bindParam(":product_Name", $this->product_Name);
        $stmt->bindParam(":warranty", $this->warranty);
        $stmt->bindParam(":price", $this->price);
        $stmt->bindParam(":product_Image_ID", $this->product_Image_ID);
    
        if($stmt->execute()){
            return true;
        }
    
        printf("Error %s. /n", $stmt->error);
        return false;
    
      }
    }
    
    ?>