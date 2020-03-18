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


CREATE TABLE IF NOT EXISTS `tblmaterial` (
  `id` int(11) NOT NULL,
  `Name` varchar(200) DEFAULT NULL,
  `Description` mediumtext,
  `Points` int(11) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `tblmaterial` (`id`, `Name`, `Description`, `Points`,  `CreationDate`) VALUES
(1, 'Metal', 'Description for metal', '10', '2017-11-06 13:16:09');

ALTER TABLE `tblmaterial`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tblmaterial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
