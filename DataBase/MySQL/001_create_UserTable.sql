CREATE TABLE Users (
	ID            INT,
	UserNames     VARCHAR(20) NOT NULL, 
	Passwords     CHAR(60) NOT NULL, 
	Email 	VARCHAR(40) NOT NULL UNIQUE, 
	AccessLevel   INT, 
	PRIMARY KEY (ID)
);
