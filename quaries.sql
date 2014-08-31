CREATE DATABASE `small_twitter` /*!40100 DEFAULT CHARACTER SET latin1 */

CREATE TABLE `users` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `user_name` varchar(110) NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1

CREATE TABLE `tweets` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `user_id` int(11) NOT NULL,
 `tweet` varchar(110) NOT NULL,
 `tagname` varchar(110) NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1
