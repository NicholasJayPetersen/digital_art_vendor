CREATE TABLE Cart (
    CartItemID  bigint NOT NULL auto_increment,
    Uname       varchar(255) NOT NULL,
    ProductID   int unsigned NOT NULL,
    Quantity    int unsigned NOT NULL,

    PRIMARY KEY (CartItemID),
    FOREIGN KEY (Uname) REFERENCES Users(Uname),
    FOREIGN KEY (ProductID) REFERENCES Products(ProductID)
);