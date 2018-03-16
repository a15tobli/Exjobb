DROP DATABASE MySQL_DB;
CREATE DATABASE MySQL_DB;
USE MySQL_DB;

CREATE TABLE ImageEntry(
ID int AUTO_INCREMENT PRIMARY KEY,
image longblob,
caption varchar(100)
)engine=innodb;

CREATE TABLE SplitTest(
testID int AUTO_INCREMENT PRIMARY KEY,
testName varchar(15) NOT NULL,
imgID1 int NOT NULL,
imgID2 int NOT NULL,
FOREIGN KEY (imgID1) REFERENCES ImageEntry(ID),
FOREIGN KEY (imgID2) REFERENCES ImageEntry(ID)
)engine=innodb;

INSERT INTO ImageEntry(caption) VALUES ("Testing an entry.");
DELETE FROM ImageEntry WHERE ID=1;
SELECT * From ImageEntry;