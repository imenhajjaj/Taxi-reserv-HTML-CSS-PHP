
CREATE TABLE IF NOT EXISTS `contact` (
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
