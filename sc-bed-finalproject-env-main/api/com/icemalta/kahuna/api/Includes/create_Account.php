<?php
class User_Account{

//db stuff
private $conn;
private $table = "Account";

private $alias = "u";

//Adding Properties
private static $db;


private $accountID;
private $account_Name;
private $account_Surname;
private $country;
private $house_Number;
private $street;
private $locality;
private $country_Code;
private $mobile_Number;
private $account_Email;
private $password;
private $postcode;

//constructor with db connection
// a function that is triggered automatically when an instance of the class is created

public function __construct($db){
    $this->conn = $db;
    }
    
        //Read all Account Records
        public function rowCount(){
            $query = "SELECT *
            FROM {$this->table} p
            ORDER BY p.accountID ASC;";
            
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->accountID);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt->execute();
            

            if($row > 0){
                $this->accountID = $row["accountID"];
                $this->account_Name = $row["account_Name"];
                $this->account_Surname = $row["account_Surname"];
                $this->country = $row["country"];
                $this->house_Number = $row["house_Number"];
                $this->street = $row["street"];
                $this->locality = $row["locality"];
                $this->country_Code = $row["country_Code"];
                $this->mobile_Number = $row["mobile_Number"];
                $this->account_Email = $row["account_Email"];
                $this->password = $row["password"];
                $this->postcode = $row["postcode"];

        
                
            }
            return $stmt;
        }
        
    

    
//Create New Account

public function createAccount(){
    $query = "INSERT INTO {$this->table}
    (account_Name, account_Surname, password, accountID, country_Code, mobile_Number, account_Email, postcode, house_Number, street, locality, country)
    VALUES (:account_Name, :account_Surname, :password, :accountID, :country_code, :mobile_Number, :account_Email, :postcode, :house_Number, :street, :locality, :country);";

    $stmt = $this->conn->prepare($query);

    //clean data sent by user for security
    $this->account_Name = htmlspecialchars(strip_tags($this->account_Name));
    $this->account_Surname = htmlspecialchars(strip_tags($this->account_Surname));
    
    //Hashing password for security
    $this->password = password_hash($this->password, PASSWORD_DEFAULT);

    $this->accountID = htmlspecialchars(strip_tags($this->accountID));
    $this->country_Code = htmlspecialchars(strip_tags($this->country_Code));
    $this->mobile_Number = htmlspecialchars(strip_tags($this->mobile_Number));
    $this->account_Email = htmlspecialchars(strip_tags($this->account_Email));
    $this->postcode = htmlspecialchars(strip_tags($this->postcode));
    $this->house_Number = htmlspecialchars(strip_tags($this->house_Number));
    $this->street = htmlspecialchars(strip_tags($this->street));
    $this->locality = htmlspecialchars(strip_tags($this->locality));
    $this->country = htmlspecialchars(strip_tags($this->country));

    $stmt->bindParam(":account_Name", $this->account_Name);
    $stmt->bindParam(":account_Surname", $this->account_Surname);
    $stmt->bindParam(":password", $this->password);
    $stmt->bindParam(":accountID", $this->accountID);
    $stmt->bindParam(":country_Code", $this->country_Code);
    $stmt->bindParam(":mobile_Number", $this->mobile_Number);
    $stmt->bindParam(":account_Email", $this->account_Email);
    $stmt->bindParam(":postcode", $this->postcode);
    $stmt->bindParam(":house_Number", $this->house_Number);
    $stmt->bindParam(":street", $this->street);
    $stmt->bindParam(":locality", $this->locality);
    $stmt->bindParam(":country", $this->country);

    if($stmt->execute()){
        return true;
    }

    printf("Error %s. /n", $stmt->error);
    return false;

  }
}
?>