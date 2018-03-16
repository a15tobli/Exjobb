DROP DATABASE MySQL_DB;
CREATE DATABASE MySQL_DB;
USE MySQL_DB;

CREATE TABLE SplitTest(
testID int AUTO_INCREMENT PRIMARY KEY,
testName varchar(15) UNIQUE NOT NULL 
)engine=innodb;

CREATE TABLE ImageEntry(
ID int AUTO_INCREMENT PRIMARY KEY,
image longblob,
caption varchar(100),
testID int,
FOREIGN KEY (testID) REFERENCES SplitTest(testID)
)engine=innodb;


SELECT * FROM SplitTest;
SELECT * FROM ImageEntry;