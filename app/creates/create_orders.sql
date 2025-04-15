CREATE TABLE Orders(
    OrderNum        int unsigned NOT NULL AUTO_INCREMENT,
    CustomerID      int unsigned NOT NULL,
    DateOrdered     datetime NOT NULL,
    Subtotal        decimal NOT NULL,
    Tax             decimal NOT NULL,
    Email           varchar(255) NOT NULL,
    Shipping        decimal NOT NULL,
    Total           decimal NOT NULL,
    CountryCode     varchar(3) NOT NULL,
    Phone1          varchar(3) NOT NULL,
    Phone2          varchar(3) NOT NULL,
    Phone3          varchar(3) NOT NULL,
    Street          varchar(256) NOT NULL,
    City            tinytext NOT NUll,
    State           tinytext NOT NULL,
    Zip             smallint NOT NULL,
    Country         varchar(50) NOT NULL,

    PRIMARY KEY (OrderNum),
    FOREIGN KEY (CustomerID) REFERENCES Customers(CustomerID)
);