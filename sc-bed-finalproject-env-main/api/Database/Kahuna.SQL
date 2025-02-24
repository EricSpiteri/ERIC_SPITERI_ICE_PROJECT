CREATE DATABASE Kahuna;

USE Kahuna;

CREATE TABLE Account
(
  AccountID       INT(11)     NOT NULL,
  account_Name    VARCHAR(255) NOT NULL,
  account_Surname VARCHAR(255) NOT NULL,
  account_Email   VARCHAR(255) NOT NULL,
  nationaility    VARCHAR(255) NOT NULL,
  house_number    INT(11)     NOT NULL,
  street          VARCHAR(255) NOT NULL,
  locality        VARCHAR(255) NOT NULL,
  country         VARCHAR(255) NOT NULL,
  mobile_number   INT(11)     NOT NULL,
  customerID      INT(11)     NOT NULL,
  PRIMARY KEY (AccountID)
) COMMENT 'Each account registered into the system';

CREATE TABLE Customer
(
  customerID       INT(11)     NOT NULL,
  customer_Name    VARCHAR(255) NOT NULL,
  customer_Surname VARCHAR(255) NOT NULL,
  customer_Email   VARCHAR(255) NOT NULL,
  purchase_Date    DATE    NOT NULL,
  serial_Number    VARCHAR(255) NOT NULL,
  PRIMARY KEY (customerID)
) COMMENT 'The individual person the service is provided to';

CREATE TABLE Product
(
  serial_Number    VARCHAR(255) NOT NULL,
  product_Name     VARCHAR(255) NOT NULL,
  warranty         INT(11)     NOT NULL,
  price            INT(11)     NOT NULL,
  product_Image_ID VARCHAR(255) NOT NULL,
  PRIMARY KEY (serial_Number)
) COMMENT 'Each Individual Appliance and all of its attributes';

ALTER TABLE Account
  ADD CONSTRAINT FK_Customer_TO_Account
    FOREIGN KEY (customerID)
    REFERENCES Customer (customerID);

ALTER TABLE Customer
  ADD CONSTRAINT FK_Product_TO_Customer
    FOREIGN KEY (serial_Number)
    REFERENCES Product (serial_Number);



/*Inserting Product DATA*/
INSERT INTO Product (serial_Number, product_Name, warranty, price, product_Image_ID)
VALUES ('KHWM8199911', 'CombiSpin Washing Machine', 2 , 600, 'WashingMachine');

INSERT INTO Product (serial_Number, product_Name, warranty, price, product_Image_ID)

VALUES
('KHWM8199912', 'CombiSpin + Dry Washing Machine', 2, 750, 'CombiSpinDryWashingMachine.jpg'),
('KHMW789991', 'CombiGrill Microwave', 1, 150, 'CombiGrillMicrowave.jpg'),
('KHWP890001', 'K5 Water Pump', 5, 300, 'K5WaterPump.jpg'),
('KHWP890002', 'K5 Heated Water Pump', 5, 350, 'K5HeatedWaterPump.jpg'),
('KHSS988881', 'Smart Switch Lite', 2, 50, 'SmartSwitchLite.jpg'),
('KHSS988882', 'Smart Switch Pro', 2, 80, 'SmartSwitchPro.jpg'),
('KHSS988883', 'Smart Switch Pro V2', 2, 100, 'SmartSwitchProV2.jpg'),
('KHHM89762', 'Smart Heated Mug', 1, 25, 'SmartHeatedMug.jpg'),
('KHSB0001', 'Smart Bulb 001', 1, 15, 'SmartBulb001.jpg');



INSERT INTO Customer (customerID, customer_Name, customer_Surname, customer_Email, purchase_Date)
VALUES (12345, 'Eric', 'Spiteri', 'ericspiteri1410@gmail.com', 11/11/2024);
