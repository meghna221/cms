-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 04, 2019 at 10:04 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(200) NOT NULL AUTO_INCREMENT,
  `cat_title` varchar(1000) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(4, 'node js'),
(2, 'javascript'),
(5, 'bootstrap'),
(6, 'city'),
(7, 'books');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(4) NOT NULL AUTO_INCREMENT,
  `comment_post_id` int(4) NOT NULL,
  `comment_author` varchar(200) NOT NULL,
  `comment_email` varchar(200) NOT NULL,
  `comment_content` varchar(5000) NOT NULL,
  `comment_status` varchar(2000) NOT NULL,
  `comment_date` date NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(2, 2, 'c,ml;s', 'meghna@gmail.com', '/.sca', 'approved', '2018-12-29'),
(3, 2, 'fdsf', 'abc@gmail.com', 'wdqw', 'unapproved', '2018-12-25'),
(4, 5, 'c,ml;s', 'ZxZ@gmail.com', 'awesoma', 'approved', '2018-12-29'),
(5, 2, './', 'abc@gmail.com', 'ka;smc;am;', 'approved', '2018-12-29'),
(6, 2, ',l;a', 'nlak@gmail.com', 'malkjk', 'unapproved', '2018-12-29'),
(7, 2, 'ms;.', 'xlk@gmail.com', 's,a. a', 'unapproved', '2018-12-29'),
(8, 2, 's,a', 'qwe@gmail.com', ' ,xmc.', 'unapproved', '2018-12-29'),
(9, 2, './', 'snk@h.com', 'm.xa', 'unapproved', '2018-12-29'),
(10, 2, './', 'an@jdk.vo', 'msa', 'unapproved', '2018-12-29'),
(11, 2, 'c,ml;s', 'jk@g.co', 'ms.z\r\n', 'unapproved', '2018-12-29'),
(12, 17, 'pulvinar mollis', 'abc@gmail.com', 'Donec, feugiat aenean curae;. Mi conubia sem accumsan sociis dis. Ornare, donec interdum hac congue cursus. Interdum etiam magna dapibus praesent aliquam ultrices nam placerat facilisis commodo.', 'approved', '2019-01-04'),
(13, 17, 'sapien turpis', 'sapien@gmail.com', 'Per integer iaculis quis mattis habitant vestibulum auctor felis, platea quis at. Accumsan, at fringilla erat pellentesque ultricies senectus nibh. Morbi quis mollis, conubia varius.', 'approved', '2019-01-04'),
(14, 19, 'pulvinar mollis', 'qwe@gmail.com', 'Lacinia himenaeos eleifend ad fermentum diam eu sed convallis odio mus sociis congue? Natoque gravida.\r\n\r\n', 'approved', '2019-01-04'),
(15, 19, 'Congue fermentum', 'Congue@gmail.com', 'Vehicula tristique orci; laoreet conubia metus luctus donec nisi. Ligula nulla fames vestibulum ornare dolor. Lacus cras eros fringilla blandit enim litora. Faucibus bibendum inceptos cubilia orci ullamcorper cras tristique.', 'approved', '2019-01-04');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(200) NOT NULL AUTO_INCREMENT,
  `post_authour` varchar(200) NOT NULL,
  `post_title` varchar(200) NOT NULL,
  `post_category_id` varchar(200) NOT NULL,
  `post_status` varchar(1000) NOT NULL,
  `post_image` varchar(1000) NOT NULL,
  `post_tags` varchar(1000) NOT NULL,
  `post_comment_count` int(200) DEFAULT '0',
  `post_date` date NOT NULL,
  `post_content` varchar(10000) NOT NULL,
  `post_views_count` int(200) DEFAULT '0',
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_authour`, `post_title`, `post_category_id`, `post_status`, `post_image`, `post_tags`, `post_comment_count`, `post_date`, `post_content`, `post_views_count`) VALUES
(2, 'js..', 'mksla', '2', 'published', 'thumb-1920-698123.jpg', 'xz', 1, '2019-01-03', '         m.m/         \r\n        s,\r\n                  \r\n        \r\n                  \r\n        \r\n                  \r\n        \r\n                  \r\n        \r\n                  \r\n        \r\n                  \r\n        \r\n                  \r\n        \r\n         ', 2),
(11, 'js..', 'abcd', '4', 'published', '1320578-civil-war-wallpaper.jpg', 'ab', 0, '2019-01-03', '                  cnjaslnlcml;sm\r\n        \r\n         ', 2),
(12, 'js..', 'sm.a', '4', 'published', '1320578-civil-war-wallpaper.jpg', ' ,.sa c', 0, '2019-01-03', '                  \r\n        \r\n         cnklsnc.', 4),
(10, 'as..', 'mksla', '2', 'published', 'thumb-1920-698123.jpg', 'xz', 0, '2018-12-31', '         m.m/         \r\n        s,\r\n                  \r\n        \r\n                  \r\n        \r\n                  \r\n        \r\n                  \r\n        \r\n                  \r\n        \r\n                  \r\n        \r\n         ', 3),
(7, 'xa.M', 'nklanl', '4', 'published', '1320578-civil-war-wallpaper.jpg', 'XSMMX.', 0, '2018-12-30', '         X A.,', 2),
(13, 'js..', 'sm.a', '4', 'published', '1320578-civil-war-wallpaper.jpg', ' ,.sa c', 0, '2019-01-03', '                  \r\n        \r\n         cnklsnc.', 0),
(14, 'js..', 'abcd', '4', 'published', '1320578-civil-war-wallpaper.jpg', 'ab', 0, '2019-01-03', '                  cnjaslnlcml;sm\r\n        \r\n         ', 0),
(15, 'Molestie risus ', 'Felis in eu ', '2', 'draft', 'b6..jpg', 'city,citylife,happy', 0, '2019-01-04', '<p>Aliquam nulla magna torquent suspendisse auctor interdum facilisis adipiscing nostra nostra elit? Congue purus praesent imperdiet! Pretium platea sapien etiam netus, justo dignissim aptent luctus vestibulum a a commodo. Nulla facilisi turpis, etiam fames ac. Bibendum nam tempus pulvinar congue netus integer curae; tristique senectus mattis nibh! Parturient class, litora faucibus dapibus vivamus amet nascetur vulputate varius. Rhoncus tempor ultrices! Mus, et tristique cras volutpat lacus massa dis. At rutrum tortor etiam magna lacus venenatis rutrum imperdiet penatibus. Ullamcorper sodales penatibus penatibus sed commodo id natoque, ac curabitur sociis nec eu! Per lorem convallis mattis suspendisse ultricies rutrum scelerisque. Per ullamcorper eu nisi montes orci et habitasse suscipit aptent ultrices. Pellentesque ligula luctus suscipit magna fermentum arcu quis. Molestie risus donec egestas suspendisse nostra per mi nisi nisi malesuada pulvinar fringilla. Hac curabitur ligula sollicitudin leo habitasse taciti facilisis inceptos porttitor commodo risus! Aptent at nisi morbi netus tempus? Cubilia dis commodo.</p>', 5),
(16, 'Molestie risus ', 'Sollicitudin turpis', '5', 'draft', 'b2.jpg', 'books,booklife,peace', 0, '2019-01-04', '<p><strong>Congue fermentum accumsan diam sem netus ultrices primis?Â </strong></p><p>Auctor inceptos purus <i>accumsan sem lectus cras quisque sed</i> ante curae; purus. Per imperdiet facilisis quam felis mi at rhoncus netus. Non ullamcorper ultricies senectus ipsum. <i>Consequat erat </i>potenti erat torquent eros duis laoreet faucibus sociis mauris aenean dignissim.Â </p><ul><li>Vehicula tristique orci; laoreet conubia metus luctus donec nisi.Â </li><li>Ligula nulla fames vestibulum ornare dolor.</li><li>Â Lacus cras eros fringilla blandit enim litora.Â </li></ul><p>Faucibus bibendum inceptos cubilia orci ullamcorper cras tristique. Lacinia himenaeos eleifend ad fermentum diam eu sed convallis odio mus sociis congue? Natoque gravida.</p>', 7),
(17, 'magna dapibus', 'Interdum etiam', '5', 'published', 'b5.jpg', 'city,citylife', 2, '2019-01-04', '<p><i>Congue fermentum accumsan diam sem netus ultrices primis?Â </i></p><blockquote><p>Auctor inceptos purus accumsan sem lectus cras quisque sed ante curae; purus.</p></blockquote><p>Â Per imperdiet facilisis quam felis mi at rhoncus netus. Non ullamcorper ultricies senectus ipsum. Consequat erat potenti erat torquent eros duis laoreet faucibus sociis mauris aenean dignissim.</p><p>Â Vehicula tristique orci; laoreet conubia metus luctus donec nisi. Ligula nulla fames vestibulum ornare dolor. Lacus cras eros fringilla blandit enim litora. Faucibus bibendum inceptos cubilia orci ullamcorper cras tristique. Lacinia himenaeos eleifend ad fermentum diam eu sed convallis odio mus sociis congue? <strong>Natoque gravida.</strong></p>', 10),
(19, 'Congue fermentum ', 'Fames ante', '2', 'published', 'b3.jpg', 'books', 2, '2019-01-04', '<blockquote><p>Sollicitudin turpis eu posuere vel consectetur mauris. Inceptos ligula malesuada primis, libero ac dis ridiculus metus vivamus?Â </p></blockquote><p>Sed convallis dignissim, mattis mus lacus metus. Quam suspendisse ridiculus faucibus. Fames ante accumsan porta mauris parturient pharetra, urna ornare leo mattis sit ullamcorper. Porta ut augue sodales odio.</p><ul><li>Â Cras ligula vehicula quis aenean tellus fringilla facilisi sodales facilisi porttitor dignissim aenean.</li><li>Â Primis netus tempus penatibus himenaeos facilisis consequat non sapien sit, interdum pulvinar mollis. Imperdiet et sapien sapien turpis. Lectus.</li></ul>', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `user_password` varchar(100) DEFAULT NULL,
  `user_firstname` varchar(100) DEFAULT NULL,
  `user_lastname` varchar(100) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_image` varchar(100) DEFAULT NULL,
  `user_role` varchar(100) NOT NULL,
  `randSalt` varchar(255) DEFAULT '$2y$10$iusesomecrazystrings22',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randSalt`) VALUES
(2, 'abc', '123', 'mler.', '', '1rj1@gmail.com', NULL, 'admin', NULL),
(4, 'suhina', '123', 'suhina', 'raina', 'suhina@gmail.com', NULL, 'admin', NULL),
(3, 'meghna', '$1$bieK2YtZ$OVBYhwt1jgXPO4k4apoou.', 'meghna', 'raina', 'm@gmail.com', NULL, 'admin', NULL),
(5, 'hjks', '$1$qSxfLvR4$pBVU0N.YBjFF51FxtET.D.', 'mlca', 'xs.,a d.', '1rjsingh1@gmail.com', NULL, 'admin', NULL),
(6, 'fdyjs', '$1$oOR14bUh$hCtLSK.1ebMgpwFDZITBm0', '', '', '1rj1@gmail.com', NULL, 'admin\r\n', '$2y$10$iusesomecrazystrings22'),
(7, 'suhina', '$1$I758o.K1$znhHOMmlrWF2YxDt/IYPB1', NULL, NULL, 's@gmail.com', NULL, 'admin', '$2y$10$iusesomecrazystrings22');

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

DROP TABLE IF EXISTS `users_online`;
CREATE TABLE IF NOT EXISTS `users_online` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_online`
--

INSERT INTO `users_online` (`id`, `session`, `time`) VALUES
(1, 'vi6vt0361pp5h8gqnju2abia7g', 1546540927),
(2, 'ig4gf4ilt4fjno0opierko6f1p', 1546530264),
(3, 'ekar2am94mibl1inahuq1drjkn', 1546531709),
(4, 'fdonioe42mju1khlg3mvvp3qpt', 1546539456),
(5, 'fnk9rj72ojuat12bf8km38o0tc', 1546590382),
(6, '3ftnfrh9o79ljetf7ng09bhvpp', 1546589949),
(7, 'jksqvjqg9oie6es5df6h0ercee', 1546589643);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
