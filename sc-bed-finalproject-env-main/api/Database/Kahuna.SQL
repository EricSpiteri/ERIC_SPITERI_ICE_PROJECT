CREATE DATABASE Kahuna;

USE Kahuna;

CREATE TABLE Account
(
  AccountID    INT     NOT NULL AUTO_INCREMENT,
  Name         VARCHAR NOT NULL,
  Surname      VARCHAR NOT NULL,
  Email        VARCHAR NOT NULL,
  Nationaility VARCHAR NOT NULL,
  House  #     INT     NOT NULL,
  Street       VARCHAR NOT NULL,
  Locality     VARCHAR NOT NULL,
  Country  #   VARCHAR NOT NULL,
  Mobile  #    INT     NOT NULL,
  CustomerID   INT     NOT NULL,
  PRIMARY KEY (AccountID)
) COMMENT 'Each account registered into the system';

CREATE TABLE Customer
(
  CustomerID INT     NOT NULL AUTO_INCREMENT,
  Name       VARCHAR NOT NULL,
  Surname    VARCHAR NOT NULL,
  Email      VARCHAR NOT NULL,
  PRIMARY KEY (CustomerID)
) COMMENT 'The individual person the service is provided to';

CREATE TABLE Product
(
  Serial #     VARCHAR  NOT NULL AUTO_INCREMENT,
  Price        INT      NOT NULL,
  PurchaseDate DATETIME NOT NULL,
  WarrantyDate DATETIME NOT NULL,
  CustomerID   INT      NOT NULL,
  PRIMARY KEY (Serial # )
) COMMENT 'Each Individual Appliance and all of its attributes';

ALTER TABLE Product
  ADD CONSTRAINT FK_Customer_TO_Product
    FOREIGN KEY (CustomerID)
    REFERENCES Customer (CustomerID);

ALTER TABLE Account
  ADD CONSTRAINT FK_Customer_TO_Account
    FOREIGN KEY (CustomerID)
    REFERENCES Customer (CustomerID);