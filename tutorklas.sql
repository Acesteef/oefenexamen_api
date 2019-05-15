/*
MySQL Data Transfer
Source Host: localhost
Source Database: tutorklas
Target Host: localhost
Target Database: tutorklas
Date: 6-12-2018 12:49:18
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for docent
-- ----------------------------
CREATE TABLE `docent` (
  `id` varchar(5) NOT NULL,
  `voornaam` varchar(20) DEFAULT NULL,
  `achternaam` varchar(20) DEFAULT NULL,
  `kamer` varchar(5) DEFAULT NULL,
  `tutorgroep` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for leerling
-- ----------------------------
CREATE TABLE `leerling` (
  `id` int(11) NOT NULL,
  `tutorgroep` varchar(5) DEFAULT NULL,
  `achternaam` varchar(20) DEFAULT NULL,
  `voornaam` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `docent` VALUES ('SCLU', 'Luciën', 'Schevers', '6.21', '4M07a');
INSERT INTO `docent` VALUES ('BAHA', 'Hans', 'Bataïlle', '6.06', '4M07b');
INSERT INTO `docent` VALUES ('BAKE', 'Kees', 'Bastiaansen', '6.33', '4M07c');
INSERT INTO `docent` VALUES ('BRAD', 'Adriënne', 'Brocken', '6.33', '4M07d');
INSERT INTO `leerling` VALUES ('61717', '4M07a', 'de Bresser', 'Dennis');
INSERT INTO `leerling` VALUES ('56062', '4M07a', 'van Doorn', 'Lodewijk');
INSERT INTO `leerling` VALUES ('61718', '4M07a', 'Hathie', 'Rohit');
INSERT INTO `leerling` VALUES ('72282', '4M07a', 'Hazenberg', 'Carlo');
INSERT INTO `leerling` VALUES ('69782', '4M07c', 'Klomp', 'Marco');
INSERT INTO `leerling` VALUES ('45247', '4M07a', 'Maes', 'Stefan');
INSERT INTO `leerling` VALUES ('80127', '4M07a', 'Moghtader', 'Mohammad');
INSERT INTO `leerling` VALUES ('70991', '4M07a', 'Smits', 'Jörg');
INSERT INTO `leerling` VALUES ('71499', '4M07a', 'van de Ven', 'Erik');
INSERT INTO `leerling` VALUES ('72999', '4M07b', 'van Bijnen', 'Gary');
INSERT INTO `leerling` VALUES ('68306', '4M07b', 'van Dijk', 'Erwin');
INSERT INTO `leerling` VALUES ('67841', '4M07b', 'de Groot', 'Michaël');
INSERT INTO `leerling` VALUES ('67834', '4M07b', 'Holtkamp', 'Samuel');
INSERT INTO `leerling` VALUES ('36063', '4M07b', 'Janssens', 'Margriet');
INSERT INTO `leerling` VALUES ('63866', '4M07b', 'Keeris', 'Richard');
INSERT INTO `leerling` VALUES ('70427', '4M07b', 'Kuijpers', 'Rens');
INSERT INTO `leerling` VALUES ('39569', '4M07b', 'Nurmohamed', 'Hasinã');
INSERT INTO `leerling` VALUES ('60665', '4M07b', 'van Ringelenstein', 'René');
INSERT INTO `leerling` VALUES ('44504', '4M07c', 'Arts', 'Marco');
INSERT INTO `leerling` VALUES ('63574', '4M07c', 'Coenen', 'Bob');
INSERT INTO `leerling` VALUES ('65806', '4M07c', 'de Laat', 'Rick');
INSERT INTO `leerling` VALUES ('74063', '4M07c', 'Lacet', 'Brian');
INSERT INTO `leerling` VALUES ('73363', '4M07c', 'Le', 'Quoc');
INSERT INTO `leerling` VALUES ('61624', '4M07c', 'Maqi', 'Lindi');
INSERT INTO `leerling` VALUES ('60841', '4M07c', 'van Rijt', 'Youri');
INSERT INTO `leerling` VALUES ('44688', '4M07c', 'Senders', 'Joost');
INSERT INTO `leerling` VALUES ('61982', '4M07c', 'Verstappen', 'Robbin');
INSERT INTO `leerling` VALUES ('68508', '4M07a', 'van Zon', 'Ivo');
INSERT INTO `leerling` VALUES ('71213', '4M07d', 'Ahrens', 'Hans');
INSERT INTO `leerling` VALUES ('71282', '4M07d', 'Debipersâd', 'Vishal');
INSERT INTO `leerling` VALUES ('63807', '4M07d', 'van den Elzen', 'Robin');
INSERT INTO `leerling` VALUES ('71438', '4M07d', 'den Hartog', 'Gido');
INSERT INTO `leerling` VALUES ('56447', '4M07d', 'Janssen', 'Robert');
INSERT INTO `leerling` VALUES ('45545', '4M07d', 'Maas', 'Dimitri');
INSERT INTO `leerling` VALUES ('71488', '4M07d', 'van Melick', 'Hans');
INSERT INTO `leerling` VALUES ('71506', '4M07d', 'van Rooij', 'Jeroen');
INSERT INTO `leerling` VALUES ('57393', '4M07d', 'van Rooij', 'Wim');
INSERT INTO `leerling` VALUES ('70750', '4M07d', 'Schloesser', 'Jos');
INSERT INTO `leerling` VALUES ('68974', '4M07d', 'Smits', 'Dennis');
