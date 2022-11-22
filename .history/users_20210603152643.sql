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