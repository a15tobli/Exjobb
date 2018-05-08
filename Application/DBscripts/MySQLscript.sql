DROP DATABASE IF EXISTS MySQL_DB;
CREATE DATABASE MySQL_DB;
USE MySQL_DB;

CREATE TABLE SplitTest(
testID int AUTO_INCREMENT PRIMARY KEY,
testName varchar(25) UNIQUE NOT NULL 
)engine=innodb;

CREATE TABLE ImageEntry(
ID int AUTO_INCREMENT PRIMARY KEY,
image mediumblob,
caption varchar(100),
testID int,
FOREIGN KEY (testID) REFERENCES SplitTest(testID)
)engine=innodb;

CREATE TABLE Statistics(
ID int AUTO_INCREMENT PRIMARY KEY,
answer char,
testID int,
FOREIGN KEY (testID) REFERENCES SplitTest(testID)
)engine=innodb;

SELECT * FROM SplitTest;
SELECT * FROM ImageEntry;
SELECT * FROM Statistics;
