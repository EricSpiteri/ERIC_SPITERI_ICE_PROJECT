CREATE DATABASE Kahuna;

USE Kahuna;




CREATE TABLE Account
(
  AccountID       INT (11)     NULL     AUTO_INCREMENT,
  account_Name    VARCHAR (255) NOT NULL,
  account_Surname VARCHAR (255) NOT NULL,
  account_Email   VARCHAR (255) NOT NULL,
  password        VARCHAR (255) NOT NULL,
  country         VARCHAR (255) NOT NULL,
  house_Number    VARCHAR (255) NOT NULL,
  street          VARCHAR (255) NOT NULL,
  locality        VARCHAR (255) NOT NULL,
  country_Code    INT     (11) NOT NULL,
  postcode        VARCHAR (255) NOT NULL,
  mobile_Number   INT (11)    NOT NULL,
  PRIMARY KEY (AccountID)
) COMMENT 'Each account registered into the system';

CREATE TABLE Admin_Account
(
  admin_Account_ID      INT (11)     NULL     AUTO_INCREMENT,
  admin_Account_Name    VARCHAR (255) NOT NULL,
  admin_Account_Surname VARCHAR (255) NOT NULL,
  admin_Account_Email   VARCHAR (255) NOT NULL,
  admin_Account_Password VARCHAR (255) NOT NULL,
  PRIMARY KEY (admin_Account_ID)
) COMMENT 'An Account exclusively for Administrators';

CREATE TABLE Customer
(
  customerID    INT (11)     NULL     AUTO_INCREMENT,
  AccountID     INT (11)    NULL,
  serial_Number VARCHAR (255) NOT NULL,
  PRIMARY KEY (customerID)
) COMMENT 'The individual person the service is provided to';

CREATE TABLE Product
(
  serial_Number    VARCHAR (255) NOT NULL,
  product_Name     VARCHAR (255) NOT NULL,
  warranty         INT (11)     NOT NULL,
  price            INT (11)    NOT NULL,
  product_Image_ID VARCHAR (255) NOT NULL,
  admin_Account_ID INT (11)     NULL,
  PRIMARY KEY (serial_Number)
) COMMENT 'Each Individual Appliance and all of its attributes';

ALTER TABLE Product
  ADD CONSTRAINT FK_Admin_Account_TO_Product
    FOREIGN KEY (admin_Account_ID)
    REFERENCES Admin_Account (admin_Account_ID);

ALTER TABLE Customer
  ADD CONSTRAINT FK_Account_TO_Customer
    FOREIGN KEY (AccountID)
    REFERENCES Account (AccountID);

ALTER TABLE Customer
  ADD CONSTRAINT FK_Product_TO_Customer
    FOREIGN KEY (serial_Number)
    REFERENCES Product (serial_Number);




/*Inserting New Administrator Account*/
INSERT INTO Admin_Account (admin_Account_ID, admin_Account_Name, admin_Account_Surname, admin_Account_Email, admin_Account_Password )
VALUES('90865', 'Eric', 'Spiteri', 'ericspiteri1410@gmail.com', 'libra1404');

/*Inserting New User Account*/
INSERT INTO Account (account_Name, account_Surname, account_Email, password, country, house_Number, street, postcode, locality, country_Code, mobile_Number)
VALUES 
('John', 'Doe', 'john.doe@example.com', 'ABC123', 'Maltese', 12, 'Main Street', 'TRM 1404', 'Valletta', '356', '12345678');

/*Inserting Product DATA*/
INSERT INTO Product (serial_Number, product_Name, warranty, price, product_Image_ID)
VALUES ('KHWM8199911', 'CombiSpin Washing Machine', 2 , 600, 'WashingMachine.jpg');

/*Inserting New Customer Account*/
INSERT INTO Customer (serial_Number)
VALUES 
('KHWM8199911');













INSERT INTO Product (serial_Number, product_Name, warranty, price, product_Image_ID, admin_Account_ID)

VALUES
('KHWM8199912', 'CombiSpin + Dry Washing Machine', 2, 750, 'CombiSpinDryWashingMachine.jpg', 90865),
('KHMW789991', 'CombiGrill Microwave', 1, 150, 'CombiGrillMicrowave.jpg', 90865),
('KHWP890001', 'K5 Water Pump', 5, 300, 'K5WaterPump.jpg', 90865),
('KHWP890002', 'K5 Heated Water Pump', 5, 350, 'K5HeatedWaterPump.jpg', 90865),
('KHSS988881', 'Smart Switch Lite', 2, 50, 'SmartSwitchLite.jpg', 90865),
('KHSS988882', 'Smart Switch Pro', 2, 80, 'SmartSwitchPro.jpg', 90865),
('KHSS988883', 'Smart Switch Pro V2', 2, 100, 'SmartSwitchProV2.jpg', 90865),
('KHHM89762', 'Smart Heated Mug', 1, 25, 'SmartHeatedMug.jpg', 90865),
('KHSB0001', 'Smart Bulb 001', 1, 15, 'SmartBulb001.jpg', 90865);




