/* CREATE TABLE IF NOT EXISTS users 
(
    id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    email VARCHAR(255) UNIQUE NOT NULL,
    firstName VARCHAR(50),
    lastName VARCHAR(50),
    password VARCHAR(255) NOT NULL
) ENGINE=INNODB; */

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'claire', 'claire@gmail.com', '123'),
(2, 'xiaoyu', '123@gmail.com', '321');
COMMIT;


CREATE TABLE IF NOT EXISTS `products` ( 
  `id_product` int(11) NOT NULL AUTO_INCREMENT, 
  `name` varchar(100) NOT NULL, 
  `description` varchar(250) NOT NULL, 
  `price` decimal(6,2) NOT NULL, 
  PRIMARY KEY (`id_product`) 
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ; 
  
INSERT INTO `products` (`id_product`, `name`, `description`, `price`) VALUES
(1, 'ServDrone Class 1', 'Some random description', '299.00'), 
(2, 'ServDrone plus', 'Some random description', '399.00'), 
(3, 'ServDrone Deluxe', 'Some random description', '299.00');