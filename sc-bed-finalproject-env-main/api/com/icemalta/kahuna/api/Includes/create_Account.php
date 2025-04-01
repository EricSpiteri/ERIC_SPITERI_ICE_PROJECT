<?php
class User_Account{

//db stuff
private $conn;
private $table = "Account";

private $alias = "u";

//Adding Properties
public $db;


public $accountID;
public $account_Name;
public $account_Surname;
public $country;
public $house_Number;
public $street;
public $locality;
public $country_Code;
public $mobile_Number;
public $account_Email;
public $password;
public $postcode;

//constructor with db connection
// a function that is triggered automatically when an instance of the class is created

public function __construct($db){
    $this->conn = $db;
    }
    

// Read all User records
public function read_Account(){
    $query = "SELECT *
                FROM {$this->table} {$this->alias}
                ORDER BY {$this->alias}.AccountID ASC;";

    $stmt = $this->conn->prepare($query);

    $stmt->execute();

    return $stmt;
}
    
//Create New Account

public function createAccount(){
    $query = "INSERT INTO {$this->table}
    (account_Name, account_Surname, password, country_Code, mobile_Number, account_Email, postcode, house_Number, street, locality, country)
    VALUES (:account_Name, :account_Surname, :password, :country_Code, :mobile_Number, :account_Email, :postcode, :house_Number, :street, :locality, :country);";

    $stmt = $this->conn->prepare($query);

    //clean data sent by user for security
    $this->account_Name = htmlspecialchars(strip_tags($this->account_Name));
    $this->account_Surname = htmlspecialchars(strip_tags($this->account_Surname));
    $this->password = htmlspecialchars(strip_tags($this->password));
    $this->postcode = htmlspecialchars(strip_tags($this->postcode));
    $this->street = htmlspecialchars(strip_tags($this->street));
    $this->locality = htmlspecialchars(strip_tags($this->locality));
    $this->country = htmlspecialchars(strip_tags($this->country));
    $this->account_Email = htmlspecialchars(strip_tags($this->account_Email));
    $this->house_Number = htmlspecialchars(strip_tags($this->house_Number));


    //Hashing password for security
    $this->password = password_hash($this->password, PASSWORD_BCRYPT);

    $this->country_Code = intval( filter_var($this->country_Code, FILTER_VALIDATE_INT));
    $this->mobile_Number = intval(filter_var($this->mobile_Number, FILTER_VALIDATE_INT));



    //Binding parameters
    $stmt->bindParam(":account_Name", $this->account_Name);
    $stmt->bindParam(":account_Surname", $this->account_Surname);
    $stmt->bindParam(":password", $this->password);
    $stmt->bindParam(":account_Email", $this->account_Email);
    $stmt->bindParam(":street", $this->street);
    $stmt->bindParam(":locality", $this->locality);
    $stmt->bindParam(":country", $this->country);
    $stmt->bindParam(":postcode", $this->postcode);
    $stmt->bindParam(":country_Code", $this->country_Code); 
    $stmt->bindParam(":mobile_Number", $this->mobile_Number); 
    $stmt->bindParam(":house_Number", $this->house_Number); 

    if($stmt->execute()){
        return true;
    }

    printf("Error %s. /n", $stmt->error);
    return false;

  }
}

class Admin_Account{

    //db stuff
    private $conn;
    private $table = "Admin_Account";
    
    private $alias = "u";
    
    //Adding Properties
    public $db;
    
    
    public $admin_AccountID;
    public $admin_Account_Name;
    public $admin_Account_Surname;
    public $admin_Account_Password;
    public $admin_Account_Email;

    
    //constructor with db connection
    // a function that is triggered automatically when an instance of the class is created
    
    public function __construct($db){
        $this->conn = $db;
        }
        
    
    // Read all Admin Account records
    public function read_Admin_Account(){
        $query = "SELECT *
                    FROM {$this->table} {$this->alias}
                    ORDER BY {$this->alias}.admin_Account_ID ASC;";
    
        $stmt = $this->conn->prepare($query);
    
        $stmt->execute();
    
        return $stmt;
    }
        
    //Create New  Admin Account
    
    public function create_Admin_Account(){
        $query = "INSERT INTO {$this->table}
        (admin_Account_Name, admin_Account_Surname, admin_Account_Password, admin_Account_Email)
        VALUES (:admin_Account_Name, :admin_Account_Surname, :admin_Account_Password, :admin_Account_Email);";
    
        $stmt = $this->conn->prepare($query);
    
        //clean data sent by user for security
        $this->admin_Account_Name = htmlspecialchars(strip_tags($this->admin_Account_Name));
        $this->admin_Account_Surname = htmlspecialchars(strip_tags($this->admin_Account_Surname));
        $this->admin_Account_Password = htmlspecialchars(strip_tags($this->admin_Account_Password));
        $this->admin_ccount_Email = htmlspecialchars(strip_tags($this->admin_Account_Email));
    
    
        //Hashing password for security
        $this->admin_Account_Password = password_hash($this->admin_Account_Password, PASSWORD_BCRYPT);
    
    
    
        //Binding parameters
        $stmt->bindParam(":admin_Account_Name", $this->admin_Account_Name);
        $stmt->bindParam(":admin_Account_Surname", $this->admin_Account_Surname);
        $stmt->bindParam(":admin_Account_Password", $this->admin_Account_Password);
        $stmt->bindParam(":admin_Account_Email", $this->admin_Account_Email);
    
        if($stmt->execute()){
            return true;
        }
    
        printf("Error %s. /n", $stmt->error);
        return false;
    
      }
    }
?>