<?php


class Product{

//db stuff
private $conn;
private $table = "Product";

private $alias = "u";

//Adding Properties
public $db;


public $product_Name;
public $serial_Number;
public $price;
public $warranty;
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
    
    public function createAccount(){
        $query = "INSERT INTO {$this->table}
        (product_Name, serial_Number , price, product_Image_ID)
        VALUES (:product_Name, :serial_Number, :price, :product_Image_ID);";
    
        $stmt = $this->conn->prepare($query);
    
        //clean data sent by user for security
        $this->product_Name = htmlspecialchars(strip_tags($this->product_Name));
        $this->serial_Number = htmlspecialchars(strip_tags($this->serial_Number));
        $this->product_Image_ID = htmlspecialchars(strip_tags($this->product_Image_ID));
        
        
        $this->price = intval( filter_var($this->price, FILTER_VALIDATE_INT));
        $this->warranty = intval( filter_var($this->warranty, FILTER_VALIDATE_INT));
    
    
    
        //Binding parameters
        $stmt->bindParam(":product_Name", $this->product_Name);
        $stmt->bindParam(":serial_Number", $this->serial_Number);
        $stmt->bindParam(":price", $this->price);
        $stmt->bindParam(":warranty", $this->warranty);
        $stmt->bindParam(":product_Image_ID", $this->product_Image_ID);
    
        if($stmt->execute()){
            return true;
        }
    
        printf("Error %s. /n", $stmt->error);
        return false;
    
      }
    }
    ?>