CREATE TABLE LowLevel(
	PokemonName VARCHAR(30),
	INT NOT NULL,
	Generation INT, 
	EffortValue INT, 
	PRIMARY KEY(PokemonName),
	FOREIGN KEY(ID) REFERENCES Users(ID)
); 
