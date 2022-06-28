CREATE TABLE `districts` (
 `id` int(255) NOT NULL AUTO_INCREMENT,
 `distCode` int(255) NOT NULL,
  `stCode` int(255) DEFAULT NULL,
 `districtName` varchar(255) NOT NULL,
 PRIMARY KEY (`id`)
)