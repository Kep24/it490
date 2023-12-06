CREATE TABLE HighLevel(
	PokemonName VARCHAR(30),
	ID INT NOT NULL,
	Generation INT, 
	PRIMARY KEY(PokemonName), 
	FOREIGN KEY(ID) REFERENCES Users(ID)
);
