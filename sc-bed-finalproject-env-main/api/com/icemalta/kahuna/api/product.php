<?php

class Product{
//db stuff
private $conn;
private $table = "Product";

private $alias = "u";

//table properties
private $serial_Number;
private $product_Name;
private $price;
private $warranty;
private $purchase_Date;


//constructor with db connection
// a function that is triggered automatically when an instance of the class is created
public function __construct($db){
$this->conn = $db;
}


//Read all User Records
 public function read(){
    $query = "SELECT *
    FROM {$this->table} p
    ORDER BY p.serial_Number ASC;";

    $stmt = $this->conn->prepare($query);

    $stmt->execute();

    return $stmt;


}

//Display a single Product
public function readSingleProduct(){
    $query = "SELECT * FROM {$this->table} {$this->alias}
    WHERE {$this->alias}.serial_Number = ?
    LIMIT 1;";

    $stmt = $this->conn->prepare ($query);
    $stmt->bindParam(1, $this->serial_Number);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if($row > 0){
        $this->product_Name = $row["product_Name"];
        $this->serial_Number = $row["serial_Number"];
        $this->price = $row["price"];
        $this->warranty = $row["warranty"];
        $this->purchase_Date = $row["purchase_Date"];

        
    }
    return $stmt;
}
}

?>