-- check if the database exist an use it


CREATE DATABASE IF NOT EXISTS `localdb` ;
USE `localdb`;


-- creating table 

CREATE TABLE IF NOT EXISTS `booking` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(20) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `house` int(5) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  	`end_date` date DEFAULT NULL,
      PRIMARY KEY (`id`)
);

-- input test examples

	
	INSERT INTO `booking` (`name`, `email`, `house`, `start_date`, `end_date`) VALUES 
	('Joe','mrjoe@gmail.com',  1, '2021-05-18', '2021-06-01'),
	('Richard','mrrichard@gmail.com', 2, '2021-05-25', '2021-06-05'),
	('Chris','chris@gmail.com', 3, '2021-05-01', '2021-07-01');
