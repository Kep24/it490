CREATE TABLE 'Users' (
	'ID'            INT,
	'UserNames'     VARCHAR(20) NOT NULL, 
	'Passwords'     BINARY(60) NOT NULL, 
	'Email' 	VARCHAR(40) NOT NULL, 
	'AccessLevel'   INT, 

	PRIMARY KEY ('ID'),
	UNIQUE('Email'),

); 
