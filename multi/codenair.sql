CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(100) NOT NULL,
   PRIMARY KEY(ID)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;


INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(1, 'RAJ', '12345', 'user'),
(2, 'ABCD', '12345', 'admin'),
(3, 'XYZ', '12345', 'moderator');

