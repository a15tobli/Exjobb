DROP DATABASE MySQL_DB;
CREATE DATABASE MySQL_DB;
USE MySQL_DB;

CREATE TABLE ImageEntry(
ID int AUTO_INCREMENT PRIMARY KEY,
image longblob,
caption varchar(100)
)engine=innodb;