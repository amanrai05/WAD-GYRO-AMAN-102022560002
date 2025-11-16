CREATE DATABASE ead_db;

use ead_db;

CREATE TABLE `members` (
  `id` int(11) AUTO_INCREMENT NOT NULL,
  `name` VARCHAR(100),
  `email` VARCHAR(100),
  `studentID` VARCHAR(50),
  `major` VARCHAR(100),
  `reason` TEXT,
  PRIMARY KEY (`id`)
);