CREATE TABLE IF NOT EXISTS `results` (
  `url` varchar(100) NOT NULL,
  `twitter_count` int(11) NOT NULL,
  `facebook_count` int(11) NOT NULL,
  `pinterest_count` int(11) NOT NULL,
  PRIMARY KEY (`url`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;