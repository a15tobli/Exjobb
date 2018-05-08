 --Wipe data
 DROP TABLE IF EXISTS ImageEntry;
 DROP TABLE IF EXISTS SplitTest;
 
 --Create tables
CREATE TABLE SplitTest
(
	testID SERIAL PRIMARY KEY,
	testName varchar(25) UNIQUE NOT NULL
);
CREATE TABLE ImageEntry(
	ID SERIAL PRIMARY KEY,
	image bytea,
	caption varchar(100),
	testID int,
	FOREIGN KEY (testID) REFERENCES SplitTest(testID)
);

CREATE TABLE Statistics(
	ID SERIAL PRIMARY KEY,
	answer char,
	testID int,
	FOREIGN KEY (testID) REFERENCES SplitTest(testID)
);

--Display data
SELECT * FROM ImageEntry;
SELECT * FROM SplitTest;
SELECT * FROM Statistics;
