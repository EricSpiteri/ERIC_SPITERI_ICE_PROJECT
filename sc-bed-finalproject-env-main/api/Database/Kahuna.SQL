
CREATE DATABASE Kahuna;

USE Kahuna;

CREATE TABLE Admin_Account
(
  admin_Account_ID      INT (11)  NOT NULL AUTO_INCREMENT ,
  admin_Account_Name    VARCHAR (255) NOT NULL,
  admin_Account_Surname VARCHAR (255) NOT NULL,
  admin_Account_Email   VARCHAR (255) NOT NULL,
  PRIMARY KEY (admin_Account_ID)
) COMMENT 'An Account exclusively for Administrators';
CREATE TABLE Product
(
  serial_Number    VARCHAR (255) NOT NULL ,
  product_Name     VARCHAR (255) NOT NULL,
  warranty         INT  (11)   NOT NULL,
  price            INT (11)    NOT NULL,
  product_Image_ID VARCHAR (255) NOT NULL,
  admin_Account_ID INT  (11)   NOT NULL,
  PRIMARY KEY (serial_Number)
) COMMENT 'Each Individual Appliance and all of its attributes';
CREATE TABLE Customer
(
  customerID       INT (11) NOT NULL AUTO_INCREMENT ,
  customer_Name    VARCHAR (255) NOT NULL,
  customer_Surname VARCHAR (255) NOT NULL,
  customer_Email   VARCHAR (255) NOT NULL,
  purchase_Date    DATE    NOT NULL,
  serial_Number    VARCHAR (255) NOT NULL,
  PRIMARY KEY (customerID)
) COMMENT 'The individual person the service is provided to';
CREATE TABLE Account
(
  AccountID       INT (11) NOT NULL AUTO_INCREMENT,
  account_Name    VARCHAR (255) NOT NULL,
  account_Surname VARCHAR (255) NOT NULL,
  account_Email   VARCHAR (255) NOT NULL,
  nationality    VARCHAR (255) NOT NULL,
  house_number    INT  (11)   NOT NULL,
  street          VARCHAR (255) NOT NULL,
  locality        VARCHAR (255) NOT NULL,
  country         VARCHAR (255) NOT NULL,
  mobile_number   INT  (11)   NOT NULL,
  customerID      INT   (11)  NOT NULL,
  PRIMARY KEY (AccountID)
) COMMENT 'Each account registered into the system';







ALTER TABLE Account
  ADD CONSTRAINT FK_Customer_TO_Account
    FOREIGN KEY (customerID)
    REFERENCES Customer (customerID);

ALTER TABLE Customer
  ADD CONSTRAINT FK_Product_TO_Customer
    FOREIGN KEY (serial_Number)
    REFERENCES Product (serial_Number);

ALTER TABLE Product
  ADD CONSTRAINT FK_Admin_Account_TO_Product
    FOREIGN KEY (admin_Account_ID)
    REFERENCES Admin_Account (admin_Account_ID);




/*Inserting New Administrator Account*/
INSERT INTO Admin_Account (admin_Account_ID, admin_Account_Name, admin_Account_Surname, admin_Account_Email )
VALUES('90865', 'Eric', 'Spiteri', 'ericspiteri1410@gmail.com');

/*Inserting Product DATA*/
INSERT INTO Product (serial_Number, product_Name, warranty, price, product_Image_ID, admin_Account_ID)
VALUES ('KHWM8199911', 'CombiSpin Washing Machine', 2 , 600, 'WashingMachine.jpg', 90865);

/*Inserting New Customer Account*/
INSERT INTO Customer (customerID, customer_Name, customer_Surname, customer_Email, purchase_Date, serial_Number)
VALUES 
('20031014', 'John', 'Doe', 'john.doe@example.com', '2024-01-15', 'KHWM8199911');


/*Inserting New User Account*/
INSERT INTO Account (account_Name, account_Surname, account_Email, nationality, house_number, street, locality, country, mobile_number, customerID)
VALUES 
('John', 'Doe', 'john.doe@example.com', 'Maltese', 12, 'Main Street', 'Valletta', 'Malta', '12345678', 20031014);




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




