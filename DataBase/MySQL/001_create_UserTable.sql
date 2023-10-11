CREATE TABLE 'Users' (
	'ID'            INT,
	'UserNames'     VARCHAR(20) NOT NULL, 
	'PassWords'     VARCHAR(20) NOT NULL, 
	'Email' 	VARCHAR(20) NOT NULL, 
	'AccessLevel'   INT, 

	PRIMARY KEY ('ID'),
	UNIQUE ('Email')

); 
