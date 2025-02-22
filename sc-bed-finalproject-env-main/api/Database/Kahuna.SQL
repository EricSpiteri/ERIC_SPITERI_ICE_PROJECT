CREATE DATABASE Kahuna;

USE Kahuna;

CREATE TABLE Account
(
  accountID    INT     NOT NULL,
  account_Name VARCHAR(255) NOT NULL, 
  account_Surname VARCHAR(255) NOT NULL,
  email        VARCHAR(255) NOT NULL,
  nationaility VARCHAR(255) NOT NULL,
  house_Number     INT     NOT NULL,
  street       VARCHAR(255) NOT NULL,
  locality     VARCHAR(255) NOT NULL,
  country_Number   VARCHAR(255) NOT NULL,
  mobile_Number    INT     NOT NULL,
  customerID   INT     NOT NULL,
  PRIMARY KEY (accountID)
) COMMENT 'Each account registered into the system';

CREATE TABLE Customer 
(
  customerID INT     NOT NULL, 
  customer_Name       VARCHAR(255)  NOT NULL,
  customer_Surname    VARCHAR(255) NOT NULL, 
  email      VARCHAR(255) NOT NULL, 
  mobile_Number INT NOT NULL,
  PRIMARY KEY (customerID) 
) COMMENT 'The individual person the service is provided to';

CREATE TABLE Product
(
  serial_Number     VARCHAR(255)  NOT NULL,
  product_Name VARCHAR(255)  NOT NULL,
  price        INT      NOT NULL,
  warranty     INT     NOT NULL,
  purchase_Date DATE NOT NULL,
  customerID   INT      NOT NULL,
  PRIMARY KEY (serial_Number)
) COMMENT 'Each Individual Appliance and all of its attributes';

ALTER TABLE Product
  ADD CONSTRAINT FK_Customer_TO_Product
    FOREIGN KEY (customerID)
    REFERENCES Customer (customerID);

ALTER TABLE Account
  ADD CONSTRAINT FK_Customer_TO_Account
    FOREIGN KEY (customerID)
    REFERENCES Customer (customerID);

INSERT INTO Customer (customerID, customer_Name, customer_Surname, email, mobile_Number)
VALUES (12345, Eric, Spiteri, ericspiteri1410@gmail.com, 79489240)
