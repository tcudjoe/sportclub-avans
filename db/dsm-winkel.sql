-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 17, 2023 at 08:57 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dsm-winkel`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'drinks'),
(2, 'bread'),
(3, 'meat'),
(4, 'fish'),
(5, 'dairy'),
(6, 'vegitables'),
(7, 'fruit'),
(8, 'condiments');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `order_price` decimal(10,2) NOT NULL,
  `order_quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_date`, `order_price`, `order_quantity`) VALUES
(1, 2, '2023-05-12 00:51:30', '65.78', 15),
(2, 2, '2023-05-12 00:51:30', '56.95', 10),
(3, 74, '2023-05-12 00:53:45', '15.78', 15),
(4, 74, '2023-05-12 00:53:45', '56.95', 10),
(5, 75, '2023-05-12 00:54:10', '76.00', 15),
(31, 76, '2023-05-17 00:00:00', '67.00', 657),
(7, 76, '2023-05-12 00:54:30', '76.00', 15),
(8, 76, '2023-05-12 00:54:30', '56.95', 10),
(9, 76, '2023-05-14 00:00:00', '23.00', 23),
(16, 2, '2023-05-21 00:00:00', '32.00', 23),
(18, 2, '2023-05-21 00:00:00', '32.00', 23),
(14, 2, '2023-05-21 00:00:00', '32.00', 23),
(20, 2, '2023-05-21 00:00:00', '32.00', 23),
(21, 2, '2023-05-21 00:00:00', '32.00', 23),
(28, 2, '2023-05-21 00:00:00', '32.00', 23),
(29, 2, '2023-05-21 00:00:00', '32.00', 24),
(30, 2, '2023-05-21 00:00:00', '32.00', 24),
(32, 76, '2023-05-17 00:00:00', '67.00', 657),
(33, 76, '2023-05-17 00:00:00', '67.00', 657),
(34, 76, '2023-05-17 00:00:00', '21.00', 12),
(35, 76, '2023-05-17 00:00:00', '32.00', 23),
(36, 76, '2023-05-17 00:00:00', '234532.00', 23),
(37, 85, '2023-05-19 00:00:00', '231.00', 23),
(38, 76, '2023-05-26 00:00:00', '342.00', 121),
(39, 85, '2023-05-25 00:00:00', '1231.00', 23);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `img_address` varchar(255) NOT NULL,
  `price` decimal(4,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=89 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `img_address`, `price`, `quantity`, `category_id`) VALUES
(2, 'Bakkers Brood Bruin', 'Heerlijk zacht en mals bruinbrood met een mooie gemelleerde korst dat extra lang lekker blijft.\r\n\r\nOm direct te eten of in te vriezen\r\nBron van vezels', '/bread/bakkers_bruin.jpeg', '0.85', 100, 2),
(3, 'Bakkers Brood Libanees Brood', 'Klassiek arabisch platbrood van volkorenmeel.\r\n\r\n100% natuurlijk\r\nIdeaal platbrood om bij mediterrane gerechten te eten\r\nPerfect om mee te dippen en als \'bestek\'\r\nScheur en eet', '/bread/bakkers_libbrood.jpeg', '2.59', 50, 2),
(4, 'Bakkers Brood Rozijnen', 'Heerlijk mals vruchtenbrood, gevuld met zoete kleine rozijntjes.\r\n\r\nBron van vezels\r\nOm zo te eten of naar eigen smaak te beleggen\r\nOok lekker bij de koffie', '/bread/bakkers_rozijnen.jpeg', '2.19', 50, 2),
(5, 'Bakkers Brood Volkoren', 'Heel volkoren brood\r\n\r\nOm direct te eten of in te vriezen\r\nElke dag vers gebakken\r\nRijk aan vezels\r\n', '/bread/bakkers_volkoren_meerzaden.jpeg', '1.29', 100, 2),
(6, 'Boeren Brood Volkoren', 'Donker volkorenbrood met zonnebloempitten en lijnzaad\r\n\r\nOm direct te eten of in te vriezen\r\nElke dag vers gebakken\r\nRijk aan vezels', '/bread/boeren_volkoren_zonnebloem.jpeg', '1.29', 75, 2),
(7, 'Boeren Voklkoren Zonnenbloempitten', 'Donker volkorenbrood met zonnebloempitten en lijnzaad\r\n\r\nOm direct te eten of in te vriezen\r\nElke dag vers gebakken\r\nRijk aan vezels', '/bread/boeren_volkoren_zonnebloem.jpeg', '1.09', 75, 2),
(8, 'AH Koolhydraat verlaagd volkoren half', 'Koolhydraatverlaagd volkoren bevat 63% minder koolhydraten dan Zaans volkoren.\r\n\r\nVolkorenbrood met lijnzaad\r\nDecoratie van geel en bruin lijnzaad\r\nSlechts 5 gram koolhydraten per sneetje\r\nOok vezelrijk en eiwitrijk', '/bread/lowcarb_volkoren.jpeg', '1.99', 75, 2),
(10, 'Triomphe broodje', 'Triomphe broodje', '/bread/triomphe_broodje.jpeg', '0.80', 60, 2),
(11, 'Petite Stokbrood Wit', 'Petite Stokbrood Wit', '/bread/petitstokbrood_wit.jpeg', '1.09', 20, 2),
(12, 'Petite Stokbrood Meerzaden', 'Petite Stokbrood Meerzaden', '/bread/petitstokbrood_meerzaden.jpeg', '1.09', 20, 2),
(13, 'Coco Cola Original', 'Coco Cola Original', '/drinks/Cola.png', '0.89', 450, 1),
(14, 'Coco Cola Zero Sugar', 'Coco Cola Zero Sugar', '/drinks/cola_zero.png', '0.99', 400, 1),
(15, 'Fanta Blue', 'Fanta Blue', '/drinks/fanta_blue.jpeg', '0.99', 350, 1),
(16, 'Fanta Tropical', 'Fanta Tropical', '/drinks/fanta_green.jpeg', '1.09', 78, 1),
(17, 'Fernandes Cherry', 'Fernandes Cherry', '/drinks/fernandes_cherry.png', '0.99', 560, 1),
(18, 'Fernandes Cream Ginger', 'Fernandes Cream Ginger', '/drinks/Fernandes_creamginger.png', '0.99', 84, 1),
(19, 'Fernandes Green Punch', 'Fernandes Green Punch', '/drinks/Fernandes_greenpunch.jpg', '1.09', 75, 1),
(20, 'Fernandes Red Grape', 'Fernandes Red Grape', '/drinks/Fernandes_redgrape.png', '1.09', 100, 1),
(21, 'Fernandes Red Grape', 'Fernandes Red Grape', '/drinks/fernandes_superpineapple.jpg', '1.09', 50, 1),
(22, 'Fanta Orange', 'Fanta Orange', '/drinks/fantaorange.jpg', '0.99', 100, 1),
(23, 'Gazeuze', 'Gazeuze', '/drinks/gazeuze.jpeg', '1.09', 75, 1),
(24, 'Pepsi', 'Pepsi', '/drinks/pepsi.png', '0.85', 50, 1),
(25, 'Beef Bacon Burger', 'Beef Bacon Burger', '/meat/beefbaconburger.jpeg', '5.29', 50, 3),
(26, 'Hazen Rug Filet', 'Hazen Rug Filet', '/meat/deslagers_hazenrugfilet.jpeg', '8.54', 89, 3),
(27, 'Fondue Schotel', 'Fondue Schotel', '/meat/fondueschoteljpeg.jpeg', '4.29', 60, 3),
(28, 'Gerookte Spek Blokjes', 'Gerookte Spek Blokjes', '/meat/gerooktespekblokjes.jpeg', '1.09', 250, 3),
(29, 'Half-om-half Gehakt', 'Half-om-half Gehakt', '/meat/halfomhalfgehakt.jpeg', '4.69', 80, 3),
(43, 'Gekookte garnalen', 'Gekookte garnalen', '/fish/gekooktgarnalen.jpeg', '4.28', 95, 4),
(42, 'Garnalen spiesjes', 'Garnalen spiesjes', '/fish/garanalen_speise.jpeg', '7.68', 70, 4),
(41, 'Cocktail garnalen', 'Cocktail garnalen', '/fish/cocktail_garnalen.jpeg', '5.29', 789, 4),
(33, 'Herten biefstuk', 'Herten biefstuk', '/meat/hertenbiefstuk.jpeg', '9.99', 12, 3),
(34, 'Hertenrolade', 'Hertenrolade', '/meat/hertenbiefstuk.jpeg', '11.99', 80, 3),
(35, 'Kipburger', 'Kipburger', '/meat/kipburger.jpeg', '5.29', 20, 3),
(36, 'Kippendij filet reepjes shoarma', 'Kippendij filet reepjes shoarma', '/meat/kippendijfiletreepjesshoarma.jpeg', '5.29', 80, 3),
(37, 'Rundergehakt', 'Rundergehakt', '/meat/rundergehakt.jpeg', '5.39', 80, 3),
(38, 'Soepballetjes', 'Soepballetjes', '/meat/soepballetjes.jpeg', '3.29', 890, 3),
(39, 'Ultitimate beef burger', 'Ultitimate beef burger', '/meat/ultimat_beefburger.jpeg', '5.28', 540, 3),
(40, 'Pulled pork', 'Pulled pork', '/meat/vido_pulledpork.jpeg', '25.99', 70, 3),
(44, 'Hollandse garnalen', 'Hollandse garnalen', '/fish/hollandse garnalen.jpeg', '4.56', 987, 4),
(45, 'Kabeljauwfilet', 'Kabeljauwfilet', '/fish/kabeljauwfilet.jpeg', '5.50', 98, 4),
(46, 'Knoflook garnalen', 'Knoflook garnalen', '/fish/knoflookgarnalen.jpeg', '6.45', 60, 4),
(47, 'Pangasius filet met tuinkruiden', 'Pangasius filet met tuinkruiden', '/fish/pangasisutuinkruiden.jpeg', '6.45', 951, 4),
(48, 'Pangasius filet', 'Pangasius filet', '/fish/pangasiusfiletjpeg.jpeg', '4.12', 79, 4),
(49, 'Tilapia Filet', 'Tilapia Filet', '/fish/tilapiafilet.jpeg', '4.65', 45, 4),
(50, 'Dutch Yellowtail', 'Dutch Yellowtail', '/fish/yellowtail.jpg', '4.60', 74, 4),
(51, 'Zalm filet', 'Zalm filet', '/fish/zalmfilet.jpeg', '5.89', 78, 4),
(52, 'Half Volle melk', 'Half Volle melk', '/dairy/halfvollemelk.jpeg', '2.95', 78, 5),
(53, 'Halverine', 'Halverine', '/dairy/halvarine.jpeg', '5.75', 95, 5),
(54, 'Kook zuivel', 'Kook zuivel', '/dairy/kookzuivel.jpeg', '2.35', 54, 5),
(55, 'Magere Yoghurt', 'Magere Yoghurt', '/dairy/magere_yoghurt.jpeg', '5.24', 45, 5),
(56, 'Slagroom', 'Slagroom', '/dairy/slagroom.jpeg', '1.29', 65, 5),
(57, 'Slagroom geklopt', 'Slagroom geklopt', '/dairy/slagroomklopt.jpeg', '2.29', 54, 5),
(58, 'Volle melk', 'Volle melk', '/dairy/vollemelk.jpeg', '3.29', 465, 5),
(59, 'Grieks Yoghurt', 'Grieks Yoghurt', '/dairy/yoghurt_grieks.jpeg', '5.85', 95, 5),
(60, 'Turkse Yoghurt', 'Turkse Yoghurt', '/dairy/yoghurt_turks.jpeg', '0.99', 50, 5),
(61, 'Zaanse Hoeve Half Volle Melk', 'Zaanse Hoeve Half Volle Melk', '/dairy/zaansehovehalfvol.jpeg', '5.69', 65, 5),
(62, 'Zuivel Spread Light', 'Zuivel Spread Light', '/dairy/zuivelspreadlight.jpeg', '0.99', 89, 5),
(63, 'Ananas appel en mango fruit bakje', 'Ananas appel en mango fruit bakje', '/greens/ana_app_man_dru.jpeg', '2.39', 87, 7),
(64, 'Bami wok groente', 'Bami wok groente', '/greens/bamigroente.jpeg', '1.39', 65, 6),
(65, 'Boeren soep groenten', 'Boeren soep groenten', '/greens/boernsoepgroenet.jpeg', '0.99', 54, 6),
(66, 'Gegrilde groenten', 'Gegrilde groenten', '/greens/gegriledgroenten.jpeg', '3.26', 15, 6),
(67, 'Komkommer', 'Komkommer', '/greens/komkokmmer.jpeg', '0.98', 80, 6),
(68, 'Oven groenten', 'Oven groenten', '/greens/ovengroenten.jpeg', '2.19', 95, 6),
(69, 'Rucola', 'Rucola', '/greens/rucola.jpeg', '0.65', 80, 6),
(70, 'Teryaki groenten', 'Teryaki groenten', '/greens/teriyakigroenten.jpeg', '2.65', 45, 6),
(71, 'Thaise wok groenten', 'Thaise wok groenten', '/greens/thaiswokgroente.jpeg', '2.65', 654, 6),
(72, 'Volkoren Bulgur', 'Volkoren Bulgur', '/greens/volkorenbulgur.jpeg', '6.54', 877, 6),
(73, 'Ananas kiwi en druiven fruit bakje', 'Ananas kiwi en druiven fruit bakje', '/fruit/ana_kiw_dru.jpeg', '3.56', 89, 7),
(74, 'Ananas fruit bakje', 'Ananas fruit bakje', '/fruit/anans.jpeg', '1.29', 32, 7),
(75, 'Gala, Cantaloup en watermeloen fruit bakje', 'Gala, Cantaloup en watermeloen fruit bakje', '/fruit/gal_can_wat.jpeg', '5.49', 56, 7),
(76, 'Mango fruit bakje', 'Mango fruit bakje', '/fruit/man.jpeg', '4.26', 52, 7),
(77, 'Bearnaisse saus', 'Bearnaisse saus', '/saus/bearnaisesaus.jpeg', '3.65', 29, 8),
(78, 'Caramel saus', 'Caramel saus', '/saus/caramel.jpeg', '4.65', 24, 8),
(79, 'Ceasar salad dressing', 'Ceasar salad dressing', '/saus/ceasar.jpeg', '2.65', 98, 8),
(80, 'Garlic saus', 'Garlic saus', '/saus/garlicsays.jpeg', '2.65', 54, 8),
(81, 'Honing mosterd saus', 'Honing mosterd saus', '/saus/honingmosterd.jpeg', '5.61', 54, 8),
(82, 'Japanese mayonaise', 'Japanese mayonaise', '/saus/japanmayo.jpeg', '6.54', 32, 8),
(83, 'Ketchup', 'Ketchup', '/saus/kettchup.jpeg', '1.29', 65, 8),
(84, 'Sriracha', 'Sriracha', '/saus/sriracha.jpeg', '2.65', 26, 8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `cityname` varchar(255) NOT NULL,
  `userrole` enum('admin','employee','customer') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=88 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `surname`, `email`, `password`, `address`, `zipcode`, `cityname`, `userrole`) VALUES
(85, 'Tyra', 'Cudjoe', 'tyra20015@gmail.com', 'aqw', 'Veerse Meer 4', '2134 VR', 'Hoofddorp', 'customer'),
(75, 'tyra', 'cudjoe', 'info.apresdesheures@gmail.com', 'test', 'veerse meer 4', '2134VR', 'hoofddorp', 'admin'),
(76, 'Tyra', 'Cudjoe', 'tyra20015@gmail.com', 'ad', 'Veerse Meer 4', '2134 VR', 'Hoofddorp', 'customer'),
(82, 'Tyra', 'Cudjoe', 'tyra20015@gmail.com', 'yur', 'Veerse Meer 4', '2134 VR', 'Hoofddorp', 'employee'),
(87, 'albert', 'Cudjoe', 'tyra20015@gmail.com', 'test', 'Veerse Meer 4', '2134 VR', 'Hoofddorp', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
