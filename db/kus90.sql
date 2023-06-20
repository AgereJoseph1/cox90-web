-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2018 at 05:45 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kus90`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `active` int(1) NOT NULL,
  `addedby` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `location` varchar(200) NOT NULL,
  `dateadded` datetime NOT NULL,
  `contact` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(200) NOT NULL,
  `lastlogin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `email`, `password`, `active`, `addedby`, `username`, `location`, `dateadded`, `contact`, `description`, `image`, `lastlogin`) VALUES
(1, 'xela', 'haippa', 'alexb4900@gmail.com', '056eafe7cf52220de2df36845b8ed170c67e23e3', 1, 'admin', 'haippa de xe', 'accra', '2018-02-04 00:00:00', '0550359588', 'Nullam quis massa sit amet nibh viverra malesuada. Nunc sem lacus, accumsan quis, faucibus non, congue vel.Nullam quis massa sit amet nibh viverra malesuada. Nunc sem lacus, accumsan quis, faucibus non, congue vel.Nullam quis massa sit amet nibh viverra malesuada. Nunc sem lacus, accumsan quis, faucibus non, congue ', 'xela_1525721649.jpg', '2018-12-17 06:50:22');

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `image` varchar(200) NOT NULL,
  `url` varchar(200) NOT NULL,
  `expire` varchar(100) NOT NULL,
  `expiretimestamp` int(11) NOT NULL,
  `clicks` int(11) NOT NULL,
  `impression` int(11) NOT NULL,
  `shown` int(1) NOT NULL,
  `position` varchar(50) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `adder` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`id`, `title`, `image`, `url`, `expire`, `expiretimestamp`, `clicks`, `impression`, `shown`, `position`, `date_added`, `adder`) VALUES
(1, 'ad1', 'ad1_1525213168.jpg', 'ad1', '2018-05-18', 1526594400, 3, 4607, 0, 'header', '2018-05-15 18:07:20', ''),
(3, 'ad2', 'ad2_1525277882.jpg', 'ad2', '2018-05-16', 1526421600, 1, 2096, 0, 'aside-bottom', '2018-05-15 14:55:22', ''),
(4, 'qweqw', 'qweqw_1525602992.jpg', 'qweqw', '2018-05-17', 1526508000, 0, 6535, 0, 'page-bottom', '2018-05-15 18:13:17', ''),
(5, 'asidetop', 'asidetop_1525967965.jpg', '', '2018-05-16', 1526421600, 3, 2156, 0, 'aside-top', '2018-05-15 14:55:13', '');

-- --------------------------------------------------------

--
-- Table structure for table `albumimages`
--

CREATE TABLE `albumimages` (
  `ID` int(11) NOT NULL,
  `img_name` varchar(200) NOT NULL,
  `img_album_id` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `ext` varchar(15) NOT NULL,
  `user` varchar(100) NOT NULL,
  `dateadded` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `albumimages`
--

INSERT INTO `albumimages` (`ID`, `img_name`, `img_album_id`, `timestamp`, `ext`, `user`, `dateadded`) VALUES
(33, '6_1532108079494.jpg', 6, 0, 'jpg', '', '2018-07-20 17:34:39'),
(34, '6_1532108079724.jpg', 6, 0, 'jpg', '', '2018-07-20 17:34:39'),
(35, '6_1532108080942.jpg', 6, 0, 'jpg', '', '2018-07-20 17:34:40'),
(36, '6_1532108080781.jpg', 6, 0, 'jpg', '', '2018-07-20 17:34:40'),
(37, '6_153210808012.jpg', 6, 0, 'jpg', '', '2018-07-20 17:34:40'),
(38, '6_1532108080371.jpg', 6, 0, 'jpg', '', '2018-07-20 17:34:40'),
(39, '7_1532108089133.jpg', 7, 0, 'jpg', '', '2018-07-20 17:34:49'),
(40, '7_1532108089628.jpg', 7, 0, 'jpg', '', '2018-07-20 17:34:49'),
(41, '7_1532108089945.jpg', 7, 0, 'jpg', '', '2018-07-20 17:34:49'),
(42, '7_1532108089864.jpg', 7, 0, 'jpg', '', '2018-07-20 17:34:49'),
(43, '8_1532108093655.jpg', 8, 0, 'jpg', '', '2018-07-20 17:34:53'),
(44, '8_1532108093866.jpg', 8, 0, 'jpg', '', '2018-07-20 17:34:53'),
(45, '8_1532108094942.jpg', 8, 0, 'jpg', '', '2018-07-20 17:34:54'),
(46, '8_1532108094258.jpg', 8, 0, 'jpg', '', '2018-07-20 17:34:54'),
(47, '10_1532108109399.jpg', 10, 0, 'jpg', '', '2018-07-20 17:35:09'),
(48, '10_1532108109607.jpg', 10, 0, 'jpg', '', '2018-07-20 17:35:09'),
(49, '10_1532108109927.jpg', 10, 0, 'jpg', '', '2018-07-20 17:35:09'),
(50, '10_1532108109423.jpg', 10, 0, 'jpg', '', '2018-07-20 17:35:09'),
(51, '10_1532108109471.jpg', 10, 0, 'jpg', '', '2018-07-20 17:35:09'),
(52, '10_1532108109574.jpg', 10, 0, 'jpg', '', '2018-07-20 17:35:09');

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `album_ID` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `url_title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `album_dateadded` varchar(100) NOT NULL,
  `album_user` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`album_ID`, `timestamp`, `name`, `url_title`, `description`, `album_dateadded`, `album_user`, `image`) VALUES
(6, 1532108024, 'album 1', 'album-1', '<p>sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora.<br></p>', '2018-07-20 17:33:44', '', 'album-1_1532108024.jpg'),
(7, 1532108040, 'album 2', 'album-2', '<p>sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora.<br></p>', '2018-07-20 17:34:00', '', 'album-2_1532108040.jpg'),
(8, 1532108050, 'album 3', 'album-3', '<p>sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora.<br></p>', '2018-07-20 17:34:10', '', 'album-3_1532108050.jpg'),
(9, 1532108057, 'album 4', 'album-4', '<p>sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora.<br></p>', '2018-07-20 17:34:17', '', 'album-4_1532108057.jpg'),
(10, 1532108065, 'album 5', 'album-5', '<p><br></p>', '2018-07-20 17:34:25', '', 'album-5_1532108065.jpg'),
(11, 1532108072, 'album 6', 'album-6', '<p><br></p>', '2018-07-20 17:34:32', '', 'album-6_1532108072.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `apps_countries`
--

CREATE TABLE `apps_countries` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `apps_countries`
--

INSERT INTO `apps_countries` (`id`, `country_code`, `country_name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'DS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua and Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei Darussalam'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CG', 'Congo'),
(50, 'CK', 'Cook Islands'),
(51, 'CR', 'Costa Rica'),
(52, 'HR', 'Croatia (Hrvatska)'),
(53, 'CU', 'Cuba'),
(54, 'CY', 'Cyprus'),
(55, 'CZ', 'Czech Republic'),
(56, 'DK', 'Denmark'),
(57, 'DJ', 'Djibouti'),
(58, 'DM', 'Dominica'),
(59, 'DO', 'Dominican Republic'),
(60, 'TP', 'East Timor'),
(61, 'EC', 'Ecuador'),
(62, 'EG', 'Egypt'),
(63, 'SV', 'El Salvador'),
(64, 'GQ', 'Equatorial Guinea'),
(65, 'ER', 'Eritrea'),
(66, 'EE', 'Estonia'),
(67, 'ET', 'Ethiopia'),
(68, 'FK', 'Falkland Islands (Malvinas)'),
(69, 'FO', 'Faroe Islands'),
(70, 'FJ', 'Fiji'),
(71, 'FI', 'Finland'),
(72, 'FR', 'France'),
(73, 'FX', 'France, Metropolitan'),
(74, 'GF', 'French Guiana'),
(75, 'PF', 'French Polynesia'),
(76, 'TF', 'French Southern Territories'),
(77, 'GA', 'Gabon'),
(78, 'GM', 'Gambia'),
(79, 'GE', 'Georgia'),
(80, 'DE', 'Germany'),
(81, 'GH', 'Ghana'),
(82, 'GI', 'Gibraltar'),
(83, 'GK', 'Guernsey'),
(84, 'GR', 'Greece'),
(85, 'GL', 'Greenland'),
(86, 'GD', 'Grenada'),
(87, 'GP', 'Guadeloupe'),
(88, 'GU', 'Guam'),
(89, 'GT', 'Guatemala'),
(90, 'GN', 'Guinea'),
(91, 'GW', 'Guinea-Bissau'),
(92, 'GY', 'Guyana'),
(93, 'HT', 'Haiti'),
(94, 'HM', 'Heard and Mc Donald Islands'),
(95, 'HN', 'Honduras'),
(96, 'HK', 'Hong Kong'),
(97, 'HU', 'Hungary'),
(98, 'IS', 'Iceland'),
(99, 'IN', 'India'),
(100, 'IM', 'Isle of Man'),
(101, 'ID', 'Indonesia'),
(102, 'IR', 'Iran (Islamic Republic of)'),
(103, 'IQ', 'Iraq'),
(104, 'IE', 'Ireland'),
(105, 'IL', 'Israel'),
(106, 'IT', 'Italy'),
(107, 'CI', 'Ivory Coast'),
(108, 'JE', 'Jersey'),
(109, 'JM', 'Jamaica'),
(110, 'JP', 'Japan'),
(111, 'JO', 'Jordan'),
(112, 'KZ', 'Kazakhstan'),
(113, 'KE', 'Kenya'),
(114, 'KI', 'Kiribati'),
(115, 'KP', 'Korea, Democratic People''s Republic of'),
(116, 'KR', 'Korea, Republic of'),
(117, 'XK', 'Kosovo'),
(118, 'KW', 'Kuwait'),
(119, 'KG', 'Kyrgyzstan'),
(120, 'LA', 'Lao People''s Democratic Republic'),
(121, 'LV', 'Latvia'),
(122, 'LB', 'Lebanon'),
(123, 'LS', 'Lesotho'),
(124, 'LR', 'Liberia'),
(125, 'LY', 'Libyan Arab Jamahiriya'),
(126, 'LI', 'Liechtenstein'),
(127, 'LT', 'Lithuania'),
(128, 'LU', 'Luxembourg'),
(129, 'MO', 'Macau'),
(130, 'MK', 'Macedonia'),
(131, 'MG', 'Madagascar'),
(132, 'MW', 'Malawi'),
(133, 'MY', 'Malaysia'),
(134, 'MV', 'Maldives'),
(135, 'ML', 'Mali'),
(136, 'MT', 'Malta'),
(137, 'MH', 'Marshall Islands'),
(138, 'MQ', 'Martinique'),
(139, 'MR', 'Mauritania'),
(140, 'MU', 'Mauritius'),
(141, 'TY', 'Mayotte'),
(142, 'MX', 'Mexico'),
(143, 'FM', 'Micronesia, Federated States of'),
(144, 'MD', 'Moldova, Republic of'),
(145, 'MC', 'Monaco'),
(146, 'MN', 'Mongolia'),
(147, 'ME', 'Montenegro'),
(148, 'MS', 'Montserrat'),
(149, 'MA', 'Morocco'),
(150, 'MZ', 'Mozambique'),
(151, 'MM', 'Myanmar'),
(152, 'NA', 'Namibia'),
(153, 'NR', 'Nauru'),
(154, 'NP', 'Nepal'),
(155, 'NL', 'Netherlands'),
(156, 'AN', 'Netherlands Antilles'),
(157, 'NC', 'New Caledonia'),
(158, 'NZ', 'New Zealand'),
(159, 'NI', 'Nicaragua'),
(160, 'NE', 'Niger'),
(161, 'NG', 'Nigeria'),
(162, 'NU', 'Niue'),
(163, 'NF', 'Norfolk Island'),
(164, 'MP', 'Northern Mariana Islands'),
(165, 'NO', 'Norway'),
(166, 'OM', 'Oman'),
(167, 'PK', 'Pakistan'),
(168, 'PW', 'Palau'),
(169, 'PS', 'Palestine'),
(170, 'PA', 'Panama'),
(171, 'PG', 'Papua New Guinea'),
(172, 'PY', 'Paraguay'),
(173, 'PE', 'Peru'),
(174, 'PH', 'Philippines'),
(175, 'PN', 'Pitcairn'),
(176, 'PL', 'Poland'),
(177, 'PT', 'Portugal'),
(178, 'PR', 'Puerto Rico'),
(179, 'QA', 'Qatar'),
(180, 'RE', 'Reunion'),
(181, 'RO', 'Romania'),
(182, 'RU', 'Russian Federation'),
(183, 'RW', 'Rwanda'),
(184, 'KN', 'Saint Kitts and Nevis'),
(185, 'LC', 'Saint Lucia'),
(186, 'VC', 'Saint Vincent and the Grenadines'),
(187, 'WS', 'Samoa'),
(188, 'SM', 'San Marino'),
(189, 'ST', 'Sao Tome and Principe'),
(190, 'SA', 'Saudi Arabia'),
(191, 'SN', 'Senegal'),
(192, 'RS', 'Serbia'),
(193, 'SC', 'Seychelles'),
(194, 'SL', 'Sierra Leone'),
(195, 'SG', 'Singapore'),
(196, 'SK', 'Slovakia'),
(197, 'SI', 'Slovenia'),
(198, 'SB', 'Solomon Islands'),
(199, 'SO', 'Somalia'),
(200, 'ZA', 'South Africa'),
(201, 'GS', 'South Georgia South Sandwich Islands'),
(202, 'SS', 'South Sudan'),
(203, 'ES', 'Spain'),
(204, 'LK', 'Sri Lanka'),
(205, 'SH', 'St. Helena'),
(206, 'PM', 'St. Pierre and Miquelon'),
(207, 'SD', 'Sudan'),
(208, 'SR', 'Suriname'),
(209, 'SJ', 'Svalbard and Jan Mayen Islands'),
(210, 'SZ', 'Swaziland'),
(211, 'SE', 'Sweden'),
(212, 'CH', 'Switzerland'),
(213, 'SY', 'Syrian Arab Republic'),
(214, 'TW', 'Taiwan'),
(215, 'TJ', 'Tajikistan'),
(216, 'TZ', 'Tanzania, United Republic of'),
(217, 'TH', 'Thailand'),
(218, 'TG', 'Togo'),
(219, 'TK', 'Tokelau'),
(220, 'TO', 'Tonga'),
(221, 'TT', 'Trinidad and Tobago'),
(222, 'TN', 'Tunisia'),
(223, 'TR', 'Turkey'),
(224, 'TM', 'Turkmenistan'),
(225, 'TC', 'Turks and Caicos Islands'),
(226, 'TV', 'Tuvalu'),
(227, 'UG', 'Uganda'),
(228, 'UA', 'Ukraine'),
(229, 'AE', 'United Arab Emirates'),
(230, 'GB', 'United Kingdom'),
(231, 'US', 'United States'),
(232, 'UM', 'United States minor outlying islands'),
(233, 'UY', 'Uruguay'),
(234, 'UZ', 'Uzbekistan'),
(235, 'VU', 'Vanuatu'),
(236, 'VA', 'Vatican City State'),
(237, 'VE', 'Venezuela'),
(238, 'VN', 'Vietnam'),
(239, 'VG', 'Virgin Islands (British)'),
(240, 'VI', 'Virgin Islands (U.S.)'),
(241, 'WF', 'Wallis and Futuna Islands'),
(242, 'EH', 'Western Sahara'),
(243, 'YE', 'Yemen'),
(244, 'ZR', 'Zaire'),
(245, 'ZM', 'Zambia'),
(246, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `url_title` varchar(100) NOT NULL,
  `date_added` varchar(100) NOT NULL,
  `adder` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `url_title`, `date_added`, `adder`) VALUES
(25, 'HAIR', 'HAIR', '2018-12-17 09:03:00', 'xela haippa'),
(26, 'MISC', 'MISC', '2018-12-17 09:03:32', 'xela haippa'),
(27, 'FACE', 'FACE', '2018-12-17 09:03:13', 'xela haippa'),
(28, 'BODY', 'BODY', '2018-12-17 09:03:22', 'xela haippa');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `ID` int(11) NOT NULL,
  `comment_text` text NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `news_id` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `approved` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`ID`, `comment_text`, `user_name`, `email`, `date_added`, `news_id`, `timestamp`, `approved`) VALUES
(60, 'Nullam quis massa sit amet nibh viverra malesuada. Nunc sem lacus, accumsan quis, faucibus non, congue vel.Nullam quis massa sit amet nibh viverra malesuada. Nunc sem lacus, accumsan quis, faucibus non, congue vel.Nullam quis massa sit amet nibh viverra malesuada. Nunc sem lacus, accumsan quis, faucibus non, congue vel.', 'second ', 'aaa', '2018-05-10 17:43:46', 3, 1, 1),
(64, 'sdfsafsd', 'sdfsd', 'dfdsf', '2018-05-10 17:43:48', 4, 1, 1),
(65, 'dsfsdf', 'sds', 'dsfds', '2018-05-10 17:43:51', 3, 1, 1),
(66, 'zxczxczx', 'xzczxc', 'fvvczxc', '2018-05-10 17:43:54', 3, 1, 1),
(67, 'asdsa', 'asd', 'asda', '2018-05-10 17:43:59', 5, 1, 1),
(68, 'sdfdsf', 'dsfds', 'sdfds', '2018-05-10 17:44:01', 7, 1, 1),
(69, 'sdfdsf', 'dsfds', 'sdfds', '2018-05-10 17:44:05', 7, 1, 1),
(71, 'as', 'as', 'sss@n.co', '2018-05-10 17:44:11', 6, 1, 0),
(72, '&lt;SCRIPT&gt; ALERT(''TEST''); &lt;/SCRIPT&gt;', 'aaa', 'a@m.com', '2018-05-15 16:21:43', 7, 1526401292, 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `city` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `school_sub` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `subject`, `message`, `date`, `name`, `phone`, `email`, `city`, `status`, `school_sub`) VALUES
(7, '', '   ', '2018-11-20 21:28:50', 'cdsd', '0', 'alexb4900@gmail.com', '', '', ''),
(8, '', '   ', '2018-11-20 21:29:06', 'xela haippa', '0', 'alexb4900@gmail.com', '', '', ''),
(9, '', 'asda', '2018-12-16 15:40:51', 'sds', '0', 'alexb4900@gmail.com', '', '', ''),
(10, '', 'asa', '2018-12-16 15:45:09', 'xela haippa', '', 'alexb4900@gmail.com', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `address` varchar(255) NOT NULL,
  `town` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `active` int(1) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `validation_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `fullname`, `first_name`, `last_name`, `username`, `email`, `phone`, `address`, `town`, `country`, `password`, `active`, `image`, `date`, `validation_code`) VALUES
(6, 'xela haippa', '', '', 'xela', 'alexb4900@gmail.com', '0550359588', 'east legon', '', '', 'c9ac62d45d69eabf8e8aca3d96699ba43aa57872', 1, '', '2018-11-19 18:13:24', '502b97a839a97ffbc639ca82c4338f98');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `ID` varchar(200) NOT NULL,
  `image1` varchar(200) NOT NULL,
  `image2` varchar(200) NOT NULL,
  `image3` varchar(200) NOT NULL,
  `image4` varchar(200) NOT NULL,
  `image5` varchar(200) NOT NULL,
  `image6` varchar(200) NOT NULL,
  `image7` varchar(200) NOT NULL,
  `image8` varchar(200) NOT NULL,
  `image9` varchar(200) NOT NULL,
  `image10` varchar(200) NOT NULL,
  `image11` varchar(200) NOT NULL,
  `image12` varchar(200) NOT NULL,
  `image1active` int(11) NOT NULL,
  `image2active` int(11) NOT NULL,
  `image3active` int(11) NOT NULL,
  `image4active` int(11) NOT NULL,
  `image5active` int(11) NOT NULL,
  `image6active` int(11) NOT NULL,
  `image7active` int(11) NOT NULL,
  `image8active` int(11) NOT NULL,
  `image9active` int(11) NOT NULL,
  `image10active` int(11) NOT NULL,
  `image11active` int(11) NOT NULL,
  `image12active` int(11) NOT NULL,
  `title1` text NOT NULL,
  `title2` text NOT NULL,
  `title3` text NOT NULL,
  `title4` text NOT NULL,
  `title5` text NOT NULL,
  `title6` text NOT NULL,
  `title7` text NOT NULL,
  `title8` text NOT NULL,
  `title9` text NOT NULL,
  `title10` text NOT NULL,
  `title11` text NOT NULL,
  `title12` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `list_tags`
--

CREATE TABLE `list_tags` (
  `id` varchar(200) NOT NULL,
  `list` longtext NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list_tags`
--

INSERT INTO `list_tags` (`id`, `list`, `date`) VALUES
('study in china courses', '', '2018-07-06 07:51:45'),
('study in china universities', '', '2018-07-06 07:51:45'),
('study in usa courses', '', '2018-07-06 07:51:45');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` longtext NOT NULL,
  `keywords` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `audio` varchar(200) NOT NULL,
  `video` varchar(200) NOT NULL,
  `media` varchar(200) NOT NULL,
  `media_format` varchar(200) NOT NULL,
  `url_title` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `tags` text NOT NULL,
  `views` int(11) NOT NULL,
  `likes` int(11) NOT NULL,
  `author` varchar(100) NOT NULL,
  `featured_news` int(1) DEFAULT NULL,
  `breaking_news` int(1) DEFAULT NULL,
  `trending_news` int(1) DEFAULT NULL,
  `top_stories` int(1) NOT NULL,
  `carousel_small_news` int(1) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `type` varchar(50) NOT NULL DEFAULT 'news'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_emails`
--

CREATE TABLE `newsletter_emails` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletter_emails`
--

INSERT INTO `newsletter_emails` (`id`, `email`, `date`) VALUES
(8, 'q@m.c', '2018-11-20 20:57:14'),
(9, 'q@m.c', '2018-11-20 20:57:35');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `phone2` varchar(200) NOT NULL,
  `order_notes` text NOT NULL,
  `town` varchar(200) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `grand_total` double(10,2) NOT NULL,
  `delivery_fee` int(11) NOT NULL,
  `order_status` int(1) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `payment_status` int(1) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `first_name`, `last_name`, `fullname`, `address`, `phone`, `phone2`, `order_notes`, `town`, `customer_id`, `grand_total`, `delivery_fee`, `order_status`, `payment_method`, `payment_status`, `date`) VALUES
(23, '', '', 'Xela haippa', 'East legon', '0550359588', '', '', '', 6, 22.00, 5, 0, '', 0, '2018-11-19 23:22:58'),
(24, '', '', 'Xela haippa', 'East legon', '00', '', '', '', 6, 22.00, 5, 0, '', 0, '2018-11-19 23:27:15'),
(25, '', '', 'Xela haippa', 'East legon', '055035958', '', '', '', 6, 22.00, 5, 0, '', 1, '2018-11-20 00:00:30'),
(26, '', '', 'Xela haippa', 'madina', '0550359588', '', '', 'zongo junction', 6, 3.00, 5, 0, '', 1, '2018-11-20 00:04:53'),
(27, '', '', 'xela haippa', 'east legon', '0550359588', '', '', 'accra', 0, 132.00, 5, 1, 'before-delivery', 1, '2018-11-25 15:23:24');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_price` double(10,2) NOT NULL,
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `product_name`, `product_id`, `product_quantity`, `product_price`, `order_id`, `customer_id`, `date`) VALUES
(1, 'Handle Poly Scoop', 1, 2, 10.26, 0, 1, '2018-07-23 19:08:21'),
(2, 'Lawn Mower', 2, 3, 15.26, 0, 1, '2018-07-23 19:08:21'),
(3, 'Handle Poly Scoop', 1, 2, 10.26, 0, 1, '2018-07-23 19:08:45'),
(4, 'Lawn Mower', 2, 3, 15.26, 0, 1, '2018-07-23 19:08:45'),
(5, 'Handle Poly Scoop', 1, 2, 10.26, 5, 1, '2018-07-23 19:09:40'),
(6, 'Lawn Mower', 2, 3, 15.26, 5, 1, '2018-07-23 19:09:40'),
(7, 'Handle Poly Scoop', 1, 2, 10.26, 6, 1, '2018-07-23 19:10:43'),
(8, 'Lawn Mower', 2, 3, 15.26, 6, 1, '2018-07-23 19:10:43'),
(9, 'Handle Poly Scoop', 1, 2, 10.26, 7, 1, '2018-07-23 19:15:59'),
(10, 'Lawn Mower', 2, 3, 15.26, 7, 1, '2018-07-23 19:15:59'),
(11, 'Handle Poly Scoop', 1, 2, 10.26, 8, 1, '2018-07-23 19:17:00'),
(12, 'Lawn Mower', 2, 3, 15.26, 8, 1, '2018-07-23 19:17:00'),
(13, 'Handle Poly Scoop', 1, 2, 10.26, 9, 1, '2018-07-23 19:18:26'),
(14, 'Lawn Mower', 2, 3, 15.26, 9, 1, '2018-07-23 19:18:26'),
(15, 'Handle Poly Scoop', 1, 1, 10.26, 10, 1, '2018-07-23 19:24:14'),
(16, 'Handle Poly Scoop', 1, 1, 10.26, 12, 1, '2018-07-23 19:25:50'),
(17, 'Lawn Mower', 2, 1, 15.26, 12, 1, '2018-07-23 19:25:50'),
(18, 'Handle Poly Scoop', 1, 1, 10.26, 14, 1, '2018-07-23 19:26:50'),
(19, 'Lawn Mower', 2, 1, 15.26, 16, 1, '2018-07-23 19:27:27'),
(20, 'Lawn Mower', 2, 1, 15.26, 17, 1, '2018-07-23 19:29:20'),
(21, 'Handle Poly Scoop', 1, 1, 10.26, 18, 1, '2018-07-23 19:29:54'),
(22, 'Handle Poly Scoop', 1, 1, 10.26, 19, 1, '2018-07-23 19:30:24'),
(24, 'Handle Poly Scoop', 1, 1, 10.26, 21, 1, '2018-07-23 19:32:02'),
(25, 'Handle Poly Scoop', 1, 1, 10.00, 22, 6, '2018-11-19 23:06:42'),
(26, 'new grass', 5, 1, 22.00, 22, 6, '2018-11-19 23:06:42'),
(27, 'new grass', 5, 1, 22.00, 23, 6, '2018-11-19 23:22:59'),
(28, 'new grass', 5, 1, 22.00, 24, 6, '2018-11-19 23:27:15'),
(29, 'new grass', 5, 1, 22.00, 25, 6, '2018-11-20 00:00:30'),
(30, 'oil product', 6, 1, 3.00, 26, 6, '2018-11-20 00:04:53'),
(31, '', 7, 4, 33.00, 27, 0, '2018-11-25 15:23:24');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` varchar(50) NOT NULL,
  `content` longtext NOT NULL,
  `image` varchar(200) NOT NULL,
  `color` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `content`, `image`, `color`) VALUES
('About-us', '<p style="margin-left:0in; margin-right:0in"><span style="color:#e7496a"><span style="font-size:22px"><span style="font-family:Calibri,sans-serif"><strong>WHAT IS COS90 COSMETICS ?</strong></span></span></span></p>\n\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:20px"><span style="font-family:Calibri,sans-serif">Cos90 cosmetics is an online store which sells and deliver nationwide, all sorts of cosmetic, wellness and beauty products of various local and exotic brands. We are based in Accra, Ghana (West Africa)</span></span></p>\n\n<p style="margin-left:0in; margin-right:0in">&nbsp;</p>\n\n<p style="margin-left:0in; margin-right:0in"><span style="color:#e7496a"><span style="font-size:22px"><span style="font-family:Calibri,sans-serif"><strong>WHAT WE DO ?</strong></span></span></span></p>\n\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:20px"><span style="font-family:Calibri,sans-serif">Most importantly, we go through a great ordeal to help you make great choices when it comes to cosmetic products. We are a premium online store that aims to bring together the finest products as we find them. Our choices are influenced by in-depth research into the latest trends and development of new formulas and of course by customer demand. We offer a selection of beauty products as incredible as they are cutting edge.</span></span></p>\n\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:20px"><span style="font-family:Calibri,sans-serif">We have a service team of beauty experts who are ready to help you out via live chat (email, phone or social media).</span></span></p>\n\n<p style="margin-left:0in; margin-right:0in">&nbsp;</p>\n\n<p style="margin-left:0in; margin-right:0in"><span style="color:#e7496a"><span style="font-size:22px"><span style="font-family:Calibri,sans-serif"><strong>WHY WE DO IT</strong></span></span></span></p>\n\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:20px"><span style="font-family:Calibri,sans-serif">With beauty comes self-confidence and elegance that will give you a boost to perform better in life. We think that you, our beloved customer, are entitled to stepping out each day full of confidence and elegance. We are also determined to pull every string to provide and deliver nothing short of the best to you with little or no effort from you if not just a few clicks. In short, we want you to feel special every day; and we want to give you the empowering beauty shopping experience that you deserve.</span></span></p>\n\n<p style="margin-left:0in; margin-right:0in">&nbsp;</p>\n\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:20px"><span style="font-family:Calibri,sans-serif">The Cos90 cosmetics online platform and utilities are built and maintained by <a href="http://hdxdev.tech" target="_blank">HdxDev&nbsp;Technologies&nbsp;</a>Accra, Ghana.</span></span></p>\n', '', ''),
('banner header text', '<p>GOOD GIRL<br />\nJUST&nbsp;<span style="color:#ee2b63">â‚µ70</span></p>\n', '', ''),
('banner main text', '<p>This lively oriental perfume is both sexy and feminine and boasts a commanding tuberose and jasmine floral combined with roasted tonka bean, a scent that blends hints of vanilla, cinnamon, almond, and clove.&nbsp;</p>\n', '', ''),
('banner top text', '<p>wow ! supers avalable</p>\n', '', ''),
('Contact-us', '', '', ''),
('guest checkout text', '', '', ''),
('Privacy Policy', '<p><strong>SECTION 1 - WHAT DO WE DO WITH YOUR INFORMATION?</strong></p>\n\n<p>When you purchase something from our store, as part of the buying and selling process, we collect the personal information you give us such as your name, address and email address.</p>\n\n<p>When you browse our store, we also automatically receive your computer&rsquo;s internet protocol (IP) address in order to provide us with information that helps us learn about your browser and operating system.</p>\n\n<p>Email marketing (if applicable): With your permission, we may send you emails about our store, new products and other updates.</p>\n\n<p><br />\n<strong>SECTION 2 - CONSENT</strong></p>\n\n<p>How do you get my consent?</p>\n\n<p>When you provide us with personal information to complete a transaction, verify your credit card, place an order, arrange for a delivery or return a purchase, we imply that you consent to our collecting it and using it for that specific reason only.</p>\n\n<p>If we ask for your personal information for a secondary reason, like marketing, we will either ask you directly for your expressed consent, or provide you with an opportunity to say no.</p>\n\n<p><br />\n<strong>SECTION 3 - DISCLOSURE</strong></p>\n\n<p>We may disclose your personal information if we are required by law to do so or if you violate our Terms of Service.</p>\n\n<p><br />\n<strong>Payment:</strong></p>\n\n<p>If you choose a direct payment gateway to complete your purchase, then cox90 stores your credit card data. It is encrypted through the Payment Card Industry Data Security Standard (PCI-DSS). Your purchase transaction data is stored only as long as is necessary to complete your purchase transaction. After that is complete, your purchase transaction information is deleted.</p>\n\n<p>All direct payment gateways adhere to the standards set by PCI-DSS as managed by the PCI Security Standards Council, which is a joint effort of brands like Visa, MasterCard, American Express and Discover.</p>\n\n<p>PCI-DSS requirements help ensure the secure handling of credit card information by our store and its service providers.</p>\n\n<p>For more insight, you may also want to read Cox90&rsquo;s Terms of Service here or Privacy Statement here.</p>\n\n<p><br />\n<strong>SECTION 5 - THIRD-PARTY SERVICES</strong></p>\n\n<p><br />\nIn general, the third-party providers used by us will only collect, use and disclose your information to the extent necessary to allow them to perform the services they provide to us.</p>\n\n<p>However, certain third-party service providers, such as payment gateways and other payment transaction processors, have their own privacy policies in respect to the information we are required to provide to them for your purchase-related transactions.</p>\n\n<p>For these providers, we recommend that you read their privacy policies so you can understand the manner in which your personal information will be handled by these providers.</p>\n\n<p>In particular, remember that certain providers may be located in or have facilities that are located in a different jurisdiction than either you or us. So if you elect to proceed with a transaction that involves the services of a third-party service provider, then your information may become subject to the laws of the jurisdiction(s) in which that service provider or its facilities are located.</p>\n\n<p>As an example, if you are located in Canada and your transaction is processed by a payment gateway located in the United States, then your personal information used in completing that transaction may be subject to disclosure under United States legislation, including the Patriot Act.</p>\n\n<p>Once you leave our store&rsquo;s website or are redirected to a third-party website or application, you are no longer governed by this Privacy Policy or our website&rsquo;s Terms of Service.</p>\n\n<p>When you click on links on our store, they may direct you away from our site. We are not responsible for the privacy practices of other sites and encourage you to read their privacy statements.</p>\n\n<p><br />\n<strong>SECTION 6 - SECURITY</strong></p>\n\n<p>To protect your personal information, we take reasonable precautions and follow industry best practices to make sure it is not inappropriately lost, misused, accessed, disclosed, altered or destroyed.</p>\n\n<p>If you provide us with your credit card information, the information is encrypted using secure socket layer technology (SSL) and stored with a AES-256 encryption. Although no method of transmission over the Internet or electronic storage is 100% secure, we follow all PCI-DSS requirements and implement additional generally accepted industry standards.</p>\n\n<p><br />\n<strong>COOKIES</strong></p>\n\n<p>Here is a list of cookies that we use. We&rsquo;ve listed them here so you can choose if you want to opt-out of cookies or not.</p>\n\n<p>_session_id, unique token, sessional, Allows cox90 to store information about your session (referrer, landing page, etc).</p>\n\n<p>_cox90_visit, no data held, Persistent for 30 minutes from the last visit, Used by our website provider&rsquo;s internal stats tracker to record the number of visits</p>\n\n<p>_cox90_uniq, no data held, expires midnight (relative to the visitor) of the next day, Counts the number of visits to a store by a single customer.</p>\n\n<p>cart, unique token, persistent for 2 weeks, Stores information about the contents of your cart.</p>\n\n<p>_secure_session_id, unique token, sessional</p>\n\n<p>storefront_digest, unique token, indefinite If the shop has a password, this is used to determine if the current visitor has access.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>SECTION 7 - AGE OF CONSENT</strong></p>\n\n<p>By using this site, you represent that you are at least the age of majority in your state or province of residence, or that you are the age of majority in your state or province of residence and you have given us your consent to allow any of your minor dependents to use this site.</p>\n\n<p><br />\n<strong>SECTION 8 - CHANGES TO THIS PRIVACY POLICY</strong></p>\n\n<p>We reserve the right to modify this privacy policy at any time, so please review it frequently. Changes and clarifications will take effect immediately upon their posting on the website. If we make material changes to this policy, we will notify you here that it has been updated, so that you are aware of what information we collect, how we use it, and under what circumstances, if any, we use and/or disclose it.</p>\n\n<p>If our store is acquired or merged with another company, your information may be transferred to the new owners so that we may continue to sell products to you.</p>\n\n<p><br />\n<strong>QUESTIONS AND CONTACT INFORMATION</strong></p>\n\n<p>If you would like to: access, correct, amend or delete any personal information we have about you, register a complaint, or simply want more information contact our Privacy Compliance Officer at contact@cox90.com</p>\n\n<p>[Re: Privacy Compliance Officer]</p>\n\n<p>Madina, Accra, AA, 00233, Ghana]</p>\n', '', ''),
('Terms and Conditions', '<p style="margin-bottom: 18px; padding-right: 20px; padding-left: 20px; line-height: 20px; letter-spacing: normal; color: rgb(153, 153, 153); font-family: Lato, sans-serif;">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo. Suspendisse potenti. Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero eu augue. Morbi purus libero, faucibus adipiscing, commodo quis, gravida id, est. Sed lectus. Praesent elementum hendrerit tortor. Sed semper lorem at felis.&nbsp;<a href="http://localhost/blog/#" style="color: rgb(244, 67, 54); text-decoration-line: underline; display: inline-block; transition: all 0.2s ease-in-out;">Vestibulum volutpat</a>, lacus a ultrices sagittis, mi neque euismod dui, eu pulvinar nunc sapien ornare nisl. Phasellus pede arcu, dapibus eu, fermentum et, dapibus sed, urna.</p><p style="margin-bottom: 18px; padding-right: 20px; padding-left: 20px; line-height: 20px; letter-spacing: normal; color: rgb(153, 153, 153); font-family: Lato, sans-serif;">Morbi interdum mollis sapien. Sed ac risus. Phasellus lacinia, magna a ullamcorper laoreet, lectus arcu pulvinar risus, vitae facilisis libero dolor a purus. Sed vel lacus. Mauris nibh felis, adipiscing varius, adipiscing in, lacinia vel, tellus. Suspendisse ac urna. Etiam pellentesque mauris ut lectus. Nunc tellus ante, mattis eget, gravida vitae, ultricies ac, leo. Integer leo pede, ornare a, lacinia eu, vulputate vel, nLorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo. Suspendisse potenti. Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero eu augue. Morbi purus libero, faucibus adipiscing, commodo quis, gravida id, est. Sed lectus. Praesent elementum hendrerit tortor. Sed semper lorem at felis.&nbsp;<a href="http://localhost/blog/#" style="background-color: rgb(255, 255, 255); color: rgb(244, 67, 54); text-decoration-line: underline; display: inline-block; transition: all 0.2s ease-in-out;">Vestibulum volutpat</a>, lacus a ultrices sagittis, mi neque euismod dui, eu pulvinar nunc sapien ornare nisl. Phasellus pede arcu, dapibus eu, fermentum et, dapibus sed, urna.</p><p style="margin-bottom: 18px; padding-right: 20px; padding-left: 20px; line-height: 20px; letter-spacing: normal; color: rgb(153, 153, 153); font-family: Lato, sans-serif;">Morbi interdum mollis sapien. Sed ac risus. Phasellus lacinia, magna a ullamcorper laoreet, lectus arcu pulvinar risus, vitae facilisis libero dolor a purus. Sed vel lacus. Mauris nibh felis, adipiscing varius, adipiscing in, lacinia vel, tellus. Suspendisse ac urna. Etiam pellentesque mauris ut lectus. Nunc tellus ante, mattis eget, gravida vitae, ultricies ac, leo. Integer leo pede, ornare a, lacinia eu, vulputate vel, nLorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo. Suspendisse potenti. Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero eu augue. Morbi purus libero, faucibus adipiscing, commodo quis, gravida id, est. Sed lectus. Praesent elementum hendrerit tortor. Sed semper lorem at felis.&nbsp;<a href="http://localhost/blog/#" style="background-color: rgb(255, 255, 255); color: rgb(244, 67, 54); text-decoration-line: underline; display: inline-block; transition: all 0.2s ease-in-out;">Vestibulum volutpat</a>, lacus a ultrices sagittis, mi neque euismod dui, eu pulvinar nunc sapien ornare nisl. Phasellus pede arcu, dapibus eu, fermentum et, dapibus sed, urna.</p><p style="margin-bottom: 18px; padding-right: 20px; padding-left: 20px; line-height: 20px; letter-spacing: normal; color: rgb(153, 153, 153); font-family: Lato, sans-serif;">Morbi interdum mollis sapien. Sed ac risus. Phasellus lacinia, magna a ullamcorper laoreet, lectus arcu pulvinar risus, vitae facilisis libero dolor a purus. Sed vel lacus. Mauris nibh felis, adipiscing varius, adipiscing in, lacinia vel, tellus. Suspendisse ac urna. Etiam pellentesque mauris ut lectus. Nunc tellus ante, mattis eget, gravida vitae, ultricies ac, leo. Integer leo pede, ornare a, lacinia eu, vulputate vel, nLorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo. Suspendisse potenti. Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero eu augue. Morbi purus libero, faucibus adipiscing, commodo quis, gravida id, est. Sed lectus. Praesent elementum hendrerit tortor. Sed semper lorem at felis.&nbsp;<a href="http://localhost/blog/#" style="background-color: rgb(255, 255, 255); color: rgb(244, 67, 54); text-decoration-line: underline; display: inline-block; transition: all 0.2s ease-in-out;">Vestibulum volutpat</a>, lacus a ultrices sagittis, mi neque euismod dui, eu pulvinar nunc sapien ornare nisl. Phasellus pede arcu, dapibus eu, fermentum et, dapibus sed, urna.</p><p style="margin-bottom: 18px; padding-right: 20px; padding-left: 20px; line-height: 20px; letter-spacing: normal; color: rgb(153, 153, 153); font-family: Lato, sans-serif;">Morbi interdum mollis sapien. Sed ac risus. Phasellus lacinia, magna a ullamcorper laoreet, lectus arcu pulvinar risus, vitae facilisis libero dolor a purus. Sed vel lacus. Mauris nibh felis, adipiscing varius, adipiscing in, lacinia vel, tellus. Suspendisse ac urna. Etiam pellentesque mauris ut lectus. Nunc tellus ante, mattis eget, gravida vitae, ultricies ac, leo. Integer leo pede, ornare a, lacinia eu, vulputate vel, n</p>\n', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `products_brands`
--

CREATE TABLE `products_brands` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url_title` varchar(255) NOT NULL,
  `adder` varchar(200) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_brands`
--

INSERT INTO `products_brands` (`id`, `title`, `url_title`, `adder`, `date`) VALUES
(2, 'olay', 'olay', 'xela haippa', '2018-11-18 09:10:33'),
(3, 'Sebamed', 'Sebamed', 'xela haippa', '2018-12-06 19:18:30'),
(4, 'Now Solutions', 'Now-Solutions', 'xela haippa', '2018-12-09 07:30:24'),
(5, 'NIVEA', 'NIVEA', 'xela haippa', '2018-12-10 07:19:14'),
(6, 'PALMER''S', 'PALMER-S', 'xela haippa', '2018-12-10 07:44:52'),
(7, 'Aperio Natural', 'Aperio-Natural', 'xela haippa', '2018-12-12 06:44:11'),
(8, 'Fair and White Paris', 'Fair-and-White-Paris', 'xela haippa', '2018-12-12 06:51:23'),
(9, 'FAIR &amp; WHITE', 'FAIR-amp-WHITE', 'xela haippa', '2018-12-13 14:36:47'),
(10, 'JERGENS', 'JERGENS', 'xela haippa', '2018-12-13 15:10:13'),
(11, 'AMBI', 'AMBI', 'xela haippa', '2018-12-13 17:00:23'),
(12, 'YES TO', 'YES-TO', 'xela haippa', '2018-12-13 17:20:49'),
(13, 'Clear Essence', 'Clear-Essence', 'xela haippa', '2018-12-13 21:30:02'),
(14, 'Bronz Tone', 'Bronz-Tone', 'xela haippa', '2018-12-13 22:10:58'),
(15, 'El-glittas', 'El-glittas', 'xela haippa', '2018-12-13 22:21:04'),
(16, 'Bodman', 'Bodman', 'xela haippa', '2018-12-13 22:37:33'),
(17, 'Pure White', 'Pure-White', 'xela haippa', '2018-12-13 22:38:09');

-- --------------------------------------------------------

--
-- Table structure for table `products_categories`
--

CREATE TABLE `products_categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url_title` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `adder` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_categories`
--

INSERT INTO `products_categories` (`id`, `title`, `url_title`, `date`, `adder`) VALUES
(6, 'Body products', 'Body-products', '2018-11-28 20:09:21', 'xela haippa'),
(7, 'Hair products', 'Hair-products', '2018-11-28 20:09:32', 'xela haippa'),
(8, 'Facial products', 'Facial-products', '2018-11-28 20:09:51', 'xela haippa');

-- --------------------------------------------------------

--
-- Table structure for table `products_subcategories`
--

CREATE TABLE `products_subcategories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url_title` varchar(255) NOT NULL,
  `main_category` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `adder` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_subcategories`
--

INSERT INTO `products_subcategories` (`id`, `title`, `url_title`, `main_category`, `date`, `adder`) VALUES
(7, 'Perfumes, Sprays, Deodorants &amp; Roll-ons', 'Perfumes-Sprays-Deodorants-amp-Roll-ons', 6, '2018-11-28 20:10:37', 'xela haippa'),
(8, 'Lotions &amp; creams', 'Lotions-amp-creams', 6, '2018-11-28 20:10:50', 'xela haippa'),
(9, 'Soaps', 'Soaps', 6, '2018-11-28 20:11:00', 'xela haippa'),
(10, 'Cleansers', 'Cleansers', 8, '2018-11-28 20:14:40', 'xela haippa'),
(11, 'soaps', 'soaps', 8, '2018-11-28 20:20:55', 'xela haippa'),
(12, 'Facial creams', 'Facial-creams', 8, '2018-11-28 20:21:19', 'xela haippa'),
(13, 'Pomade &amp; Oils', 'Pomade-amp-Oils', 7, '2018-11-28 20:21:31', 'xela haippa'),
(14, 'Shampoos &amp; Conditioners', 'Shampoos-amp-Conditioners', 7, '2018-11-28 20:21:54', 'xela haippa'),
(15, 'Accessories', 'Accessories', 7, '2018-11-28 20:22:08', 'xela haippa'),
(16, 'Wigs', 'Wigs', 7, '2018-11-28 20:22:24', 'xela haippa'),
(17, 'Hair Extensions', 'Hair-Extensions', 7, '2018-11-28 20:22:34', 'xela haippa'),
(18, 'Oils', 'Oils', 6, '2018-12-06 19:44:47', 'xela haippa'),
(19, 'Misc', 'Misc', 6, '2018-12-17 14:00:44', 'xela haippa');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `content`) VALUES
(1, 'Company name', 'Cox90 Beauty & Cosmetics'),
(2, 'Company description', 'Cos90 beauty and cosmetics is an online store which sells and deliver nationwide, all sorts of cosmetic, wellness and beauty products of various local and exotic brands. We are based in Accra, Ghana (West Africa)'),
(3, 'Address', 'Madina, Grater Accra, Ghana.'),
(4, 'Contact', '(+233) 20 584 1194 &nbsp  | &nbsp (+233) 55 035 9588 '),
(5, 'Email', 'contact@cox90.com'),
(6, 'Year', '2018'),
(13, 'home description', 'Cox90 | Buy Cosmetic, Hair, wellness and beauty products & more'),
(17, 'web', 'cox90.com'),
(18, 'access', '1'),
(19, 'dev_email', ''),
(20, 'dev_contact', ''),
(21, 'dev_website', '<a href=''http://www.hdxdev.tech'' target=''_blank''>hdxdev.tech</a>'),
(22, 'dev_address', ''),
(23, 'dev_name', 'HdxDev'),
(24, 'About', 'Cos90 cosmetics is an online store which sells nationwide, all sorts of cosmetic, wellness and beauty products of various local and exotic brands. We are based in Accra, Ghana. <br> <a href=''./about-us''>Read More</a>'),
(31, 'footer_contact', 'Madina, Greater Accra. Ho, Volta Region Ghana <br> (+233) 20 584 1194<br>contact@cox90.com <br> Contact Form - <a href=''./contact'' ''>Contact us</a>'),
(32, 'mid_footer_head', 'Sell or Advertise'),
(33, 'mid_footer_body', 'Want to get your products online or advertise your products on out page? <br> Contact us for mor details'),
(34, 'banner shop link', 'href=''products'''),
(35, 'slot 1 name', 'Hair and goods'),
(36, 'slot 2 name', 'SEBAMED'),
(37, 'slot 3 name', 'NOW ESSENTIAL OILS'),
(38, 'slot 4 name', 'NIVEA & JERGENS'),
(39, 'new_time_interval', '604800'),
(40, 'banner countdown enable', '0'),
(41, 'banner countdown end date', 'October 2, 2019 23:59:00'),
(42, 'Company Keywords', 'Cos90 beauty and cosmetics is an online store which sells and deliver nationwide, all sorts of cosmetic, wellness and beauty products of various local and exotic brands. We are based in Accra, Ghana (West Africa)');

-- --------------------------------------------------------

--
-- Table structure for table `single_images`
--

CREATE TABLE `single_images` (
  `id` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `single_images`
--

INSERT INTO `single_images` (`id`, `image`, `width`, `height`, `url`) VALUES
('about_image', 'Edushipabout_image597.png', 291, 476, ''),
('carousel_image_1', 'carousel_image_1248.jpg', 1900, 580, ''),
('carousel_image_2', 'carousel_image_2781.jpg', 500, 310, './product-details/Exclusive-fair-and-white-lotion'),
('carousel_image_3', 'carousel_image_3347.jpg', 500, 310, './product-details/NeoCell-Super-Collagen-C-360-ct'),
('carousel_image_4', 'carousel_image_4332.jpg', 960, 380, 'http://localhost/cosmetics/product-details/new'),
('carousel_image_5', 'carousel_image_5968.jpg', 960, 680, './product-details/Clear-Skin-Detoxifying-Charcoal-Facial-Wipes'),
('favicon', 'favicon553.png', 32, 32, ''),
('logo', 'logo986.png', 300, 185, ''),
('mid_image_1', 'mid_image_1950.jpg', 655, 535, ''),
('newsletter_image', 'newsletter_image895.jpg', 1920, 300, '');

-- --------------------------------------------------------

--
-- Table structure for table `social`
--

CREATE TABLE `social` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `link` text NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social`
--

INSERT INTO `social` (`id`, `name`, `link`, `status`) VALUES
(1, 'facebook', 'https://www.facebook.com/Eduship-LTD-470262640095830/', 1),
(2, 'twitter', 'https://twitter.com/edushipcontact', 1),
(3, 'linkedin', 'link', 0),
(4, 'youtube', 'youtube', 0),
(5, 'instagram', 'https://www.instagram.com/edushipgh/', 1),
(6, 'google', 'marketing.eduship@gmail.com', 1),
(7, 'dribble', '', 0),
(8, 'pinterest', 'pinterests', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url_title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL,
  `image4` varchar(255) NOT NULL,
  `category` int(11) NOT NULL,
  `maincategory` int(11) NOT NULL,
  `price` double(10,2) NOT NULL,
  `old_price` double(10,2) NOT NULL,
  `description` text NOT NULL,
  `keywords` text NOT NULL,
  `best_seller` int(1) NOT NULL,
  `new_arrival` int(1) NOT NULL,
  `most_wanted` int(1) NOT NULL,
  `featured` int(1) NOT NULL,
  `slot_1` int(1) NOT NULL,
  `slot_2` int(1) NOT NULL,
  `slot_3` int(1) NOT NULL,
  `slot_4` int(1) NOT NULL,
  `brand` int(11) NOT NULL,
  `color` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` varchar(10) NOT NULL DEFAULT 'product'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`id`, `title`, `url_title`, `image`, `image2`, `image3`, `image4`, `category`, `maincategory`, `price`, `old_price`, `description`, `keywords`, `best_seller`, `new_arrival`, `most_wanted`, `featured`, `slot_1`, `slot_2`, `slot_3`, `slot_4`, `brand`, `color`, `date`, `type`) VALUES
(8, 'Good girl', 'Good-girl', 'Good-girl_15434382031.jpg', 'Good-girl_15434382032.jpg', 'Good-girl_15434382033.jpg', 'Good-girl_15434382034.jpg', 7, 6, 70.00, 115.00, '<p>Good Girl Perfume by Carolina Herrera, Good Girl by Carolina Herrera was launched in September of 2016 with the slogan &ldquo;<strong>It&rsquo;s good to be bad</strong>.&rdquo;<br />\nThis message is made crystal-clear as soon as you remove it from the box and catch sight of its bottle, which is shaped like a sensuous stiletto heel.<br />\nThis lively oriental perfume is both sexy and feminine and boasts a commanding tuberose and jasmine floral combined with roasted tonka bean, a scent that blends hints of vanilla, cinnamon, almond, and clove. Notes of coffee and cocoa add richness and depth that further demonstrate the duality of good-girl sweet versus bad-girl sass.&nbsp;</p>\n', '', 1, 1, 1, 1, 0, 1, 0, 0, 0, '', '2018-11-28 20:30:23', 'product'),
(9, '110 Degrees - 100ml', '110-Degrees---100ml', '110-Degrees-Toilette-Spray---100ml_15434391881.jpg', '110-Degrees-Toilette-Spray---100ml_15434391882.jpg', '110-Degrees-Toilette-Spray---100ml_15434391883.jpg', '', 7, 6, 72.00, 90.00, '<ul>\n	<li>Volume: 100ml</li>\n	<li>Eau De Toilette Spray</li>\n	<li>Top notes: lemon, mandarin orange, spicy mint, mint and cardamom</li>\n	<li>Middle notes: lavender, geranium, nutmeg and sea notes</li>\n	<li>Base notes: vetiver and oakmoss</li>\n	<li>Long lasting Fragrance</li>\n</ul>\n', '', 0, 0, 0, 1, 0, 1, 0, 0, 0, '', '2018-11-28 21:06:28', 'product'),
(10, 'Suave With Free Deo Spray -100ml', 'Suave-With-Free-Deo-Spray--100ml', 'Suave-With-Free-Deo-Spray--100ml_15434397291.jpg', 'Suave-With-Free-Deo-Spray--100ml_15434397292.jpg', 'Suave-With-Free-Deo-Spray--100ml_15434397293.jpg', '', 7, 6, 66.00, 130.00, '<ul>\n	<li>Volume: 100ml</li>\n	<li>Eau De Toilette Spray</li>\n	<li>Free Deodorant Spray</li>\n	<li>Long lasting Fragrance</li>\n</ul>\n', '', 0, 0, 1, 0, 0, 1, 0, 0, 0, '', '2018-11-28 21:13:12', 'product'),
(11, 'Ombre 33 leather', 'Ombre-33-leather', 'Ombre-33-leather_15434401431.jpg', '', '', '', 7, 6, 130.00, 0.00, '<ul>\n	<li>Eau De Toilette Spray</li>\n	<li>Long lasting Fragrance</li>\n	<li>For Men</li>\n</ul>\n', '', 0, 0, 0, 0, 0, 1, 0, 0, 0, '', '2018-11-28 21:22:23', 'product'),
(12, 'Classy Chic girl', 'Classy-Chic-girl', 'Classy-Chic-girl_15434407841.jpg', '', '', '', 7, 6, 70.00, 140.00, '<ul>\n	<li>Eau De Toilette Spray</li>\n	<li>Long lasting Fragrance</li>\n</ul>\n', '', 0, 0, 0, 0, 0, 1, 0, 0, 0, '', '2018-11-28 21:33:04', 'product'),
(13, 'Evidence', 'Evidence', 'Evidence_15434410921.jpg', 'Evidence_15434410922.jpg', 'Evidence_15434410923.jpg', 'Evidence_15434410924.jpg', 7, 6, 80.00, 150.00, '<ul>\n	<li>Volume: 100ml</li>\n	<li>Notes: Lavender, herbal and fruit&nbsp;</li>\n	<li>For Men</li>\n	<li>Effect: Long Lasting Fragrance</li>\n</ul>\n', '', 0, 0, 0, 0, 0, 1, 0, 0, 0, '', '2018-11-28 21:38:12', 'product'),
(14, 'Ombre 05 Extreme', 'Ombre-05-Extreme', 'Ombre-05-Extreme_15434412561.jpg', 'Ombre-05-Extreme_15434412562.jpg', 'Ombre-05-Extreme_15434412563.jpg', '', 7, 6, 130.00, 0.00, '<ul>\n	<li>Volume: 100ml</li>\n	<li>Effect: Long Lasting Fragrance</li>\n</ul>\n', '', 1, 0, 0, 0, 0, 1, 0, 0, 0, '', '2018-11-28 21:40:56', 'product'),
(15, 'Golden night', 'Golden-night', 'Golden-night_15434415801.jpg', '', '', '', 7, 6, 70.00, 0.00, '<ul>\n	<li>100ml</li>\n	<li>For men</li>\n	<li>Longlasting fragrance</li>\n</ul>\n', '', 0, 0, 0, 0, 0, 1, 0, 0, 0, '', '2018-11-28 21:46:20', 'product'),
(16, 'Black Intense', 'Black-Intense', 'Black-Intense_15439525201.jpg', 'Black-Intense_15439525202.jpg', '', '', 7, 6, 80.00, 98.00, '<p>&nbsp;</p>\n\n<ul>\n	<li>For men</li>\n	<li>Longlasting fragrance</li>\n</ul>\n', '', 0, 0, 0, 1, 0, 1, 0, 0, 0, '', '2018-12-04 19:42:00', 'product'),
(17, 'Exclusive fair and white lotion', 'Exclusive-fair-and-white-lotion', 'Exclusive-fair-and-white-lotion_15439551241.jpg', 'Exclusive-fair-and-white-lotion_15439551242.jpg', 'Exclusive-fair-and-white-lotion_15439551243.png', 'Exclusive-fair-and-white-lotion_15439551244.jpg', 8, 6, 82.00, 0.00, '<ul>\n	<li>FAIR &amp; WHITE EXCLUSIVE : Fair &amp; White Exclusive is formulated with high grade quality ingredients to address skin care concerns for men and women with skin discoloration concerns, such as brown spots, freckles, age spots, and uneven skin tone.</li>\n	<li>HYDRATE &amp; FADE DISCOLORATION: Exclusive Glycerin hydrates and reduces visible discoloration, brown spots while improving clarity with Diacetyl Boldine.</li>\n	<li>MAXIMIZE THE BENEFITS: Apply to areas of discoloration on dry, cleansed skin, preferably at night. Gently massage into skin and let dry.Follow up with Skin Protect SPF 50 Sunscreen daily during and after brightening treatment to maintain even skin tone.</li>\n</ul>\n', '', 1, 0, 0, 0, 0, 0, 0, 0, 9, '', '2018-12-04 20:25:24', 'product'),
(22, 'Body philosophy cream', 'Body-philosophy-cream', 'Body-philosophy-cream_15441215061.jpg', '', '', '', 8, 6, 42.00, 0.00, '<p>Indulge in philosophy&#39;s most-loved fresh cream scent as you moisturize skin with fresh cream body lotion. the moisturizing formula contains macadamia seed and olive fruit oils, shea butter and antioxidants to help hydrate, soothe and soften skin. the lightweight formula absorbs quickly to leave skin feeling silky soft and super smooth, while the fresh cream scent lightly scents skin and leaves you feeling wrapped in comfort.</p>\n', '', 0, 1, 0, 0, 0, 0, 0, 0, 0, '', '2018-12-06 18:38:26', 'product'),
(23, 'Body philosophy splash', 'Body-philosophy-splash', 'Body-philosophy-splash_15441236161.jpg', '', '', '', 8, 6, 49.00, 0.00, '<p>Transport yourself to a tropical getaway with this four piece lotion collection from philosophy. the lightweight yet luxurious body lotion soothes and smooths with natural macadamia seed oil and shea butter, while antioxidants help protect against environmental aggressors, leaving skin hydrated, soft and supple.</p>\n', '', 0, 1, 0, 0, 0, 0, 0, 0, 0, '', '2018-12-06 19:13:36', 'product'),
(24, 'Sebamed baby cream', 'Sebamed-baby-cream', 'Sebamed-baby-cream_15441252551.jpg', 'Sebamed-baby-cream_15441252552.png', '', '', 8, 6, 10.00, 0.00, '<p>Sebamed Baby Cream Extra Soft smoothens the baby&#39;s skin and helps to soothe the irritated skin. This cream can be conveniently applied on the baby&rsquo;s buttocks and cures irritation due to dry skin. The pH value of 5.5 of Sebamed Baby is clinically proven to promote the development of skin&#39;s acid mantle which protects the skin from entry of harmful bacteria and prevents moisture loss. To prevent chaffing of high stress areas like knees, elbows, hands and legs. Also ideal for winter. This cream is also ideal for babies prone to very dry or flaky skin. The water in oil emulsion with 42% lipids from a Moisturizing film without interfering with the skin&#39;s breathing process. Sebamed Baby Cream Extra Soft is free from Paraffin/ Silicon oil/ Parabens/ Propylene glycol</p>\n', '', 0, 1, 0, 0, 0, 0, 0, 0, 3, '', '2018-12-06 19:40:55', 'product'),
(25, 'Sebamed baby powder', 'Sebamed-baby-powder', 'Sebamed-baby-powder_15441258731.jpg', '', '', '', 19, 6, 10.00, 0.00, '<p>Helps to prevent friction on baby&#39;s delicate skin and reduces effects of rubbing and Chafing. Extra soft formula with allantoin helps in protecting baby&#39;s delicate skin against irritation. Prevents nappy rash.</p>\n', '																					  ', 0, 0, 0, 0, 0, 1, 0, 0, 3, '', '2018-12-06 19:51:13', 'product'),
(26, 'Sebamed protective facial cream', 'Sebamed-protective-facial-cream', 'Sebamed-protective-facial-cream_15441260881.jpg', '', '', '', 12, 8, 10.00, 0.00, '<p>Helps to prevent friction on baby&#39;s delicate skin and reduces effects of rubbing and Chafing. Extra soft formula with allantoin helps in protecting baby&#39;s delicate skin against irritation. Prevents nappy rash.The moisturizing complex of hyaluronic acid and squalene prevents dryness and enhances the protective acid mantle of baby&#39;s very delicate facial skin. Panthenol, Vitamin E and lipid compounds protect against irritation also due to salivary rash. Light textured cream which does not leave any greasy residue. Sebamed Baby Protective Facial Cream is free from Paraffin/ Parabens/ Formaldehyde/ Dioxan</p>\n', '																					  ', 0, 0, 0, 0, 0, 1, 0, 0, 3, '', '2018-12-06 19:54:48', 'product'),
(27, 'Sebamed baby massage oil', 'Sebamed-baby-massage-oil', 'Sebamed-baby-massage-oil_15441266541.jpeg', '', '', '', 18, 6, 10.00, 0.00, '<p>Sebamed Baby Soothing Massage Oil ensures relaxing massage which stimulates the blood circulation. Botanical formulation with 95% soya oil and 5% wheat germ oil, maintains the lipid balance. Light textured, non greasy formulation with pleasant botanical fragrance. Does not solidify even at low temperature. Sebamed Baby Soothing Massage Oil is free from Colourants/ Preservatives</p>\n', '', 0, 0, 0, 0, 0, 1, 0, 0, 3, '', '2018-12-06 20:04:14', 'product'),
(28, 'Sebamed baby lotion', 'Sebamed-baby-lotion', 'Sebamed-baby-lotion_15441289521.jpg', '', '', '', 8, 6, 10.00, 0.00, '<p>Sebamed Baby Lotion is a moisturizing and emollient hydro-lipid complex with 7% lipids which safeguards the delicate baby&#39;s skin against dryness and is rapidly absorbed by the skin without greasy residue. The pH value of 5.5 of Sebamed Baby is clinically proven to promote the development of skin&#39;s acid mantle which protects the skin from entry of harmful bacteria and prevents moisture loss. Sebamed Baby Lotion is free from Paraffin/ Silicon oil/ Parabens/ Propylene glycol/ Dioxan</p>\n', '																					  ', 0, 0, 0, 0, 0, 1, 0, 0, 3, '', '2018-12-06 20:42:32', 'product'),
(29, 'Sebamed baby wash', 'Sebamed-baby-wash', 'Sebamed-baby-wash_15441302901.jpg', '', '', '', 9, 6, 10.00, 0.00, '<p>Sebamed Baby Wash Extra Soft is 100% soap-free, gentle cleansing wash for head to toe cleansing of the baby&#39;s delicate skin, making it smooth and soft, minimizing the risk of dryness or irritation.The pH value of 5.5 of Sebamed Baby is clinically proven to promote the development of skin&#39;s acid mantle which protects the skin from entry of harmful bacteria and prevents moisture loss. Gentle botanical cleanser with refatting compound containing vernix related squalene to balance the lipid content of the baby&#39;s tender skin. It is safe to be used from day one. Sebamed Baby Wash Extra Soft is free from Phthalates / Mineral Oil / Fatty alcohol / Triethanol amine / TFMs</p>\n', '																					  ', 0, 0, 0, 0, 0, 1, 0, 0, 3, '', '2018-12-06 21:04:50', 'product'),
(30, 'Sebamed baby shampoo', 'Sebamed-baby-shampoo', 'Sebamed-baby-shampoo_15441305061.jpg', '', '', '', 19, 6, 10.00, 0.00, '<p>Sebamed Children&#39;s Shampoo is ideal for cleansing and care for the fine hair and delicate scalp of babies and children, minimizing the risk of dryness or irritation. 100% soap, SLS and alkali free. The pH value of 5.5 of Sebamed Baby is clinically proven to promote the development of scalp&#39;s acid mantle. Natural Moisturizing agents protect against scalp and hair dryness. Sebamed Children&#39;s Shampoo is free from Phthalates / Mineral Oil / Fatty alcohol / Triethanol amine / TFMs</p>\n', '																					  ', 0, 0, 0, 0, 0, 1, 0, 0, 3, '', '2018-12-06 21:08:26', 'product'),
(31, 'Sebamed baby bubble bath', 'Sebamed-baby-bubble-bath', 'Sebamed-baby-bubble-bath_15441318261.jpg', '', '', '', 9, 6, 10.00, 0.00, '<p>Sebamed Baby Bubble bath is 100% soap and alkali free, gentle body cleanser for the delicate baby skin, making it smooth and soft, minimizing the risk of dryness or irritation.The pH value of 5.5 of Sebamed Baby is clinically proven to promote the development of skin&#39;s acid mantle which protects the skin from entry of harmful bacteria and prevents moisture loss. Extra mild sugar based botanical cleanser ensures gentle cleansing with hydration and no dryness. Chamomile extract soothes, hydrates and protects the baby&#39;s delicate skin. Sebamed Baby Bubble Bath is free from Phthalates / Mineral Oil / Fatty alcohol / Triethanol amine / TFMs</p>\n', '																					  ', 0, 0, 0, 0, 0, 1, 0, 0, 3, '', '2018-12-06 21:30:26', 'product'),
(32, 'Sebamed baby sun lotion', 'Sebamed-baby-sun-lotion', 'Sebamed-baby-sun-lotion_15441327331.jpg', '', '', '', 8, 6, 10.00, 0.00, '<p>Maintaining the pH level of the skin when exposed to the sun is vital. More so, for a baby. Our Sun Baby Lotion is infused with the right amount of pH level &ndash; 5.5 that gives your child the necessary protection from the sun&rsquo;s harmful UVA and UVB rays. Moreover, an emollient derived from plant oil ensures that your baby&#39;s skin doesn&#39;t get dehydrated. So bid good bye to skin cracking, sun burns and say yes to skin protection.</p>\n', '																					  ', 0, 0, 0, 0, 0, 1, 0, 0, 3, '', '2018-12-06 21:45:33', 'product'),
(33, 'Virgin Remy 10&quot;', 'Virgin-Remy-10-quot', 'Virgin-Remy-10-quot_15450513981.jpg', 'Virgin-Remy-10-quot_15450513982.jpg', '', '', 16, 7, 120.00, 0.00, '<p>100% unprocessed human hair.</p>\n', '																					  ', 0, 0, 0, 0, 1, 0, 0, 0, 0, '', '2018-12-09 07:04:51', 'product'),
(34, 'Non processed human hair wig', 'Non-processed-human-hair-wig', 'Non-processed-human-hair-wig_15450511661.jpg', 'Non-processed-human-hair-wig_15450511662.jpg', '', '', 16, 7, 139.00, 0.00, '<p>100% sewn, no glue</p>\n', '																					  ', 0, 0, 0, 0, 1, 0, 0, 0, 0, '', '2018-12-09 07:10:05', 'product'),
(35, '100% filterless wig', '100-filterless-wig', '100-filterless-wig_15450512911.jpg', '100-filterless-wig_15450512912.jpg', '', '', 16, 7, 125.00, 0.00, '<p>Look beautiful in this affordable 100% human hair wig.</p>\n', '																					  ', 0, 0, 0, 0, 1, 0, 0, 0, 0, '', '2018-12-09 07:12:41', 'product'),
(36, ' Amber Glass Bottle Sprayer, Six 2 oz.', 'Amber-Glass-Bottle-Sprayer-Six-2-oz', 'Amber-Glass-Bottle-Sprayer-Six-2-oz_15443479401.jpg', '', '', '', 18, 6, 10.00, 0.00, '<p>Making do-it-yourself home products is a little easier with NOW<sup>&reg;</sup>&nbsp;Solutions empty amber glass bottles with sprayer lids. Whether you&rsquo;re making your own essential oil blends for misting or your own personal body care products, our empty glass bottles and accompanying blank labels will ensure your DIY products are properly stored and labeled for easy identification.&nbsp;</p>\n', '', 0, 0, 0, 0, 0, 0, 1, 0, 4, '', '2018-12-09 07:31:55', 'product'),
(37, 'Amber Glass Bottles with Dropper, Six 1 oz.', 'Amber-Glass-Bottles-with-Dropper-Six-1-oz', 'Amber-Glass-Bottles-with-Dropper-Six-1-oz_15443493401.jpg', '', '', '', 18, 6, 10.00, 0.00, '<p>With NOW<sup>&reg;</sup>&nbsp;Solutions empty amber glass bottles with dropper lids, your favorite do-it-yourself personal care and essential oil blends have a place to call home. We&rsquo;ve even included blank labels so you&rsquo;ll always know what&rsquo;s in the bottle. Perfect for anyone who blends their own liquid products at home.</p>\n', '', 0, 0, 0, 0, 0, 0, 1, 0, 4, '', '2018-12-09 07:34:39', 'product'),
(38, 'Atlas Cedar Oil', 'Atlas-Cedar-Oil', 'Atlas-Cedar-Oil_15443493881.jpg', '', '', '', 18, 6, 10.00, 0.00, '<p><em><strong>Cedrus atlantica</strong></em></p>\n\n<p><strong>Ingredient:</strong>&nbsp;100% pure atlas cedar oil</p>\n\n<p><strong>Aroma:</strong>&nbsp;Sweet, woodsy</p>\n\n<p><strong>Attributes:</strong>&nbsp;Grounding, centering, balancing</p>\n\n<p><strong>Male Clarity Blend:&nbsp;</strong>Add 1 drop of atlas cedar oil, 2 drops of cypress oil and 5 drops of sandalwood oil blend to a diffuser and enjoy.</p>\n\n<p><strong>Extraction Method:</strong>&nbsp;Steam Distilled from finely chopped wood</p>\n\n<p><strong>Physical Characteristics:</strong><br />\nSpecific Gravity: 0.920-0.945<br />\nRefractive Index: 1.5061-1.513</p>\n\n<p>Purity Tested/Quality Assured</p>\n', '', 0, 0, 0, 0, 0, 0, 1, 0, 4, '', '2018-12-09 07:36:19', 'product'),
(39, 'Balsam Fir Needle Oil', 'Balsam-Fir-Needle-Oil', 'Balsam-Fir-Needle-Oil_15443494131.jpg', '', '', '', 18, 6, 10.00, 0.00, '<p><em><strong>Abies balsamea</strong></em></p>\n\n<p><strong>Ingredients:</strong>&nbsp;100% pure balsam fir needle oil</p>\n\n<p><strong>Aroma:</strong>&nbsp;Pleasant, woodsy</p>\n\n<p><strong>Attributes:</strong>&nbsp;Empowering, balancing, strengthening</p>\n\n<p><strong>Mixes Well With:</strong>&nbsp;Frankincense oil, myrrh oil, pine oil, and sandalwood oil blend</p>\n\n<p><strong>Extraction Method:</strong>&nbsp;Steam Distillation from&nbsp;<em>Abies balsamea</em>&nbsp;needles</p>\n\n<p><strong>Physical Characteristics:</strong><br />\nSpecific Gravity: 0.872-0.878<br />\nRefractive Index: 1.473-1.476</p>\n\n<p>Purity Tested/Quality Assured</p>\n', '', 0, 0, 0, 0, 0, 0, 1, 0, 4, '', '2018-12-09 07:38:02', 'product'),
(40, 'Basil Oil', 'Basil-Oil', 'Basil-Oil_15443494391.jpg', '', '', '', 18, 6, 10.00, 0.00, '<p><strong><em>Ocimum basilicum</em></strong></p>\n\n<p><strong>Ingredient:&nbsp;</strong>100% Pure basil oil</p>\n\n<p><strong>Aroma:&nbsp;</strong>Warm, spicy</p>\n\n<p><strong>Attributes:</strong>&nbsp;Uplifting, energizing, purifying</p>\n\n<p><strong>Wake Up &amp; Focus Blend:</strong>&nbsp;Add 1 drop of basil oil, 2 drops each of lemon oil and ylang ylang oil to a diffuser and enjoy.</p>\n\n<p><strong>Extraction Method:</strong>&nbsp;Steam Distilled from plant&#39;s leaves</p>\n\n<p><strong>Physical Characteristics:</strong><br />\nSpecific Gravity: 0.952-0.973<br />\nRefractive Index: 1.512-1.520</p>\n\n<p>Purity Tested/Quality Assured</p>\n', '', 0, 0, 0, 0, 0, 0, 1, 0, 4, '', '2018-12-09 07:41:14', 'product'),
(41, 'Bergamot Oil', 'Bergamot-Oil', 'Bergamot-Oil_15443494581.jpg', '', '', '', 18, 6, 10.00, 0.00, '<p><em><strong>Citrus bergamia</strong></em></p>\n\n<p><strong>Ingredient:</strong>&nbsp;100% pure bergamot oil</p>\n\n<p><strong>Aroma:</strong>&nbsp;Sweet, fruity</p>\n\n<p><strong>Attributes:</strong>&nbsp;Lively, inspiring, uplifting</p>\n\n<p><strong>Mixes Well With:&nbsp;</strong>Cedarwood oil, rosewood oil, tangerine oil, chamomile oil</p>\n\n<p><strong>Extraction Method:</strong>&nbsp;Cold Pressed from fresh fruit peel</p>\n\n<p><strong>Physical Characteristics:</strong><br />\nSpecific Gravity: 0.875-0.880<br />\nRefractive Index: 1.465-1.468</p>\n\n<p>Purity Tested/Quality Assured</p>\n', '', 0, 0, 0, 0, 0, 0, 1, 0, 4, '', '2018-12-09 07:43:39', 'product'),
(42, 'Bergamot Oil, Organic', 'Bergamot-Oil-Organic', 'Bergamot-Oil-Organic_15443494821.jpg', '', '', '', 18, 6, 10.00, 0.00, '<ul>\n	<li><strong>100% Pure</strong></li>\n	<li><strong><em>Citrus bergamia</em></strong></li>\n</ul>\n\n<p><strong>Ingredient:</strong>&nbsp;Organic bergamot oil (100% pure).</p>\n\n<p><strong>Aroma:</strong>&nbsp;Sweet, fruity, citrus.</p>\n\n<p><strong>Attributes:</strong>&nbsp;Lively, inspiring, uplifting.</p>\n\n<p><strong>Mixes Well With:</strong><br />\ncedarwood oil<br />\ntangerine oil<br />\nchamomile oil</p>\n\n<p><strong>Extraction Method:</strong><br />\nCold Pressed from fruit peel.</p>\n\n<p><strong>Physical Characteristics:</strong><br />\nRefractive index: 1.464-1.469<br />\nSpecific Gravity: 0.865-0.883</p>\n\n<p>Purity Tested/Quality Assured</p>\n\n<p>Certified Organic by QAI.</p>\n', '', 0, 0, 0, 0, 0, 0, 1, 0, 4, '', '2018-12-09 07:49:38', 'product'),
(43, 'Black Pepper Oil', 'Black-Pepper-Oil', 'Black-Pepper-Oil_15443496061.jpg', '', '', '', 18, 6, 10.00, 0.00, '<ul>\n	<li>\n	<p><strong><em>Piper nigrum</em></strong></p>\n	</li>\n	<li><strong>100% Pure</strong></li>\n</ul>\n\n<p>&nbsp;</p>\n\n<p><strong>Ingredient:</strong>&nbsp;100% pure black pepper oil.</p>\n\n<p><strong>Aroma:</strong>&nbsp;Dry, spicy, sharp.</p>\n\n<p><strong>Attributes:</strong>&nbsp;Warming, stimulating, focusing, cleansing.</p>\n\n<p><strong>Mixes Well With:</strong>&nbsp;Geranium, lavender, frankincense, clary sage, sandalwood, citrus and spice oils.</p>\n\n<p><strong>Extraction Method:</strong>&nbsp;Steam distilled from dried unripe berries.</p>\n\n<p><strong>Physical Characteristics:</strong><br />\nSpecific Gravity: 0.864-0.884<br />\nRefractive Index: 1.479-1.488</p>\n\n<p>Purity Tested/Quality Assured</p>\n', '', 0, 0, 0, 0, 0, 0, 1, 0, 4, '', '2018-12-09 07:53:49', 'product'),
(44, 'Bottled Bouquet Oil Blend', 'Bottled-Bouquet-Oil-Blend', 'Bottled-Bouquet-Oil-Blend_15443496401.jpg', '', '', '', 18, 6, 10.00, 0.00, '<ul>\n	<li>\n	<p><strong>Ingredients:</strong>&nbsp;Lavender Oil, Ylang Ylang Oil, Bergamot Oil, Orange Oil, Patchouli Oil, Cedarwood Oil</p>\n\n	<p><strong>Aroma:</strong>&nbsp;Sweet, warm and floral with fresh citrus notes</p>\n\n	<p><strong>Attributes:</strong>&nbsp;Romantic, balancing, calming</p>\n\n	<p><strong>Extraction Methods:</strong>&nbsp;Lavender, Patchouli, Cedarwood and Ylang Ylang Oils Steam Distilled; Bergamot and Orange Oils Cold Pressed</p>\n\n	<p>Purity Tested/Quality Assured</p>\n	</li>\n</ul>\n', '', 0, 0, 0, 0, 0, 0, 1, 0, 4, '', '2018-12-09 07:57:04', 'product'),
(45, 'Bug Ban&trade; Essential Oil Blend', 'Bug-Ban-trade-Essential-Oil-Blend', 'Bug-Ban-trade-Essential-Oil-Blend_15444819351.jpg', '', '', '', 18, 6, 10.00, 0.00, '<p>By combining essential oil extracts from citronella, lemongrass, rosemary and thyme, NOW<sup>&reg;</sup>&nbsp;Bug Ban&trade; essential oil blend naturally repels some of today&rsquo;s most annoying winged intruders.</p>\n\n<p><strong>Ingredients:&nbsp;</strong>Citronella Oil (<em>Cymbopogon winterianus</em>) 33.3%, Lemongrass Oil (<em>Cymbopogon flexuosus</em>) 33.3%, Rosemary Oil (<em>Rosmarinus officinalis</em>) 16.7%, Thyme Oil (<em>Thymus vulgaris/zygis</em>) 16.7%.</p>\n\n<p>This product has not been registered by the United States Environmental Protection Agency. NOW Foods represents that this product qualifies for exemption from registration under the Federal Insecticide, Fungicide and Rodenticide Act (FIFRA) section 25(b).</p>\n\n<p>Disposal: If bottle is empty, please recycle. If partially filled, contact your local solid waste agency for disposal instructions.</p>\n', '', 0, 0, 0, 0, 0, 0, 1, 0, 4, '', '2018-12-09 08:00:02', 'product'),
(46, 'Camphor Oil', 'Camphor-Oil', 'Camphor-Oil_15443497301.jpg', '', '', '', 18, 6, 10.00, 0.00, '<p><em><strong>Cinnamomum camphora</strong></em></p>\n\n<p><strong>Ingredient:&nbsp;</strong>100% pure camphor oil</p>\n\n<p><strong>Aroma:</strong>&nbsp; Penetrating, medicinal<br />\n<br />\n<strong>Attributes:</strong>&nbsp; Purifying, energizing, invigorating</p>\n\n<p><strong>Mixes Well With:&nbsp;</strong>Cinnamon oil, frankincense oil, rosemary oil</p>\n\n<p><strong>Extraction Method:</strong>&nbsp;Fractional distillation of crude decamphorized oil</p>\n\n<p><strong>Physical Characteristics:</strong><br />\nSpecific Gravity: .0860-0.890<br />\nRefractive Index: 1.456-1.480</p>\n\n<p>Purity Tested/Quality Assured</p>\n', '', 0, 0, 0, 0, 0, 0, 1, 0, 4, '', '2018-12-09 08:01:37', 'product'),
(47, 'Carrot Seed Oil', 'Carrot-Seed-Oil', 'Carrot-Seed-Oil_15443497561.jpg', '', '', '', 18, 6, 10.00, 0.00, '<p style="text-align:start"><span style="font-size:16px"><span style="color:#3d3935"><span style="font-family:Muli,sans-serif"><strong><em>Daucus carota</em></strong></span></span></span></p>\n\n<p style="text-align:start"><span style="font-size:16px"><span style="color:#3d3935"><span style="font-family:Muli,sans-serif"><strong>Ingredient:<em>&nbsp;</em></strong>Daucus Carota Sativa (Carrot) Seed Oil.</span></span></span></p>\n\n<p style="text-align:start"><span style="font-size:16px"><span style="color:#3d3935"><span style="font-family:Muli,sans-serif"><strong>Aroma:</strong>&nbsp;&nbsp;Earthy, woody, sweet.</span></span></span></p>\n\n<p style="text-align:start"><span style="font-size:16px"><span style="color:#3d3935"><span style="font-family:Muli,sans-serif"><strong>Attributes:</strong>&nbsp;&nbsp;Soothing, rejuvenating, grounding.</span></span></span></p>\n\n<p style="text-align:start"><span style="font-size:16px"><span style="color:#3d3935"><span style="font-family:Muli,sans-serif"><strong>Mixes Well With:</strong>&nbsp;&nbsp;Citrus oils, cedarwood, lavender, geranium.</span></span></span></p>\n\n<p style="text-align:start"><span style="font-size:16px"><span style="color:#3d3935"><span style="font-family:Muli,sans-serif"><strong>Extraction Method:</strong>&nbsp;&nbsp;Steam distilled from seeds.</span></span></span></p>\n\n<p style="text-align:start"><span style="font-size:16px"><span style="color:#3d3935"><span style="font-family:Muli,sans-serif"><strong>Physical Characteristics:</strong><br />\nSpecific Gravity: 0.900-0.943<br />\nRefractive Index: 1.483-1.493</span></span></span></p>\n\n<p style="text-align:start"><span style="font-size:16px"><span style="color:#3d3935"><span style="font-family:Muli,sans-serif">Purity Tested/Quality Assured.</span></span></span></p>\n', '', 0, 0, 0, 0, 0, 0, 1, 0, 4, '', '2018-12-09 08:07:53', 'product'),
(48, 'Cedarwood Oil', 'Cedarwood-Oil', 'Cedarwood-Oil_15443497791.jpg', '', '', '', 18, 6, 10.00, 0.00, '<p><strong><em>Juniperus virginiana</em></strong></p>\n\n<p><strong>Ingredient:</strong>&nbsp;&nbsp;100% pure cedarwood oil</p>\n\n<p><strong>Aroma:</strong>&nbsp;Warm, woodsy, balsamic</p>\n\n<p><strong>Attributes:</strong>&nbsp; Soothing, strengthening, empowering</p>\n\n<p><strong>Breathe Deep Blend:&nbsp;</strong>Add 1 drop each of cedarwood oil and pine oil, along with 5 drops each of eucalyptus oil and hyssop oil to a diffuser and enjoy.</p>\n\n<p><strong>Extraction Method:</strong>&nbsp; Steam Distilled from Virginian Cedarwood trees.</p>\n\n<p><strong>Physical Characteristics:</strong><br />\nSpecific Gravity: 0.938-0.964<br />\nRefractive Index: 1.500-1.505</p>\n\n<p>Purity Tested/Quality Assured</p>\n', '', 0, 0, 0, 0, 0, 0, 1, 0, 4, '', '2018-12-09 08:37:22', 'product'),
(49, 'Chamomile Oil', 'Chamomile-Oil', 'Chamomile-Oil_15443498321.jpg', '', '', '', 18, 6, 10.00, 0.00, '<p><strong><em>Anthemis nobilis</em></strong></p>\n\n<p><strong>Ingredient:</strong>&nbsp;100% pure chamomile oil (Roman).</p>\n\n<p><strong>Aroma:</strong>&nbsp;Intense sweet, delightful.</p>\n\n<p><strong>Attributes:</strong>&nbsp;Relaxing, calming, revitalizing.</p>\n\n<p><strong>Unwind Time Blend</strong>: Add 1 drop of chamomile oil and 2 drops each of lavender oil and sandalwood oil blend to a diffuser and enjoy.</p>\n\n<p><strong>Extraction Method:</strong>&nbsp;Steam Distilled from plant&#39;s flowers.</p>\n\n<p><strong>Physical Characteristics:</strong><br />\nSpecific Gravity: 0.89-0.910 (0.900-0.920)<br />\nRefractive Index: 1.440-1.450</p>\n\n<p>Purity Tested/Quality Assured</p>\n', '', 0, 0, 0, 0, 0, 0, 1, 0, 4, '', '2018-12-09 08:40:47', 'product'),
(50, 'Cheer Up Buttercup! Oil Blend', 'Cheer-Up-Buttercup-Oil-Blend', 'Cheer-Up-Buttercup-Oil-Blend_15443449671.png', '', '', '', 18, 6, 10.00, 0.00, '<p><strong>Ingredients:</strong>&nbsp; Bergamot Oil, Orange Oil, Lime Oil, Grapefruit Oil, Lemon Oil</p>\n\n<p><strong>Aroma:</strong>&nbsp;Citrus with light herbal</p>\n\n<p><strong>Benefits:</strong>&nbsp;Uplifting, refreshing, energizing</p>\n\n<p><strong>Extraction Method:</strong>&nbsp;Bergamot Oil, Orange Oil, Grapefruit Oil &amp; Lemon Oil -- Cold Pressed;&nbsp;Lime Oil -- Steam Distilled</p>\n\n<p>Purity Tested/Quality Assured</p>\n\n<p>Natural essential oils are highly concentrated and should be used with care.</p>\n', '', 0, 0, 0, 0, 0, 0, 1, 0, 4, '', '2018-12-09 08:42:47', 'product'),
(51, 'Cinnamon Bark Oil', 'Cinnamon-Bark-Oil', 'Cinnamon-Bark-Oil_15443450371.png', '', '', '', 18, 6, 10.00, 0.00, '<p><strong><em>Cinnamomum zeylanicum</em></strong></p>\n\n<p><strong>Ingredients:</strong>&nbsp;100% pure cinnamon bark oil<br />\n<br />\n<strong>Aroma:</strong>&nbsp;Warm, spicy<br />\n<br />\n<strong>Benefits:</strong>&nbsp;Warming, comforting, energizing</p>\n\n<p><strong>Mixes Well With:</strong>&nbsp;Clove oil, nutmeg oil, vanilla blend&nbsp;oil, or cinnamon cassia oil</p>\n\n<p><strong>Extraction Method:</strong>&nbsp;Steam Distilled from plant&#39;s dried inner bark</p>\n\n<p><strong>Physical Characteristics:</strong><br />\nSpecific Gravity: 1.010-1.030<br />\nRefractive Index: 1.573-1.591</p>\n\n<p>Purity Tested/Quality Assured</p>\n\n<p>Natural essential oils are highly concentrated and should be used with care.</p>\n', '', 0, 0, 0, 0, 0, 0, 1, 0, 4, '', '2018-12-09 08:43:57', 'product'),
(52, 'Cinnamon Cassia Oil', 'Cinnamon-Cassia-Oil', 'Cinnamon-Cassia-Oil_15443451411.png', '', '', '', 18, 6, 10.00, 0.00, '<p><strong><em>Cinnamomum cassia</em></strong></p>\n\n<p><strong>Ingredients:&nbsp;</strong>100% pure cinnamon cassia oil</p>\n\n<p><strong>Aroma:</strong>&nbsp;Warm, spicy</p>\n\n<p><strong>Attributes:</strong>&nbsp;Warming, stimulating, refreshing</p>\n\n<p><strong>Mixes Well With:</strong>&nbsp;Frankincense oil,&nbsp;hyssop oil,&nbsp;myrrh oil,&nbsp;cinnamon bark oil</p>\n\n<p><strong>Extraction Method:</strong>&nbsp;Steam Distilled from plant&#39;s leaves and twigs</p>\n\n<p><strong>Physical Characteristics:</strong><br />\nSpecific Gravity: 1.053-1.070<br />\nRefractive Index: 1.600-1.6135</p>\n\n<p>Purity Tested/Quality Assured</p>\n', '', 0, 0, 0, 0, 0, 0, 1, 0, 4, '', '2018-12-09 08:45:41', 'product'),
(53, 'Citronella Oil', 'Citronella-Oil', 'Citronella-Oil_15444819891.jpg', '', '', '', 18, 6, 10.00, 0.00, '<p><strong><em>Cymbopogon winterianus</em></strong></p>\n\n<p><strong>Ingredients:</strong>&nbsp;100% pure citronella oil<br />\n<br />\n<strong>Aroma:</strong>&nbsp;Pungent, musky, citrus-like<br />\n<br />\n<strong>Attributes:&nbsp;</strong>Clarifying, freshening, purifying</p>\n\n<p><strong>Mixes Well With:</strong>&nbsp;Cedarwood oil, lavender oil, lemon oil, or lemongrass oil</p>\n\n<p><strong>Extraction Method:</strong>&nbsp;Steam Distilled from fresh and dried citronella grass</p>\n\n<p><strong>Physical Characteristics:</strong><br />\nSpecific Gravity: 0.878-0.895<br />\nRefractive Index: 1.466-1.475</p>\n\n<p><strong>NOTE:</strong>&nbsp;Dropper insert is not included with the 4 oz. size bottles.</p>\n\n<p>Purity Tested/Quality Assured</p>\n', '', 0, 0, 0, 0, 0, 0, 1, 0, 4, '', '2018-12-09 09:22:17', 'product'),
(54, 'NIVEA Daily Essentials Refreshing Tone', 'NIVEA-Daily-Essentials-Refreshing-Tone', 'NIVEA-Daily-Essentials-Refreshing-Tone_15444267061.jpg', '', '', '', 8, 6, 10.00, 0.00, '<p>NIVEA Daily Essentials Refreshing Toner with Vitamin E tones the skin and removes residues. For skin that feels invigorated, toned ad refreshed. Suitable for Normal &amp; Combination skin.</p>\n\n<ul>\n	<li>Tones the skin and removes residues</li>\n	<li>Leaves skin feeling invigorated due to its mild and refreshing formula that contains Vitamin E</li>\n</ul>\n', '', 1, 0, 0, 0, 0, 0, 0, 0, 5, '', '2018-12-10 07:25:06', 'product'),
(55, 'Anti-Dark Spot Fade Milk', 'Anti-Dark-Spot-Fade-Milk', 'Anti-Dark-Spot-Fade-Milk_15444279981.jpg', '', '', '', 8, 6, 13.00, 0.00, '<p>Palmer&#39;s Skin Success Anti Dark Spot Complexion Bar is a creamy facial bar that gently purifies, brightens and balances complexion. Key tone correcting ingredients and natural moisturizers combine to even skin tone and deep clean without drying out skin. Gentle enough for daily use.</p>\n\n<p>Soy: targets spots and discoloration</p>\n\n<p>Licorice Extract: balances tone and texture</p>\n\n<p>Vitamin C: naturally brightens complexion</p>\n\n<p>Vitamin E: a powerful antioxidant</p>\n', '																					  ', 1, 1, 0, 1, 0, 0, 0, 0, 6, '', '2018-12-10 07:46:38', 'product'),
(56, 'Curl Styler Cream Pudding', 'Curl-Styler-Cream-Pudding', 'Curl-Styler-Cream-Pudding_15444281661.jpg', '', '', '', 8, 6, 10.00, 0.00, '<p>Palmer&#39;s Coconut Oil Formula products contain ethically and sustainably sourced Coconut Oil and Tahitian Mono&iuml;, infused with Tiar&eacute; flower petals. These raw, natural ingredients deeply hydrate, repair damage and give hair incredible shine. Palmer&#39;s Coconut Oil Formula Coconut Oil Curl Styler Cream Pudding instantly boosts hydration and adds shine transforming dry, frizzy hair into bouncy, defined curls. Maximizes curl length for longer lasting styles.</p>\n\n<p>No Sulfates &bull; No Parabens &bull; No Phthalates &bull; No Mineral Oil &bull; No Gluten &bull; No Dyes</p>\n', '', 0, 0, 0, 1, 0, 0, 0, 0, 6, '', '2018-12-10 07:49:26', 'product'),
(57, 'Moisture Body Wash', 'Moisture-Body-Wash', 'Moisture-Body-Wash_15444283351.jpg', '', '', '', 9, 6, 10.00, 0.00, '<p>Palmer&#39;s Cocoa Butter Formula Moisturizing Body Wash, a naturally creamy body wash, is a combination of pure Cocoa Butter and gentle-cleansing and emollient-rich moisturizing ingredients. It is ideal for sensitive skin, dry skin and&nbsp; delicate areas.&nbsp; Cleanse and moisturize in one easy step with a formula that is free of sulfates. Rinses easily, leaving behind only soft, supple, even-toned skin.</p>\n', '																																  										  ', 0, 0, 0, 1, 0, 0, 0, 0, 6, '', '2018-12-10 07:52:15', 'product'),
(58, 'Manuka Flower Honey Nourishing Conditioner', 'Manuka-Flower-Honey-Nourishing-Conditioner', 'Manuka-Flower-Honey-Nourishing-Conditioner_15444285271.jpg', '', '', '', 14, 7, 10.00, 0.00, '<p>Our natural Manuka Flower Honey is harvested directly from New Zealand. This super moisturizing, natural anti-bacterial ingredient helps promote healthy, protected hair and scalp.</p>\n\n<p>Palmer&#39;s Manuka Flower Honey Nourishing Conditioner is a rich and creamy, sulfate-free conditioner with the addition of Amla Oil, Cocoa &amp; Shea Butter. Deeply moisturizes while essential fatty acids, vitamins and rich nutrients protect hair and soothe scalp, restoring the moisture barrier for soft, shiny, manageable hair.</p>\n', '																					  ', 0, 0, 0, 1, 0, 0, 0, 0, 6, '', '2018-12-10 07:55:27', 'product'),
(59, 'Medicated Acne Toner', 'Medicated-Acne-Toner', 'Medicated-Acne-Toner_15444286481.jpg', '', '', '', 10, 8, 10.00, 0.00, '<p>Palmer&#39;s Skin Success Medicated Acne Toner, made with .5% Salicylic Acid, Vitamin E and Aloe, deep cleans and unclogs pores that can lead to acne, blemishes, and blackheads.</p>\n', '																					  ', 0, 1, 0, 0, 0, 0, 0, 0, 6, '', '2018-12-10 07:57:28', 'product'),
(60, 'Coconut Oil Body Cream', 'Coconut-Oil-Body-Cream', 'Coconut-Oil-Body-Cream_15444290421.jpg', '', '', '', 8, 6, 10.00, 0.00, '<p>Palmer&#39;s&reg; Coconut Oil Formula products contain ethically and sustainably sourced Coconut Oil and Tahitian Mono&iuml; Oil, infused with Tiar&eacute; flower petals. &nbsp;These raw, natural ingredients deliver luxuriously rich moisturization for decadently pampered skin.</p>\n', '', 0, 0, 0, 1, 0, 0, 0, 0, 6, '', '2018-12-10 08:04:02', 'product'),
(61, 'NeoCell Super Collagen + C (360 ct.)', 'NeoCell-Super-Collagen-C-360-ct', 'NeoCell-Super-Collagen-C-360-ct_15444305391.jpeg', '', '', '', 19, 6, 10.00, 0.00, '<ul>\n	<li>Repairs ligaments and tendons</li>\n	<li>Thickens fine hair, strengthens nails and promotes healthy skin</li>\n	<li>Helps with weight contol</li>\n</ul>\n', '																					  ', 0, 1, 0, 0, 0, 0, 0, 0, 0, '', '2018-12-10 08:28:59', 'product'),
(62, 'Anti-Dandruff Scalp Scrub Shampoo', 'Anti-Dandruff-Scalp-Scrub-Shampoo', 'Anti-Dandruff-Scalp-Scrub-Shampoo_15444308261.jpg', '', '', '', 14, 7, 10.00, 0.00, '<p>Palmer&#39;s Olive Oil Formula Anti-Dandruff Scalp Scrub Shampoo is formulated with tiny natural exfoliating particles that gently scrub the scalp to exfoliate dead skin cells that can result in flaking. Extra Virgin Olive Oil and Keratin Protein moisturize and strengthen hair for maximum shine and manageability. Cool mint extract purifies and stimulates the scalp for an ultra-clean, refreshing feel.</p>\n\n<p>No Sulfates &bull; No Parabens &bull; No Phthalates &bull; No Mineral Oil &bull; No Gluten &bull; No Dyes</p>\n', '', 0, 0, 0, 1, 0, 0, 0, 0, 6, '', '2018-12-10 08:33:46', 'product'),
(63, 'Conditioning Spray Oil', 'Conditioning-Spray-Oil', 'Conditioning-Spray-Oil_15444309701.jpg', '', '', '', 13, 7, 10.00, 0.00, '<p>Natural Extra Virgin Olive Oil is loaded with Vitamins A, B and E and antioxidants to surround each hair strand with protection from damaging free radicals. Palmer&#39;s Olive Oil Formula Conditioning Spray Oil instantly restores moisture to dry hair. Excellent for braids to keep them soft and shiny.</p>\n\n<p>No Sulfates &bull; No Parabens &bull; No Phthalates &bull; No Mineral Oil &bull; No Gluten &bull; No Dyes</p>\n', '																					  ', 0, 0, 0, 1, 0, 0, 0, 0, 6, '', '2018-12-10 08:36:10', 'product'),
(64, 'Beauty Formulas Charcoal Facial Scrub, 150 ml', 'Beauty-Formulas-Charcoal-Facial-Scrub-150-ml', 'Beauty-Formulas-Charcoal-Facial-Scrub-150-ml_15444312341.jpg', '', '', '', 10, 8, 14.00, 0.00, '<ul>\n	<li>Deep exfoliating formula</li>\n	<li>Help to removal of blackheads and unblock pores</li>\n	<li>With activated charcoal</li>\n	<li>The micro ground apricot seeds work to exfoliate the skin</li>\n	<li>Leaving you feeling fresher and healthier</li>\n</ul>\n', '																					  ', 0, 1, 1, 0, 0, 0, 0, 0, 0, '', '2018-12-10 08:40:34', 'product'),
(65, 'Coconut Charcoal Detoxifying Sheet Mask', 'Coconut-Charcoal-Detoxifying-Sheet-Mask', 'Coconut-Charcoal-Detoxifying-Sheet-Mask_15444313361.jpg', '', '', '', 10, 8, 10.00, 0.00, '<ul>\n	<li>Palmer&#39;s Coconut Charcoal Sheet Mask uses natural charcoal sourced from coconut husks in combination with Willow Bark and Marshamallow Root Extract to draw out impurities leaving skin clear, luminous and detoxified.</li>\n</ul>\n', '																					  ', 0, 0, 0, 0, 0, 0, 0, 0, 6, '', '2018-12-10 08:42:16', 'product'),
(66, 'Coconut Oil Body Lotion', 'Coconut-Oil-Body-Lotion', 'Coconut-Oil-Body-Lotion_15444316321.jpg', 'Coconut-Oil-Body-Lotion_15444316322.jpg', 'Coconut-Oil-Body-Lotion_15444316323.jpg', 'Coconut-Oil-Body-Lotion_15444316324.jpg', 8, 6, 10.00, 0.00, '<ul>\n	<li>\n	<p>Palmer&#39;s&reg; Coconut Oil Formula products contain ethically and sustainably sourced Coconut Oil and Tahitian Monoi Oil, infused with Tiar&eacute; flower petals. &nbsp;These raw, natural ingredients deliver luxuriously rich moisturization for decadently pampered skin. &nbsp;Palmer&#39;s Coconut Oil Body Lotion contains high levels of naturally occurring fatty acids and proteins that are essential in keeping skin radiant and healthy looking.&nbsp;</p>\n\n	<p>Raw Coconut Oil: deeply moisurizes &amp; softens&nbsp;</p>\n\n	<p>Mono&iuml; Oil: &nbsp;Hydrates &amp; pampers</p>\n\n	<p>Sweet Almond Oil: &nbsp;Soothes &amp; comforts skin</p>\n	</li>\n</ul>\n', '', 0, 1, 0, 0, 0, 0, 0, 0, 6, '', '2018-12-10 08:47:12', 'product'),
(67, 'Valderma Antibacterial Soap', 'Valderma-Antibacterial-Soap', 'Valderma-Antibacterial-Soap_15444318131.jpg', '', '', '', 9, 6, 13.00, 0.00, '<ul>\n	<li>For spot sensitive skin. Helps keep the skin clean and clear.</li>\n</ul>\n', '', 0, 1, 0, 0, 0, 0, 0, 0, 0, '', '2018-12-10 08:50:13', 'product'),
(68, 'Asantee papaya and honey soap', 'Asantee-papaya-and-honey-soap', 'Asantee-papaya-and-honey-soap_15444321841.jpg', '', '', '', 9, 6, 8.00, 0.00, '<ul>\n	<li>Skin whitening and softening papaya extract</li>\n	<li>Anti-Aging and Anti-Wrinkle</li>\n	<li>Q10 and AHA Collagen</li>\n	<li>Honey and Vitamin C</li>\n	<li>125 grams</li>\n</ul>\n', '', 0, 1, 0, 1, 0, 0, 0, 0, 0, '', '2018-12-10 08:56:25', 'product'),
(69, 'Kojie San Lightening Soap', 'Kojie-San-Lightening-Soap', 'Kojie-San-Lightening-Soap_15444324921.jpg', '', '', '', 9, 6, 17.00, 0.00, '<ul>\n	<li>Suitable for use on both face and body</li>\n	<li>Moisturizing coconut oil primes skin for maximum absorption of kojic acid</li>\n	<li>Fades the appearance age spots, freckles, and other signs of sun damage</li>\n	<li>Reduces the appearance of red marks and scars</li>\n</ul>\n', '', 0, 1, 0, 1, 0, 0, 0, 0, 0, '', '2018-12-10 09:01:32', 'product'),
(70, 'Cleanse medicated cleansing bar', 'Cleanse-medicated-cleansing-bar', 'Cleanse-medicated-cleansing-bar_15444326581.jpg', '', '', '', 9, 6, 20.00, 0.00, '<p>Medicated clear essence soap</p>\n', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, '', '2018-12-10 09:04:18', 'product'),
(71, 'Complexion soap', 'Complexion-soap', 'Complexion-soap_15444818791.jpg', '', '', '', 9, 6, 20.00, 0.00, '<p><em><strong>Cleanse and exfoliate rough, dehydrated skin</strong></em></p>\n\n<p><strong>The Complexion Soap with Alpha Hydroxy Acid is an acne cleansing soap bar for the treatment of blemishes and pimples. Alpha Hydroxy Acid is a natural exfoliant derived from milk and fruit extracts. When used consistently, this soap bar helps to exfoliate uneven pigmentation by removing dead skin cells, leaving a clear, even toned complexion.</strong></p>\n\n<ul>\n	<li>\n	<p><strong>Skin Concern:</strong>&nbsp;acne, uneven skin texture</p>\n	</li>\n	<li>\n	<p><strong>Recommended Skin Type:</strong>&nbsp;all skin types</p>\n	</li>\n	<li>\n	<p><strong>Used For:</strong>&nbsp;an even, flawless complexion, cleansing away dirt and oil</p>\n	</li>\n	<li>\n	<p><strong>For Use On:</strong>&nbsp;Face or body</p>\n	</li>\n	<li>\n	<p><strong>Product Form:</strong>&nbsp;Soap Bar</p>\n	</li>\n	<li>\n	<p><strong>Capacity:</strong>&nbsp;Total Volume: 5.000 ounces</p>\n	</li>\n	<li>\n	<p>Dermatologist tested</p>\n	</li>\n</ul>\n', '', 0, 1, 0, 0, 0, 0, 1, 0, 13, '', '2018-12-10 22:44:39', 'product'),
(72, 'Citronella Oil, Organic', 'Citronella-Oil-Organic', 'Citronella-Oil-Organic_15444829481.jpg', '', '', '', 18, 6, 10.00, 0.00, '<p><em><strong>Cymbopogon winterianus</strong></em></p>\n\n<p><strong>Ingredients:&nbsp;</strong>Organic citronella oil (pure)</p>\n\n<p><strong>Aroma:</strong>&nbsp;Pungent, musky, citrus-like</p>\n\n<p><strong>Benefits:</strong>&nbsp;Clarifying, freshening, purifying</p>\n\n<p><strong>Mixes Well With:&nbsp;</strong>Cedarwood oil,&nbsp;lavender oil,&nbsp;lemon oil,&nbsp;lemongrass oil</p>\n\n<p><strong>Extraction Method:</strong>&nbsp;Steam Distilled from fresh and dried citronella grass</p>\n\n<p><strong>Physical Characteristics:</strong><br />\nSpecific Gravity: 0.878-0.895<br />\nRefractive Index: 1.466-1.475</p>\n\n<p>Purity Tested/Quality Assured.&nbsp;Certifed Organic by QAI.&nbsp;Product of Indonesia.</p>\n\n<p>Natural essential oils are highly concentrated and should be used with care.</p>\n', '', 0, 0, 0, 0, 0, 0, 1, 0, 4, '', '2018-12-10 23:02:28', 'product'),
(73, 'Clary Sage Oil', 'Clary-Sage-Oil', 'Clary-Sage-Oil_15444837021.jpg', '', '', '', 18, 6, 10.00, 0.00, '<p><strong><em>Salvia sclarea</em></strong></p>\n\n<p><strong>Ingredients:</strong>&nbsp;Pure clary sage oil</p>\n\n<p><strong>Aroma:</strong>&nbsp;Herbaceous, lavender-like<br />\n<br />\n<strong>Attributes:</strong>&nbsp;Focusing, stimulating, balancing</p>\n\n<p><strong>Extraction Method:</strong>&nbsp;Steam Distilled from flowers and leaves</p>\n\n<p><strong>Physical Characteristics:</strong><br />\nSpecific Gravity: 0.886-0.929<br />\nRefractive Index: 1.458-1.473</p>\n\n<p>Purity Tested/Quality Assured</p>\n\n<p>Natural essential oils are highly concentrated and should be used with care.</p>\n', '', 0, 0, 0, 0, 0, 0, 1, 0, 4, '', '2018-12-10 23:15:02', 'product'),
(74, 'Clear Glass Bottle Roll-On Applicator, Six 10 mL Empty', 'Clear-Glass-Bottle-Roll-On-Applicator-Six-10-mL-Empty', 'Clear-Glass-Bottle-Roll-On-Applicator-Six-10-mL-Empty_15444838701.jpg', '', '', '', 18, 6, 10.00, 0.00, '<p>Applying your favorite home body care products topically is a lot easier with NOW<sup>&reg;</sup>&nbsp;Solutions empty clear&nbsp;glass bottle with roll-on lid. This convenient 10 mL bottle is easy to carry with you, and the included blank labels ensure you&rsquo;ll always know what&rsquo;s in the bottle.</p>\n', '', 0, 0, 0, 0, 0, 0, 1, 0, 4, '', '2018-12-10 23:17:50', 'product'),
(75, 'Clear the Air Oil Blend', 'Clear-the-Air-Oil-Blend', 'Clear-the-Air-Oil-Blend_15444839411.jpg', '', '', '', 18, 6, 10.00, 0.00, '<p><strong>Ingredients:</strong>&nbsp;Peppermint Oil, Eucalyptus Oil, Hyssop Oil, Rosemary Oil</p>\n\n<p><strong>Aroma:</strong>&nbsp;Fresh Mint</p>\n\n<p><strong>Attributes:</strong>&nbsp;Purifying, cleansing, refreshing</p>\n\n<p><strong>Extraction Method:</strong>&nbsp;Peppermint Oil, Eucalyptus Oil, Hyssop Oil &amp; Rosemary Oil -- Steam Distilled</p>\n\n<p>Purity Tested/Quality Assured</p>\n\n<p>Natural essential oils are highly concentrated and should be used with care.</p>\n', '', 0, 0, 0, 0, 0, 0, 1, 0, 4, '', '2018-12-10 23:19:01', 'product'),
(76, 'Clove Oil', 'Clove-Oil', 'Clove-Oil_15444842201.jpg', '', '', '', 18, 6, 10.00, 0.00, '<p><em><strong>Eugenia caryophyllata</strong></em></p>\n\n<p><strong>Ingredients:</strong>&nbsp;100% pure clove oil<br />\n<br />\n<strong>Aroma:</strong>&nbsp;Warm, pungent<br />\n<br />\n<strong>Attributes:</strong>&nbsp;Warming, soothing, comforting</p>\n\n<p><strong>Blues Relief Blend:</strong>&nbsp;Add 2 drops each of clove oil and lemon oil and 3 drops of orange oil to a diffuser and enjoy.</p>\n\n<p><strong>Extraction Method:</strong>&nbsp;Steam Distilled from clove buds, leaves and stems</p>\n\n<p><strong>Physical Characteristics:</strong><br />\nSpecific Gravity: 1.038-1.060<br />\nRefractive Index: 1.527-1.535</p>\n\n<p><strong>NOTE:</strong>&nbsp;Dropper insert is not included with the 4 oz. and 16 oz. size bottles</p>\n\n<p>Purity Tested/Quality Assured</p>\n', '', 0, 0, 0, 0, 0, 0, 1, 0, 4, '', '2018-12-10 23:23:40', 'product'),
(77, 'Clove Oil, Organic', 'Clove-Oil-Organic', 'Clove-Oil-Organic_15444843611.jpg', '', '', '', 18, 6, 10.00, 0.00, '<ul>\n	<li><strong>100% Pure</strong></li>\n	<li><strong><em>Eugenia caryophyllus</em></strong></li>\n</ul>\n\n<p><strong>Ingredient:&nbsp;</strong>Organic clove oil (100% pure).</p>\n\n<p><strong>Aroma:&nbsp;</strong>Warm, pungent.</p>\n\n<p><strong>Attributes:&nbsp;</strong>Warming, soothing, comforting.</p>\n\n<p><strong>Beat the Blues Blend:&nbsp;</strong>Add 2 drops each of organic clove and organic lemon oils and 3 drops of organic orange oil to a diffuser and enjoy.</p>\n\n<p><strong>Extraction Method:&nbsp;</strong>Steam Distilled from organic clove buds.</p>\n\n<p><strong>Physical Characteristics:</strong><br />\nRefractive index: 1.527-1.535<br />\nSpecific Gravity: 1.038-1.060</p>\n\n<p>Purity Tested/Quality Assured</p>\n\n<p>Certified Organic by QAI.</p>\n', '', 0, 0, 0, 0, 0, 0, 1, 0, 4, '', '2018-12-10 23:26:01', 'product'),
(78, 'Cypress Oil', 'Cypress-Oil', 'Cypress-Oil_15444844321.jpg', '', '', '', 18, 6, 10.00, 0.00, '<ul>\n	<li>\n	<p><strong><em>Cupressus sempervirens</em></strong></p>\n\n	<p><strong>Ingredients:</strong>&nbsp;Pure cypress oil</p>\n\n	<p><strong>Aroma:</strong>&nbsp;Sweet, balsamic, warm overtones of pine/juniper berry.<br />\n	<br />\n	<strong>Attributes:</strong>&nbsp;Balancing, clarifying, centering.</p>\n\n	<p><strong>Extraction Method:</strong>&nbsp;Steam Distilled from leaves and branches</p>\n\n	<p><strong>Physical Characteristics:</strong><br />\n	Specific Gravity: 0.860-0.900<br />\n	Refractive Index: 1.46-1.48</p>\n\n	<p>Purity Tested/Quality Assured</p>\n\n	<p>Natural essential oils are highly concentrated and should be used with care.</p>\n	</li>\n</ul>\n', '', 0, 0, 0, 0, 0, 0, 1, 0, 4, '', '2018-12-10 23:27:12', 'product'),
(79, 'Eucalyptus Globulus Oil', 'Eucalyptus-Globulus-Oil', 'Eucalyptus-Globulus-Oil_15444846021.jpg', '', '', '', 18, 6, 10.00, 0.00, '<p><em><strong>Eucalyptus globulus</strong></em></p>\n\n<p><strong>Ingredients:</strong>&nbsp; 100% pure eucalyptus oil<br />\n<br />\n<strong>Aroma:</strong>&nbsp;Strong aromatic, camphoraceous<br />\n<br />\n<strong>Attributes:</strong>&nbsp;Revitalizing, invigorating, clarifying</p>\n\n<p><strong>Extraction Method:</strong>&nbsp;Steam Distilled from leaves and small branches</p>\n\n<p><strong>Physical Characteristics:</strong><br />\nSpecific Gravity: 0.905-0.925<br />\nRefractive Index: 1.458-1.470</p>\n\n<p><strong>NOTE:&nbsp;</strong>Dropper insert is not included with the 4 oz. and 16 oz.&nbsp;size bottles</p>\n\n<p>Purity Tested/Quality Assured</p>\n\n<p>Natural essential oils are highly concentrated and should be used with care.</p>\n', '', 0, 0, 0, 0, 0, 0, 1, 0, 4, '', '2018-12-10 23:30:02', 'product'),
(80, 'Eucalyptus Globulus Oil, Organic', 'Eucalyptus-Globulus-Oil-Organic', 'Eucalyptus-Globulus-Oil-Organic_15444847011.jpg', '', '', '', 18, 6, 10.00, 0.00, '<p><strong><em>Eucalyptus globulus</em></strong></p>\n\n<p><strong>Ingredient:&nbsp;</strong>Organic eucalyptus oil (100% pure)</p>\n\n<p><strong>Aroma:</strong>&nbsp;Strong aromatic, camphoraceous</p>\n\n<p><strong>Attributes</strong>: Revitalizing, invigorating, clarifying</p>\n\n<p><strong>Extraction Method:</strong>&nbsp;Steam Distilled from leaves and small branches</p>\n\n<p><strong>Clear Thoughts Blend</strong>: Add 3 drops of organic eucalyptus oil, 2 drops each of organic peppermint oil and tangerine oil to a diffuser and enjoy.</p>\n\n<p><strong>Physical Characteristics:</strong><br />\nSpecific Gravity: 0.895-0.930<br />\nRefractive Index: 1.458-1.470</p>\n\n<p><strong>NOTE:</strong>&nbsp;Dropper insert is not included with the 4 oz. and 16 oz. size bottles.</p>\n\n<p>Purity&nbsp;Tested/Quality Assured</p>\n\n<p>Certified Organic by QAI.</p>\n', '', 0, 0, 0, 0, 0, 0, 1, 0, 4, '', '2018-12-10 23:31:41', 'product');
INSERT INTO `tbl_products` (`id`, `title`, `url_title`, `image`, `image2`, `image3`, `image4`, `category`, `maincategory`, `price`, `old_price`, `description`, `keywords`, `best_seller`, `new_arrival`, `most_wanted`, `featured`, `slot_1`, `slot_2`, `slot_3`, `slot_4`, `brand`, `color`, `date`, `type`) VALUES
(81, 'Eucalyptus Radiata Oil', 'Eucalyptus-Radiata-Oil', 'Eucalyptus-Radiata-Oil_15444848371.jpg', '', '', '', 18, 6, 10.00, 0.00, '<p><strong><strong><em>Eucalyptus radiata</em></strong></strong></p>\n\n<p><strong>Ingredients:&nbsp;</strong>100% Pure&nbsp;<em>Eucalyptus radiata</em>&nbsp;oil</p>\n\n<p><strong>Aroma:</strong>&nbsp;Mildly sweet, fresh</p>\n\n<p><strong>Attributes:</strong>&nbsp;Revitalizing, purifying, clarifying</p>\n\n<p><strong>Extraction Method:</strong>&nbsp;Steam Distilled from the leaves and twigs</p>\n\n<p><strong>Physical Characteristics:</strong><br />\nSpecific Gravity: 0.882-0.923<br />\nRefractive Index: 1.455-1.480</p>\n\n<p><strong>Blend Idea:</strong>&nbsp;Spring Cleaning: 10 drops of Lemongrass Oil, 5 drops of Lemon Oil, 1 drop of Eucalyptus Oil.</p>\n\n<p>Purity Tested/Quality Assured</p>\n\n<p>Natural essential oils are highly concentrated and should be used with care.</p>\n', '', 0, 0, 0, 0, 0, 0, 1, 0, 4, '', '2018-12-10 23:33:57', 'product'),
(82, 'Frankincense Oil', 'Frankincense-Oil', 'Frankincense-Oil_15444849981.jpg', '', '', '', 18, 6, 10.00, 0.00, '<p><em><strong>Boswellia carterii</strong></em></p>\n\n<p><strong>Ingredient:</strong>&nbsp;100% pure frankincense oil</p>\n\n<p><strong>Aroma:</strong>&nbsp;Deep, fresh, with subtle hints of citrus and camphor</p>\n\n<p><strong>Attributes:</strong>&nbsp;Relaxing, focusing, centering</p>\n\n<p><strong>Mixes Well With:&nbsp;</strong>balsm fir needle oil, myrrh oil, orange oil, or sandalwood oil blend</p>\n\n<p><strong>Extraction Method:</strong>&nbsp;Steam Distilled from tree resin obtained by exudation of the bark</p>\n\n<p><strong>Physical Characteristics:</strong><br />\nSpecific Gravity: 0.862-0.889<br />\nRefractive Index: 1.465-1.482</p>\n\n<p>Purity Tested/Quality Assured</p>\n', '', 0, 0, 0, 0, 0, 0, 1, 0, 4, '', '2018-12-10 23:36:38', 'product'),
(83, 'Frankincense Oil Blend', 'Frankincense-Oil-Blend', 'Frankincense-Oil-Blend_15444851771.jpg', '', '', '', 18, 6, 10.00, 0.00, '<p><strong><strong><em>Boswellia carterii</em></strong>&nbsp;</strong></p>\n\n<p><strong>Ingredients:&nbsp;</strong>Pure jojoba oil &amp; pure&nbsp;&nbsp;frankincense oil</p>\n\n<p><strong>Aroma:</strong>&nbsp;Mild camphor and citrus</p>\n\n<p><strong>Attributes:</strong>&nbsp;Relaxing, focusing, centering</p>\n\n<p><strong>Mixes Well With:</strong>&nbsp;Balsam fir needle oil,&nbsp;myrrh oil,&nbsp;orange oil,&nbsp;sandalwood oil blend</p>\n\n<p><strong>Extraction&nbsp;Method:</strong>&nbsp;Steam Distilled from tree resin obtained by exudation of the bark</p>\n\n<p>Purity Tested/Quality Assured</p>\n', '', 0, 0, 0, 0, 0, 0, 1, 0, 4, '', '2018-12-10 23:39:37', 'product'),
(84, 'Geranium Oil', 'Geranium-Oil', 'Geranium-Oil_15444853051.jpg', '', '', '', 18, 6, 10.00, 0.00, '<p><em><strong>Pelargonium graveolens</strong></em></p>\n\n<p><strong>Ingredient:</strong>&nbsp;100% pure geranium oil</p>\n\n<p><strong>Aroma:</strong>&nbsp;Subtly sweet, floral</p>\n\n<p><strong>Attributes:</strong>&nbsp; Purifying, soothing, normalizing&nbsp;</p>\n\n<p><strong>Daily Balance Blend</strong>: Add 2 drops each of geranium oil, rose absolute oil and clary sage oil to a diffuser and enjoy.</p>\n\n<p><strong>Extraction Method:</strong>&nbsp;Steam Distilled from fresh plants</p>\n\n<p><strong>Physical Characteristics:</strong><br />\nSpecific Gravity: 0.884-0.893<br />\nRefractive Index: 1.461-1.468</p>\n\n<p>Purity Tested/Quality Assured</p>\n', '', 0, 0, 0, 0, 0, 0, 1, 0, 4, '', '2018-12-10 23:41:45', 'product'),
(85, 'Ginger Oil', 'Ginger-Oil', 'Ginger-Oil_15444854391.jpg', '', '', '', 18, 6, 10.00, 0.00, '<p><em><strong><em><strong>Zingiber officinale</strong></em></strong></em></p>\n\n<p><strong>Ingredient:&nbsp;</strong>100% pure ginger oil</p>\n\n<p><strong>Aroma:</strong>&nbsp;Spicy, warm</p>\n\n<p><strong>Attributes:</strong>&nbsp;Balancing, clarifying, stabilizing</p>\n\n<p><strong>Blissful Thinking Blend:&nbsp;</strong>Add 1 drop each of ginger oil and orange oil and 2 drops of sandalwood oil &nbsp;blend to a diffuser and enjoy.</p>\n\n<p><strong>Extraction Method:</strong>&nbsp;Steam Distilled from dried rhizome</p>\n\n<p><strong>Physical Characteristics:</strong><br />\nSpecific Gravity: 0.870-0.882<br />\nRefractive Index: 1.488-1.494</p>\n\n<p>Purity Tested/Quality Assured</p>\n', '', 0, 0, 0, 0, 0, 0, 1, 0, 4, '', '2018-12-10 23:43:59', 'product'),
(86, 'Good Morning Sunshine! Oil Blend', 'Good-Morning-Sunshine-Oil-Blend', 'Good-Morning-Sunshine-Oil-Blend_15444856231.jpg', '', '', '', 18, 6, 10.00, 0.00, '<p><strong>Ingredients:&nbsp;</strong>Rosemary Oil, Grapefruit Oil, Orange Oil, Peppermint Oil, Cinnamon Bark Oil</p>\n\n<p><strong>Aroma:</strong>&nbsp;Citrus with a slightly spicy undertone.</p>\n\n<p><strong>Attributes:</strong>&nbsp;Energizing, focusing, soothing</p>\n\n<p><strong>Extraction Method:</strong>&nbsp;Grapefruit and Orange Oils --&nbsp;Cold Pressed; Rosemary, Peppermint and Cinnamon Bark Oils --&nbsp;Steam Distilled</p>\n\n<p>Purity Tested/Quality Assured</p>\n', '', 0, 0, 0, 0, 0, 0, 1, 0, 4, '', '2018-12-10 23:47:03', 'product'),
(87, 'Grapefruit Oil', 'Grapefruit-Oil', 'Grapefruit-Oil_15444857601.jpg', '', '', '', 18, 6, 10.00, 0.00, '<p><strong><em>Citrus paradisi</em></strong>&nbsp;</p>\n\n<p><strong>Ingredients:&nbsp;</strong>100% pure grapefruit oil.</p>\n\n<p><strong>Aroma:</strong>&nbsp;Sweet, citrus</p>\n\n<p><strong>Attributes:</strong>&nbsp;Purifying, cheerful, uplifting</p>\n\n<p><strong>Summer Fun Blend:</strong>&nbsp;Add 1 drop each of lavender oil, peppermint oil and grapefruit oil to a diffuser and enjoy.</p>\n\n<p><strong>Extraction Method:</strong>&nbsp;Cold Pressed from fresh fruit peel.</p>\n\n<p><strong>Physical Characteristics:</strong><br />\nSpecific Gravity: 0.848-0.856<br />\nRefractive Index: 1.475-1.478</p>\n\n<p><strong>NOTE:&nbsp;</strong>Dropper insert is not included with the 4 oz.&nbsp;size bottles.</p>\n\n<p>Purity Tested/Quality Assured</p>\n', '', 0, 0, 0, 0, 0, 0, 1, 0, 4, '', '2018-12-10 23:49:20', 'product'),
(88, 'Helichrysum Oil Blend', 'Helichrysum-Oil-Blend', 'Helichrysum-Oil-Blend_15444858731.jpg', '', '', '', 18, 6, 10.00, 0.00, '<ul>\n	<li><strong>â€‹10% Oil Blend</strong></li>\n	<li><em><strong>Helichrysum italicum</strong></em></li>\n</ul>\n\n<p><strong>Ingredients:</strong>&nbsp;Pure jojoba oil &amp; pure helichrysum oil (immortelle).</p>\n\n<p><strong>Aroma:</strong>&nbsp;Sweet, herbaceous, earthy.</p>\n\n<p><strong>Attributes:</strong>&nbsp;Soothing, rejuvenating, stimulating.</p>\n\n<p><strong>Mixes Well With:</strong>&nbsp;lavender, bergamot, rose, cypress</p>\n\n<p><strong>Extraction Method:&nbsp;</strong>Steam Distilled from flowering tops.</p>\n\n<p><strong>Physical Characteristics:</strong><br />\nRefractive index: 1.470-1.484<br />\nSpecific Gravity: 0.880-0.920</p>\n\n<p>Purity Tested/Quality Assured</p>\n\n<p>Natural essential oils should be handled&nbsp;with care.</p>\n', '', 0, 0, 0, 0, 0, 0, 1, 0, 4, '', '2018-12-10 23:51:13', 'product'),
(89, 'Hyssop Oil', 'Hyssop-Oil', 'Hyssop-Oil_15444859801.jpg', '', '', '', 18, 6, 10.00, 0.00, '<ul>\n	<li>\n	<p><strong><em>Hyssopus officinalis</em></strong>&nbsp;</p>\n\n	<p><strong>Ingredients:&nbsp;</strong>100% pure hyssop oil</p>\n\n	<p><strong>Aroma:&nbsp;</strong>Camphor like</p>\n\n	<p><strong>Attributes:&nbsp;</strong>Clarifying, refreshing, purifying</p>\n\n	<p><strong>Open Airways Blend</strong>: Add 6 drops of hyssop oil, 4 drops of lavender oil and 2 drops of peppermint oil to a diffuser and enjoy.</p>\n\n	<p><strong>Extraction Method:</strong>&nbsp;Steam Distilled from plant&#39;s flowering tops and leaves</p>\n\n	<p><strong>Physical Characteristics:</strong><br />\n	Specific Gravity: 0.917-0.965<br />\n	Refractive Index: 1.473-1.486</p>\n\n	<p>Purity Tested/Quality Assured</p>\n	</li>\n</ul>\n', '', 0, 0, 0, 0, 0, 0, 1, 0, 4, '', '2018-12-10 23:53:00', 'product'),
(90, 'Jasmine Absolute Oil', 'Jasmine-Absolute-Oil', 'Jasmine-Absolute-Oil_15444861131.jpg', '', '', '', 18, 6, 10.00, 0.00, '<p><strong><strong><em>Jasminum grandiflorum</em></strong></strong></p>\n\n<p><strong>Ingredients:&nbsp;</strong>Pure jojoba oil &amp; pure jasmine absolute</p>\n\n<p><strong>Aroma:</strong>&nbsp;Warm, sweet floral</p>\n\n<p><strong>Attributes:</strong>&nbsp;Romantic, relaxing, calming</p>\n\n<p><strong>Relaxing Blend</strong>: 2 drops jasmine absolute oil, 2 drops lavender oil, 15 drops vanilla blend oil</p>\n\n<p><strong>Extraction Method:</strong>&nbsp;Solvent Extracted from jasmine flowers</p>\n\n<p><strong>Physical Characteristics:</strong><br />\nSpecific Gravity: 0.860-0.910</p>\n\n<p>Purity Tested/Quality Assured</p>\n', '', 0, 0, 0, 0, 0, 0, 1, 0, 4, '', '2018-12-10 23:55:13', 'product'),
(91, 'Jasmine Fragrance', 'Jasmine-Fragrance', 'Jasmine-Fragrance_15444862971.jpg', '', '', '', 18, 6, 10.00, 0.00, '<p><strong>Ingredients:</strong>&nbsp;Jasmine oil with other fragrances (synthetic)</p>\n\n<p><strong>Aroma:</strong>&nbsp;Warm, sweet floral</p>\n\n<p><strong>Attributes:</strong>&nbsp;Romantic, relaxing, calming</p>\n\n<p><strong>Relaxing Blend:&nbsp;&nbsp;</strong>Add 2 drops each of jasmine fragrance and lavender oil along with 15 drops of vanilla concentrate oil to a diffuser and enjoy.</p>\n\n<p><strong>Physical Characteristics:</strong><br />\nSpecific Gravity: 0.992-1.002</p>\n\n<p><strong>Extraction Method:</strong>&nbsp;Steam distillation and blending</p>\n\n<p>Purity Tested/Quality Assured</p>\n', '', 0, 0, 0, 0, 0, 0, 1, 0, 4, '', '2018-12-10 23:58:17', 'product'),
(92, 'Juniper Berry Oil', 'Juniper-Berry-Oil', 'Juniper-Berry-Oil_15444866841.jpg', '', '', '', 18, 6, 10.00, 0.00, '<p><strong><em>Juniperus communis</em></strong></p>\n\n<p><strong>Ingredient:</strong>&nbsp;100% pure juniper berry oil</p>\n\n<p><strong>Aroma:</strong>&nbsp;Floral</p>\n\n<p><strong>Benefits:</strong>&nbsp;Restoring, empowering, balancing<br />\n<br />\n<strong>Mixes Well With:</strong>&nbsp;Cypress oil, eucalyptus oil, rosemary oil, sage oil<br />\n<br />\n<strong>Extraction Method:</strong>&nbsp;Steam Distilled from dried ripe berry</p>\n\n<p><strong>Physical Characteristics:</strong><br />\nSpecific Gravity: 0.854-0.879<br />\nRefractive Index: 1.474-1.484<br />\n<br />\nPurity Tested/Quality Assured</p>\n', '', 0, 0, 0, 0, 0, 0, 1, 0, 4, '', '2018-12-11 00:04:44', 'product'),
(93, 'Lavender &amp; Tea Tree Oil', 'Lavender-amp-Tea-Tree-Oil', 'Lavender-amp-Tea-Tree-Oil_15444869421.jpg', '', '', '', 18, 6, 10.00, 0.00, '<p><strong>Ingredients:&nbsp;</strong>Pure lavender oil &amp; pure tea tree oil</p>\n\n<p><strong>Aroma:</strong>&nbsp;Soft, floral</p>\n\n<p><strong>Attributes:</strong>&nbsp;Renewing, cleansing, stimulating</p>\n\n<p><strong>Mixes Well With:</strong>&nbsp; Lavender oil,&nbsp;eucalyptus oil,&nbsp;rose absolute oil</p>\n\n<p><strong>Extraction Method:</strong>&nbsp; Steam Distilled from leaves &amp; flowering tops</p>\n\n<p>Purity Tested/Quality Assured</p>\n', '', 0, 0, 0, 0, 0, 0, 1, 0, 4, '', '2018-12-11 00:09:02', 'product'),
(94, 'Lavender Oil', 'Lavender-Oil', 'Lavender-Oil_15444871031.jpg', '', '', '', 18, 6, 10.00, 0.00, '<p><strong><em>Lavandula angustifolia</em></strong></p>\n\n<p><strong>Ingredients:</strong>&nbsp;100% pure lavender oil</p>\n\n<p><strong>Aroma:</strong>&nbsp;Floral<br />\n<br />\n<strong>Attributes:</strong>&nbsp;Soothing, normalizing, balancing</p>\n\n<p><strong>Head&nbsp;Ease Blend:&nbsp;</strong>&nbsp;Add 3 drops each of lavender oil, peppermint oil and chamomile oil to a diffuser and enjoy.</p>\n\n<p><strong>Extraction Method:</strong>&nbsp;Steam Distilled from flowering tops.</p>\n\n<p><strong>Physical Characteristics:</strong><br />\nSpecific Gravity: 0.875-0.888<br />\nRefractive Index: 1.459-1.470</p>\n\n<p><strong>NOTE:</strong>&nbsp;Dropper insert is not included with the 4 oz. and 16 oz. size bottles.</p>\n\n<p>Purity Tested/Quality Assured</p>\n', '', 0, 0, 0, 0, 0, 0, 1, 0, 4, '', '2018-12-11 00:11:43', 'product'),
(95, 'Lavender Oil, Certified Organic', 'Lavender-Oil-Certified-Organic', 'Lavender-Oil-Certified-Organic_15444877661.jpg', '', '', '', 18, 6, 10.00, 0.00, '<p><strong><em>Lavandula angustifolia</em></strong></p>\n\n<p><strong>Ingredient:</strong>&nbsp;Organic lavender oil (100% pure).</p>\n\n<p><strong>Aroma:</strong>&nbsp;Floral.</p>\n\n<p><strong>Attributes:</strong>&nbsp;Soothing, normalizing, balancing.</p>\n\n<p><strong>Head Ease Blend:</strong>&nbsp;Add 3 drops each of organic lavender oil, organic peppermint oil and chamomile oil to a diffuser and enjoy.</p>\n\n<p><strong>Extraction Method:</strong>&nbsp;Steam Distilled from&nbsp;flowering tops.</p>\n\n<p><strong>Physical Characteristics:</strong><br />\nSpecific Gravity: 0.875-0.888<br />\nRefractive Index: 1.459-1.470</p>\n\n<p><strong>NOTE:</strong>&nbsp;Dropper insert is not included with the 4 oz. size bottles.</p>\n\n<p>Purity Tested/Quality Assured.&nbsp;Certified Organic by QAI.</p>\n', '', 0, 0, 0, 0, 0, 0, 1, 0, 4, '', '2018-12-11 00:22:46', 'product'),
(96, 'Lemon &amp; Eucalyptus Blend', 'Lemon-amp-Eucalyptus-Blend', 'Lemon-amp-Eucalyptus-Blend_15444879191.jpg', '', '', '', 18, 6, 10.00, 0.00, '<p><strong>Ingredients:</strong>&nbsp;&nbsp;Pure lemon oil (<em>Citrus limon</em>), pure eucalyptus oil (<em>Eucalyptus globulus</em>) &amp; pure lemongrass oil (<em>Cymbopogon flexuosus</em>).</p>\n\n<p><strong>Aroma:&nbsp;</strong>Citronella-like.</p>\n\n<p><strong>Attributes:&nbsp;</strong>Clarifying, cleansing, invigorating.</p>\n\n<p><strong>Mixes Well With:&nbsp;</strong>Thyme oil, lavender oil, rosemary oil, or lemon oil</p>\n\n<p><strong>Extraction Method:</strong>&nbsp;Lemon Oil &ndash; Cold Pressed; Eucalyptus &amp; Lemongrass Oils &ndash; Steam Distilled</p>\n\n<p><strong>NOTE:</strong>&nbsp;Dropper insert is not included with the 4 oz.&nbsp;size bottles.</p>\n\n<p>Purity Tested/Quality Assured</p>\n', '', 0, 0, 0, 0, 0, 0, 1, 0, 4, '', '2018-12-11 00:25:19', 'product'),
(97, 'Lemon Eucalyptus Oil', 'Lemon-Eucalyptus-Oil', 'Lemon-Eucalyptus-Oil_15444891591.jpg', '', '', '', 18, 6, 10.00, 0.00, '<p><strong>Ingredient:</strong>&nbsp; 100% pure lemon eucalyptus oil (<em>Eucalyptus citriodora</em>).</p>\n\n<p><strong>Aroma:</strong>&nbsp;Citronella-like with subtle floral undertones.</p>\n\n<p><strong>Attributes:</strong>&nbsp;Refreshing, cleansing, stimulating.</p>\n\n<p><strong>Mixes Well With:</strong>&nbsp;Geranium, lavender, cedarwood, rosemary, mint and tree oils.</p>\n\n<p><strong>Extraction Method:</strong>&nbsp;Steam distilled from leaves and twigs.</p>\n\n<p><strong>Physical Characteristics:</strong><br />\nSpecific Gravity: 0.864-0.877<br />\nRefractive Index: 1.450-1.459</p>\n\n<p>Purity Tested/Quality Assured</p>\n', '', 0, 0, 0, 0, 0, 0, 1, 0, 4, '', '2018-12-11 00:45:59', 'product'),
(98, 'Lemon Oil', 'Lemon-Oil', 'Lemon-Oil_15444905461.jpg', '', '', '', 18, 6, 10.00, 0.00, '<p><strong><em>Citrus limon</em></strong></p>\n\n<p><strong>Ingredients:&nbsp;</strong>100% pure lemon oil</p>\n\n<p><strong>Aroma:</strong>&nbsp;Fresh, lemon peel</p>\n\n<p><strong>Attributes:</strong>&nbsp;Refreshing, cheerful, uplifting</p>\n\n<p><strong>Cheer Up Buttercup Blend:</strong>&nbsp;Add 1 drop each of lime oil and grapefruit oil, 2 drops of lemon oil and 6 drops of tangerine oil. Add to a diffuser and enjoy.</p>\n\n<p><strong>Extraction Method:</strong>&nbsp;Cold Pressed from fresh fruit peel</p>\n\n<p><strong>Physical Characteristics:</strong><br />\nSpecific Gravity: 0.849-0.855<br />\nRefractive Index: 1.473-1.476</p>\n\n<p><strong>Note:</strong>&nbsp;Dropper insert is not included with the 4 oz. size bottle.</p>\n\n<p>Purity Testing/Quality Assured</p>\n', '', 0, 0, 0, 0, 0, 0, 1, 0, 4, '', '2018-12-11 01:09:06', 'product'),
(99, 'Lemon Oil, Organic', 'Lemon-Oil-Organic', 'Lemon-Oil-Organic_15444914171.jpg', '', '', '', 18, 6, 10.00, 0.00, '<p><em><strong>Citrus limon</strong></em></p>\n\n<p><strong>Ingredients:</strong>&nbsp;Organic lemon oil (pure)</p>\n\n<p><strong>Aroma:</strong>&nbsp; Fresh lemon peel</p>\n\n<p><strong>Attributes:</strong>&nbsp;Refreshing, cheerful, uplifting</p>\n\n<p><strong>Extraction Method:</strong>&nbsp;Cold Pressed from fresh fruit peel</p>\n\n<p><strong>Physical Characteristics:</strong><br />\nSpecific Gravity: 0.849-0.855<br />\nRefractive Index: 1.473-1.476</p>\n\n<p>Purity Tested/Quality Assured.&nbsp;Certified Organic by Quality Assurance International.</p>\n\n<p>Natural essential oils are highly concentrated and should be used with care.</p>\n', '', 0, 0, 0, 0, 0, 0, 1, 0, 4, '', '2018-12-11 01:23:39', 'product'),
(100, 'Ocean Essence Lotion', 'Ocean-Essence-Lotion', 'Ocean-Essence-Lotion_15445971661.jpg', '', '', '', 8, 6, 39.00, 0.00, '<p>The Ocean Essence Lotion helps to leave your skin feeling smooth and hydrated.</p>\n\n<ul>\n	<li>Size: 3.38 fl oz / 100mL</li>\n	<li>Specially formulated with Hyaluronic acid and Aloe to provide extra moisturizing factor</li>\n	<li>Helps repair skin from dryness.</li>\n	<li>Decrease the visibility of wrinkles and fine lines&nbsp;</li>\n	<li>\n	<p>Brighten your facial complexion</p>\n	</li>\n</ul>\n\n<p><strong>Ingredients:</strong><br />\nSodium Hyaluronate, Deep Ocean&nbsp;Water, Aloe Barbadensis Leaf Extract, Paeonia Suffruticosa Root Extract, Calendula Officinalis Flower Extract</p>\n', '', 0, 0, 0, 0, 0, 0, 0, 0, 7, 'Sea Blue', '2018-12-12 06:46:06', 'product'),
(101, 'So White Skin Perfector Body Lotion 500ml', 'So-White-Skin-Perfector-Body-Lotion-500ml', 'So-White-Skin-Perfector-Body-Lotion-500ml_15445975721.jpg', '', '', '', 8, 6, 66.00, 0.00, '<p>Luxurious clarifying and moisturizing body lotion formulated to lighten dark spots and even out skin tone. Skin Perfecting Lotion promotes skin rejuvenation with potent skin brightening complex, restoring beautiful luminous, silky, soft skin.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Directions:</strong>&nbsp;Apply to uneven skin tone twice a day on cleansed, dry skin. Always follow up with a minimum SPF 30 sun protection in order to avoid further skin discoloration. Avoid sun exposure.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Recommendation:</strong>&nbsp;Follow up with our&nbsp;<a href="http://www.fairandwhite.com/all-products/sun-protection/omic-skinprotect-spf50.html"><strong>Skin Protect SPF 50 Sunscreen</strong></a>&nbsp;daily during and after brightening treatment to maintain even skin tone.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Skin type:</strong>&nbsp;All skin types</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Main Ingredients</strong>: 1.9 % Hydroquinone (Hydroxyphenol), Vitamin E</p>\n', '', 0, 0, 1, 0, 0, 0, 0, 0, 8, '', '2018-12-12 06:52:52', 'product'),
(102, 'Fair &amp; White Miss White 7 DAY Body Lotion 500 ml', 'Fair-amp-White-Miss-White-7-DAY-Body-Lotion-500-ml', 'Fair-amp-White-Miss-White-7-DAY-Body-Lotion-500-ml_15447119721.jpg', '', '', '', 8, 6, 39.00, 0.00, '<p>Whiten, Lighten &amp; Brighten with Fair &amp; White Miss White<strong>WHITER SKIN IN JUST 7 DAYS!</strong></p>\n\n<p>&nbsp;</p>\n\n<p>NEW, intense Miss White 7 Day Body Lotion targets and controls hyperpigmentation while fading existing discoloration and brightening skin tone.</p>\n\n<p>&nbsp;</p>\n\n<p>Blend of whitening and nourishing properties moisturize skin as it prevents new dark spots form surfacing, restoring a more even, uniform complexion.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Directions</strong>: Apply on dry, cleansed skin at night time before bed. Follow up with our&nbsp;<a href="http://www.fairandwhite.com/all-products/sun-protection/omic-skinprotect-spf50.html"><strong>SkinProtect SPF 50 Sunscreen</strong></a>daily during and after treatment in order to prevent further skin discoloration.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Main Ingredient:</strong>&nbsp;1.9 % Hydroxyphenol (Hydroquinone)</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n', '', 0, 0, 0, 0, 0, 0, 0, 0, 9, '', '2018-12-13 14:39:32', 'product'),
(103, 'PURE WHITE WHITENING BODY LOTION', 'PURE-WHITE-WHITENING-BODY-LOTION', 'PURE-WHITE-WHITENING-BODY-LOTION_15447136841.jpg', 'PURE-WHITE-WHITENING-BODY-LOTION_15447136842.jpg', '', '', 8, 6, 32.00, 0.00, '<p>PURE WHITE: WHITENING BODY LOTION! Pure White, Whitening Body Lotion guarantees a lighter skin tone, fast! The high performance formulation is extremely fast acting and begins to work instantly to give you a whiter, lighter complexion! The active ingredients help fade skin tone and even out any pigmentation or skin discoloration; Pure White Body Lotion visibly reduces pigmentation blemishes, moles, freckles, acne scars, melasma, and age spots among others! All ingredients are 100% safe and natural, the unique formulation even contains essential vitamins and minerals to ensure skin is nourished and moisturised. You will have a lighter, brighter, radiant skin tone &ndash; fast! Extremely fast acting, begins to work quickly giving you a whiter, lighter complexion!! Fade&rsquo;s skin tone and even out any pigmentation or skin discoloration! Contains essential vitamins and minerals to ensure skin is nourished and moisturised! Reduces pigmentation blemishes, moles, freckles, acne scars, melasma! Pure White products are the perfect solution for a lighter, brighter more even skin tone! Pure White products are formulated using 100% safe and natural ingredients! Pure White skin lightening treatments have all been clinically tested! Pure White products guarantee great results, fast! Made with high quality ingredients, in leading laboratories in the United Kingdom! All Pure White Products have been clinically proven to significantly lighten and brighten skin tone &ndash; to ensure a clear and even complexion. Our products contain the highest quality ingredients and have all been vigorously tested. Pure White products have been produced using 100% natural and herbal formulations &ndash; ensuring your skin is nourished with essential vitamins and minerals. All our products are 100% safe to use and will not irritate delicate or sensitive skin. Leading dermatologists have helped develop the products in top laboratories in the United Kingdom.</p>\n', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2018-12-13 15:08:04', 'product'),
(104, 'JERGENS&reg; Oil-Infused Moisturizer with Restoring Argan Oil', 'JERGENS-reg-Oil-Infused-Moisturizer-with-Restoring-Argan-Oil', 'JERGENS-reg-Oil-Infused-Moisturizer-with-Restoring-Argan-Oil_15447219201.jpg', '', '', '', 18, 6, 10.00, 0.00, '<p>Helps give your skin a luxuriously soft feel with long-lasting, moisture-rich hydration.<br />\n<br />\nEnriched with Argan Oil from the Argan tree, which is native to Morocco, this restoring oil is known as &ldquo;liquid gold&rdquo; and for its healing and soothing properties.<br />\n<br />\nDirections: Use daily for deeply luminous, visibly softer skin.</p>\n', 'JERGENS																	  ', 0, 0, 0, 0, 0, 0, 0, 0, 10, '', '2018-12-13 15:28:54', 'product'),
(105, 'So Carrot Maxi Tone Milk 300ml / 10.14 fl. oz', 'So-Carrot-Maxi-Tone-Milk-300ml-10-14-fl-oz', 'So-Carrot-Maxi-Tone-Milk-300ml-10-14-fl-oz_15447172131.jpg', '', '', '', 8, 6, 59.00, 0.00, '<p>No more sad, dull-looking skin.<br />\n<br />\nThis exquisite milk enriched with antioxidant Carrot Oil unifies and enhances the complexion.&nbsp;<br />\nThe ideal skin care product for leaving skin silky soft and radiant from within.<br />\n<br />\nActive ingredients: Glycerin, 1.9% Hydroxyphenol (Hydroquinone), Carrot Oil<br />\n<br />\nHow to use: Apply in the morning and at night</p>\n', '', 1, 1, 0, 0, 0, 0, 0, 0, 9, '', '2018-12-13 16:06:53', 'product'),
(106, 'Cool kick deodorant', 'Cool-kick-deodorant', 'Cool-kick-deodorant_15447334761.jpg', '', '', '', 7, 6, 13.00, 0.00, '<p>&nbsp;</p>\n\n<h2>OVERVIEW</h2>\n\n<p>NIVEA MEN Cool Kick Deodorant, a deodorant for men who want an instant cool kick of freshness with effective anti-perspirant protection.</p>\n\n<p>It is a body spray for men, which gives instant freshness, even after a long journey or a workout. Enriched with a Cool Care formula, this men&rsquo;s deo gives long-lasting feeling of freshness. Its effective antiperspirant formula along with antimicrobial actives, regulates sweat and reduces formation of odour causing bacteria in the underarms to ensure day-long body odour protection.</p>\n\n<p>A men&rsquo;s deodorant for the man who is always on the move. Its long lasting masculine fragrance revitalizes all the senses and gives day-long freshness and confidence to breeze through the day. This deo for men ensures effective body odour protection in all your daily tasks and activities!</p>\n\n<p>That&rsquo;s not all; this deodorant for men has 0% alcohol and the NIVEA MEN Care Complex, which makes it especially caring for your underarms, setting it apart any other men&rsquo;s deo. It has been dermatologically proven to cause no harm to your underarm skin.</p>\n\n<p>This deodorant for men is a cool kick to stay fresh all day long.</p>\n\n<h2>RESULT</h2>\n\n<ul>\n	<li>Day-long body odour control</li>\n	<li>Long-lasting freshness</li>\n	<li>Fresh masculine scent</li>\n	<li>NIVEA&rsquo;s trusted skin care expertise</li>\n</ul>\n\n<p>&nbsp;</p>\n\n<h2>USAGE</h2>\n\n<p>&nbsp;</p>\n\n<ul>\n	<li>Shake well before use.</li>\n	<li>Hold the can 10-15 cms away.</li>\n	<li>Spray directly on underarm.</li>\n	<li>Apply on skin for best results.</li>\n	<li>Do not spray on clothes.</li>\n</ul>\n\n<p>&nbsp;</p>\n\n<h2>COOL KICK</h2>\n\n<p>The Cool Kick range gives an instant pleasant cooling kick and leaves you with a vitalized fresh feeling all day. The cooling formula with Mint extracts and energizing Iso-Magnesium is especially designed for active men. It combines intense long-lasting freshness and protects your skin with a light fresh scent that invigorates your senses.</p>\n', '', 0, 0, 0, 0, 0, 0, 0, 0, 5, '', '2018-12-13 16:18:57', 'product'),
(107, 'Ambi Skincare Soft &amp; Even Creamy Oil Lotion', 'Ambi-Skincare-Soft-amp-Even-Creamy-Oil-Lotion', 'Ambi-Skincare-Soft-amp-Even-Creamy-Oil-Lotion_15447205941.jpg', 'Ambi-Skincare-Soft-amp-Even-Creamy-Oil-Lotion_15447205942.jpg', 'Ambi-Skincare-Soft-amp-Even-Creamy-Oil-Lotion_15447205943.jpg', 'Ambi-Skincare-Soft-amp-Even-Creamy-Oil-Lotion_15447205944.jpg', 8, 6, 49.00, 0.00, '<ul>\n	<li>Convenient non-greasy lotion</li>\n	<li>Enriched with a blend of natural ingredients</li>\n	<li>Lock in moisture for a full 24 hours</li>\n	<li>Fast absorbing</li>\n	<li>Leaves skin silky-smooth and even</li>\n</ul>\n', '', 0, 1, 0, 0, 0, 0, 0, 0, 11, '', '2018-12-13 17:03:14', 'product'),
(108, 'Clear Skin Detoxifying Charcoal Facial Wipes', 'Clear-Skin-Detoxifying-Charcoal-Facial-Wipes', 'Clear-Skin-Detoxifying-Charcoal-Facial-Wipes_15449674511.jpg', 'Clear-Skin-Detoxifying-Charcoal-Facial-Wipes_15449674512.jpg', '', '', 10, 8, 14.00, 0.00, '<p>Charcoal Facial Wipe&#39;s are formulated with charcoal to help remove dirt and impurities the detoxifying formula is captured in a very cool, sleek chick black wipe.</p>\n', '																					  ', 1, 1, 0, 0, 0, 0, 0, 0, 0, '', '2018-12-13 17:22:21', 'product'),
(109, 'Oil-Infused Moisturizer with Refreshing Coconut Oil', 'Oil-Infused-Moisturizer-with-Refreshing-Coconut-Oil', 'Oil-Infused-Moisturizer-with-Refreshing-Coconut-Oil_15447222671.jpg', '', '', '', 8, 6, 30.00, 0.00, '<p>JERGENS<sup>&reg;</sup>&nbsp;Coconut Oil Infused Moisturizer helps give your skin a luxuriously soft feel with long-lasting, moisture-rich hydration.<br />\n<br />\nEnriched with coconut oil, this moisture-rich oil refeshens and softens.<br />\n<br />\nDirections: Use daily for deeply luminous, visibly softer skin.</p>\n', 'JERGENS																  ', 0, 0, 0, 0, 0, 0, 0, 0, 10, '', '2018-12-13 17:31:07', 'product'),
(110, 'Oil-Infused Moisturizer with Nourishing Monoi Oil', 'Oil-Infused-Moisturizer-with-Nourishing-Monoi-Oil', 'Oil-Infused-Moisturizer-with-Nourishing-Monoi-Oil_15447225981.jpg', '', '', '', 8, 6, 30.00, 0.00, '<p>JERGENS<sup>&reg;</sup>&nbsp;Monoi Oil-Infused Moisturizer helps give your skin a luxuriously soft feel with long-lasting, moisture-rich hydration.<br />\n<br />\nEnriched with nourishing monoi oil from the Tahitian Gardenia flower, which is known for its ability to soften and smooth.<br />\n<br />\nDirections: Use daily for deeply luminous, visibly softer skin.</p>\n', 'JERGENS													  ', 0, 0, 0, 0, 0, 0, 0, 0, 10, '', '2018-12-13 17:36:38', 'product'),
(111, 'Ultra Healing&reg; Extra Dry Skin Moisturizer', 'Ultra-Healing-reg-Extra-Dry-Skin-Moisturizer', 'Ultra-Healing-reg-Extra-Dry-Skin-Moisturizer_15447227191.jpg', '', '', '', 8, 6, 30.00, 0.00, '<p><strong>Repairs, heals, and deeply nourishes extra dry skin to reveal visibly luminous, healthier skin.</strong><br />\n<br />\nBest for: Extra dry skin, including heels, elbows, and knees.</p>\n\n<ul>\n	<li>Improves skin&lsquo;s tone, texture, and luminosity.</li>\n	<li>Contains a unique illuminating HYDRALUCENCE<sup>&trade;</sup>&nbsp;blend and Vitamins C, E, and B5.</li>\n	<li>Heals dryness at the source by penetrating through 5 layers of the skin&lsquo;s surface.</li>\n	<li>Absorbs quickly and locks in moisture for up to 48 hours.</li>\n</ul>\n', 'JERGENS								  ', 0, 1, 1, 0, 0, 0, 0, 0, 10, '', '2018-12-13 17:38:39', 'product'),
(112, 'Original Scent Dry Skin Moisturizer', 'Original-Scent-Dry-Skin-Moisturizer', 'Original-Scent-Dry-Skin-Moisturizer_15447228681.jpg', '', '', '', 8, 6, 30.00, 0.00, '<p><strong>Relieves dry skin with moisture-rich hydration to reveal deeply luminous, visibly softer skin.</strong><br />\n<br />\nBest for: Normal to dry skin.</p>\n\n<ul>\n	<li>Restores skin&lsquo;s luminosity with a unique illuminating HYDRALUCENCE<sup>&trade;</sup>&nbsp;blend and nourishing hydrators.</li>\n	<li>Provides dry skin with long-lasting moisture to soften and visibly improve skin&lsquo;s tone and texture.</li>\n	<li>Leaves skin lightly fragranced with JERGENS<sup>&reg;</sup>&nbsp;classic Cherry-Almond scent.</li>\n</ul>\n\n<p>&nbsp;</p>\n', 'JERGENS																  ', 0, 0, 0, 0, 0, 0, 0, 0, 10, '', '2018-12-13 17:41:08', 'product'),
(113, 'Shea Butter Deep Conditioning Moisturizer', 'Shea-Butter-Deep-Conditioning-Moisturizer', 'Shea-Butter-Deep-Conditioning-Moisturizer_15447229241.jpg', '', '', '', 8, 6, 30.00, 0.00, '<p><strong>Deeply conditions dry, dull skin to reveal a look that&lsquo;s luminous and 3x as radiant.</strong><br />\n<br />\nBest for: Dry, dull skin.</p>\n\n<ul>\n	<li>Restores skin&lsquo;s luminosity and enhances sheen. With a unique illuminating HYDRALUCENCE<sup>&trade;</sup>&nbsp;blend and pure African Shea Butter.</li>\n	<li>Relieves dryness, replenishes moisture, and improves skin&lsquo;s moisture barrier for beautiful, radiant skin.</li>\n	<li>Absorbs quickly and leaves skin with a light, fresh scent and no greasy feel.</li>\n</ul>\n', '											JERGENS										  										  ', 0, 0, 0, 0, 0, 0, 0, 1, 10, '', '2018-12-13 17:42:04', 'product'),
(114, 'Nourishing Honey Moisturizer', 'Nourishing-Honey-Moisturizer', 'Nourishing-Honey-Moisturizer_15447229721.jpg', '', '', '', 8, 6, 30.00, 0.00, '<p>Best for: Normal to Dry Skin.<br />\n<br />\nWith Honey and Orange Blossom Essence, this formula hydrates and smoothes to help reveal deeply nourished, visibly softer skin.<br />\n<br />\nUnique formula contains illuminating Hydralucence blend.<br />\n<br />\nDirections: Use daily for deeply luminous, visibly softer skin.</p>\n', 'JERGENS																	  ', 0, 0, 0, 0, 0, 0, 0, 0, 10, '', '2018-12-13 17:42:53', 'product'),
(115, 'Hydrating Coconut Dry Skin Moisturizer', 'Hydrating-Coconut-Dry-Skin-Moisturizer', 'Hydrating-Coconut-Dry-Skin-Moisturizer_15447230841.jpg', '', '', '', 8, 6, 30.00, 0.00, '<p><strong>Relieves dry skin with moisture-rich hydration to reveal deeply luminous, visibly softer skin.</strong><br />\n<br />\nBest for: Normal to dry skin.</p>\n\n<ul>\n	<li>With Coconut Oil and ultraâ€hydrating Coconut Water, this formula provides long-lasting moisture for visibly softer skin.</li>\n	<li>Nourishes for visibly softer skin with a unique illuminating HYDRALUCENCE<sup>&reg;</sup>&nbsp;blend.</li>\n</ul>\n\n<p>&nbsp;</p>\n', '											JERGENS																		  										  ', 0, 0, 0, 0, 0, 0, 0, 1, 10, '', '2018-12-13 17:44:44', 'product'),
(116, 'Daily Moisture Dry Skin Moisturizer', 'Daily-Moisture-Dry-Skin-Moisturizer', 'Daily-Moisture-Dry-Skin-Moisturizer_15447231731.jpg', '', '', '', 8, 6, 30.00, 0.00, '<p><strong>Instantly moisturizes rough, dry skin to reveal skin that&lsquo;s deeply radiant and 4x as smooth.</strong><br />\n<br />\nBest for: Rough, dry skin.</p>\n\n<ul>\n	<li>Smoothes and relieves rough, dry skin. With a unique illuminating HYDRALUCENCE<sup>&trade;</sup>&nbsp;blend, Silk Proteins, and Citrus Extracts.</li>\n	<li>Provides a continuous multi-layer of moisture to smooth skin and improve skin&lsquo;s tone, texture, and luminosity.</li>\n	<li>Locks in moisture for up to 24 hours and leaves skin with a soft, alluring scent.</li>\n</ul>\n\n<p>&nbsp;</p>\n', 'JERGENS', 0, 0, 0, 0, 0, 0, 0, 0, 10, '', '2018-12-13 17:46:13', 'product'),
(117, 'Daily Moisture Fragrance Free Moisturizer', 'Daily-Moisture-Fragrance-Free-Moisturizer', 'Daily-Moisture-Fragrance-Free-Moisturizer_15447232341.jpg', '', '', '', 8, 6, 30.00, 0.00, '<p><strong>Instantly moisturizes rough, dry skin to reveal skin that&lsquo;s deeply radiant and 4x as smooth, without a fragrance.</strong><br />\n<br />\nBest for: Rough, dry, skin.</p>\n\n<ul>\n	<li>Smoothes rough, dry skin. With a unique illuminating HYDRALUCENCE<sup>&trade;</sup>&nbsp;blend and Silk Proteins.</li>\n	<li>Provides continuous multi-layer moisture to smooth skin and improve its tone, texture, and luminosity.</li>\n	<li>Locks in moisture for up to 24 hours.</li>\n</ul>\n\n<p>&nbsp;</p>\n', '											JERGENS																					  										  ', 0, 0, 0, 0, 0, 0, 0, 1, 10, '', '2018-12-13 17:47:14', 'product'),
(118, 'Skin Firming Toning Moisturizer', 'Skin-Firming-Toning-Moisturizer', 'Skin-Firming-Toning-Moisturizer_15447232961.jpg', '', '', '', 8, 6, 30.00, 0.00, '<p><strong>Tightens and increases elasticity of skin to reveal a look that&lsquo;s visibly firmer and more radiant.</strong><br />\n<br />\nBest for: Dry skin.</p>\n\n<ul>\n	<li>The formula features a unique illuminating HYDRALUCENCE<sup>&trade;</sup>&nbsp;blend, Collagen, and Elastin.</li>\n	<li>Improves skin&lsquo;s resiliency, elasticity, and firmness.</li>\n	<li>Relieves dryness and replenishes moisture to improve skin&lsquo;s tone, texture, and luminosity.</li>\n</ul>\n\n<p>&nbsp;</p>\n', 'JERGENS											  ', 0, 0, 0, 0, 0, 0, 0, 0, 10, '', '2018-12-13 17:48:16', 'product'),
(119, 'Soothing Aloe Refreshing Moisturizer', 'Soothing-Aloe-Refreshing-Moisturizer', 'Soothing-Aloe-Refreshing-Moisturizer_15447233741.jpg', '', '', '', 8, 6, 30.00, 0.00, '<p><strong>Hydrates and soothes dry skin with a unique fast-absorbing formula to reveal a luminous, refreshed look.</strong><br />\n<br />\nBest for: Normal to dry skin.</p>\n\n<ul>\n	<li>Improves skin&lsquo;s tone, texture, and luminosity. With a unique illuminating HYDRALUCENCE<sup>&trade;</sup>&nbsp;blend, cucumber extract, and pure Aloe Vera.</li>\n	<li>Revives skin&lsquo;s natural moisture to relieve dry, uncomfortable skin, leaving it noticeably refreshed and hydrated.</li>\n	<li>Absorbs quickly and locks in moisture for 24 hours.</li>\n</ul>\n', 'JERGENS												  ', 0, 0, 0, 0, 0, 0, 0, 0, 10, '', '2018-12-13 17:49:34', 'product'),
(120, 'Age Defying Multi-Vitamin Moisturizer', 'Age-Defying-Multi-Vitamin-Moisturizer', 'Age-Defying-Multi-Vitamin-Moisturizer_15447234181.jpg', '', '', '', 8, 6, 30.00, 0.00, '<p><strong>Revitalizes and replenishes aging, dry skin for a deeply luminous, visibly rejuvenated look.</strong><br />\n<br />\nBest for: Dry skin.</p>\n\n<ul>\n	<li>Restores skin&lsquo;s youthful look. With a unique blend of emollients, antioxidants, and Vitamins A, C, and E.</li>\n	<li>Helps visibly diminish the signs of aging and leaves skin noticeably more luminous.</li>\n	<li>Triples skin&lsquo;s moisture content with continued use.</li>\n</ul>\n', '											Jergens										  ', 0, 0, 0, 0, 0, 0, 0, 1, 10, '', '2018-12-13 17:50:18', 'product'),
(121, 'NIVEA men deep impact deodorant', 'NIVEA-men-deep-impact-deodorant', 'NIVEA-men-deep-impact-deodorant_15447336811.jpg', '', '', '', 7, 6, 13.00, 0.00, '<ul>\n	<li><a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.niveamen.in%2Fproducts%2Fdeep-anti-perspirant-spray" rel="popup" title="Share on Facebook">share</a></li>\n</ul>\n\n<h2>OVERVIEW</h2>\n\n<p>Kick-off Real Freshness with the NIVEA MEN Deep Impact deodorant. The effective formula with black carbon keeps you fresh all day long. Because long lasting freshness has a deep impact.</p>\n\n<h2>RESULT</h2>\n\n<ul>\n	<li>Long-lasting dry and clean skin feel just like after the shower.</li>\n	<li>Anti-bacterial formula with black carbon, acts powerful against bacteria.</li>\n	<li>No visible black residue.</li>\n	<li>Reliable 48h anti-perspirant protection.</li>\n</ul>\n\n<p>&nbsp;</p>\n\n<h2>USAGE</h2>\n\n<p>&nbsp;</p>\n\n<ul>\n	<li>Shake well before use.&nbsp;</li>\n	<li>Hold can 15cm from the underarm and spray.</li>\n	<li>Allow product to dry completely.</li>\n</ul>\n', '', 0, 0, 1, 0, 0, 0, 0, 0, 5, '', '2018-12-13 20:41:21', 'product'),
(122, 'NIVEA men protect and care deodorant', 'NIVEA-men-protect-and-care-deodorant', 'NIVEA-men-protect-and-care-deodorant_15447338011.jpg', '', '', '', 7, 6, 13.00, 0.00, '<ul>\n	<li>\n	<h2>OVERVIEW</h2>\n\n	<p>NIVEA MEN Protect &amp; Care Deodorant gives you day-long body odour control without underarm irritation.<br />\n	<br />\n	Its unique formula contains 0% Alcohol which ensures no skin irritation or burning on application. The woody masculine scent gives you long-lasting freshness. It has the optimal combination of reliable deodorant protection and NIVEA&reg; MEN Care Complex.<br />\n	<br />\n	Skin tolerance dermatologically proven. Contains 0% alcohol.</p>\n\n	<h2>RESULT</h2>\n	</li>\n	<li>Day long body odour control.</li>\n	<li>No Irritation.</li>\n	<li>Long lasting freshness.</li>\n	<li>Fresh masculine scent.</li>\n	<li>\n	<p>&nbsp;</p>\n\n	<h2>USAGE</h2>\n\n	<p>&nbsp;</p>\n	</li>\n	<li>Hold the can 10-15 cms away.</li>\n	<li>Spray directly on underarm and on body.</li>\n	<li>Apply on skin for best results.</li>\n	<li>Fresh masculine scent.</li>\n</ul>\n', '', 0, 0, 0, 0, 0, 0, 0, 0, 5, '', '2018-12-13 20:43:21', 'product'),
(123, 'Sport deodorant', 'Sport-deodorant', 'Sport-deodorant_15447339891.jpg', '', '', '', 7, 6, 13.00, 0.00, '<ul>\n	<li>\n	<h2>OVERVIEW</h2>\n\n	<p>NIVEA MEN Sport Deodorant, for men who seek prolonged revitalising freshness along with effective anti-perspirant protection.</p>\n\n	<p>When living an active life, the feeling of time running out constantly looms over a man&rsquo;s head. For someone who is always on the run, excessive perspiration and body odour can add to the challenge. Most deodorants for men solve this problem only for a few hours, but once the effect of the men&rsquo;s deodorant starts to fade off, so does the confidence.</p>\n\n	<p>NIVEA MEN Sport Deodorant gives you a sporty masculine freshness for the poise needed to carry out daily activities, without any need to stop. This body spray for men comes with a non-stop fresh effect combined with mineral complex that gives you a revitalizing freshness and keeps the energy going. It&rsquo;s the perfect deo for men that comes equipped with the optimal combination of reliable deodorant protection and NIVEA&reg; MEN Care Complex.</p>\n\n	<p>This men&rsquo;s deo contains 0% alcohol and is dermatologically tested to be easy on your skin. And while it refreshes your senses, it also delivers a sporty confidence for when you step outdoors. So, go on and make a trip with this deodorant for men who never want to stop!</p>\n\n	<p>&nbsp;</p>\n\n	<h2>RESULT</h2>\n	</li>\n	<li>Long-lasting freshness</li>\n	<li>Day-long body odour control</li>\n	<li>Fresh masculine scent</li>\n</ul>\n', '', 0, 0, 0, 0, 0, 0, 0, 0, 5, '', '2018-12-13 20:46:29', 'product'),
(124, 'NIVEA men duo body deodorizer summer fresh', 'NIVEA-men-duo-body-deodorizer-summer-fresh', 'NIVEA-men-duo-body-deodorizer-summer-fresh_15447340771.jpg', '', '', '', 7, 6, 13.00, 0.00, '<ul>\n	<li>\n	<h2>OVERVIEW</h2>\n\n	<p>Experience the all-new NIVEA MEN Duo Body Deodorizer. A unique deodorant with two phases - the green phase gives you freshness while the transparent phase keeps the freshness guarded, all day long!<br />\n	Just shake to activate the two phases and feel freshness like never before with its innovative Freshness Guard Technology.</p>\n\n	<h2>RESULT</h2>\n	</li>\n	<li>This unique dual-phase deodorant gives long-lasting freshness with its Freshness and Freshness Guard layers.</li>\n	<li>On shaking, the Freshness Guard layer mixes with the layer of Freshness to prevent it from escaping. Ensuring long-lasting freshness on being applied.</li>\n	<li>It&#39;s dermatologically safe on skin.</li>\n	<li>\n	<h2>USAGE</h2>\n\n	<p>&nbsp;</p>\n	</li>\n	<li>Shake to mix and activate the Freshness Guard Technology.</li>\n	<li>Spray directly on skin and not on clothes to experience freshness like never before.</li>\n	<li>\n	<p>&nbsp;</p>\n	</li>\n</ul>\n', '', 0, 0, 0, 0, 0, 0, 0, 0, 5, '', '2018-12-13 20:47:57', 'product'),
(125, 'NIVEA men duo body deodorizer active fresh', 'NIVEA-men-duo-body-deodorizer-active-fresh', 'NIVEA-men-duo-body-deodorizer-active-fresh_15447341471.jpg', '', '', '', 7, 6, 13.00, 0.00, '<ul>\n	<li>\n	<h2>OVERVIEW</h2>\n\n	<p>Experience the all-new NIVEA MEN Duo Body Deodorizer. A unique deodorant with two phases - the green phase gives you freshness while the transparent phase keeps the freshness guarded, all day long!<br />\n	Just shake to activate the two phases and feel freshness like never before with its innovative Freshness Guard Technology.</p>\n\n	<h2>RESULT</h2>\n	</li>\n	<li>This unique dual-phase deodorant gives long-lasting freshness with its Freshness and Freshness Guard layers.</li>\n	<li>On shaking, the Freshness Guard layer mixes with the layer of Freshness to prevent it from escaping. Ensuring long-lasting freshness on being applied.</li>\n	<li>It&#39;s dermatologically safe on skin.</li>\n	<li>\n	<p>&nbsp;</p>\n\n	<h2>USAGE</h2>\n\n	<p>&nbsp;</p>\n	</li>\n	<li>Shake to mix and activate the Freshness Guard Technology.</li>\n	<li>Spray directly on skin and not on clothes to experience freshness like never before.</li>\n	<li>\n	<p>&nbsp;</p>\n\n	<p>&nbsp;</p>\n	</li>\n</ul>\n', '', 0, 0, 1, 0, 0, 0, 0, 0, 5, '', '2018-12-13 20:49:07', 'product'),
(126, 'Fresh active original deodorant', 'Fresh-active-original-deodorant', 'Fresh-active-original-deodorant_15447342191.jpg', '', '', '', 7, 6, 13.00, 0.00, '<ul>\n	<li>\n	<h2>OVERVIEW</h2>\n\n	<p>NIVEA MEN Fresh Active Original, a deodorant for men that keeps you feeling fresh, all day long.</p>\n\n	<p>A long day needs long-lasting freshness. Here&rsquo;s a men&rsquo;s deo that helps keep the freshness, the suave man&rsquo;s poise, and confidence intact all day long.</p>\n\n	<p>Designed with a special formula enriched with Ocean Extracts, this deodorant not only appeals to the senses, but also keeps body odour in check for all your daily rigorous tasks.</p>\n\n	<p>Enjoy a deodorant for men that has a fresh masculine fragrance, as well as the optimal combination of reliable deodorant protection and NIVEA&reg; MEN Care Complex. Because this body spray for men knows that great things start with you.</p>\n\n	<p>NIVEA MEN Fresh Active Original deodorant for men is dermatologically proven to be skin tolerant. It cares for your underarm skin while giving you protection against body odour all day long.</p>\n\n	<p>Meet the perfect deo for men, which gives long lasting freshness and body odour protection, so that you can enjoy your long day with supreme confidence and zeal.</p>\n\n	<h2>RESULT</h2>\n	</li>\n	<li>Gives long lasting freshness.</li>\n	<li>Ensures day long body odour control.</li>\n	<li>Has a fresh masculine fragrance.</li>\n	<li>And with NIVEA&rsquo;s trusted skin care expertise.</li>\n	<li>\n	<p>&nbsp;</p>\n\n	<p>&nbsp;</p>\n\n	<p>&nbsp;</p>\n\n	<h2>USAGE</h2>\n\n	<p>&nbsp;</p>\n	</li>\n	<li>Hold the can 10-15 cms away.</li>\n	<li>Spray directly on underarm and on body.</li>\n	<li>Apply on skin for best results.</li>\n</ul>\n', '', 0, 0, 0, 0, 0, 0, 0, 0, 5, '', '2018-12-13 20:50:19', 'product'),
(127, 'Fresh power charge deodorant', 'Fresh-power-charge-deodorant', 'Fresh-power-charge-deodorant_15447343051.jpg', '', '', '', 7, 6, 13.00, 0.00, '<ul>\n	<li>\n	<h2>OVERVIEW</h2>\n\n	<p>NIVEA MEN Fresh Power Charge Deodorant, for men who want to feel fresh all day with a charge of powerful masculine fragrance.</p>\n\n	<p>Not every morning guarantees a hearty breakfast or a refreshing cool shower, but every morning does demand a fresh and zestful start to the day.</p>\n\n	<p>NIVEA MEN Fresh Power Charge Deodorant comes with a powerful, warm, and masculine fragrance that provides long-lasting freshness. This body spray for men contains oriental spicy notes that provide an instant gush of energy.&nbsp; Just one use of this men&rsquo;s deodorant before rushing out of the door, can be the dose of energy that you need for the entire day ahead.</p>\n\n	<p>An optimal combination of reliable deodorant protection and NIVEA&reg; MEN Care Complex, distinguishes this deo for men from others. It has been dermatologically proven to cause no harm to your underarm skin.<br />\n	Work towards your dreams or spend an entire day with loved one, this men&rsquo;s deo will give you enough energy to handle all that life puts in front of you every day. It lets you be proactive without causing damage to your skin.</p>\n\n	<p>Don&rsquo;t just start your day, kick start it!</p>\n\n	<h2>RESULT</h2>\n	</li>\n	<li>Long lasting freshness</li>\n	<li>Day long body odour control</li>\n	<li>Warm musk and oriental spicy scent</li>\n	<li>NIVEA&rsquo;s trusted skin care expertise</li>\n	<li>\n	<p>&nbsp;</p>\n\n	<h2>USAGE</h2>\n\n	<p>&nbsp;</p>\n	</li>\n	<li>Hold the can 10-15 cms away.</li>\n	<li>Spray directly on underarm and on body.</li>\n	<li>Apply on skin for best results.</li>\n</ul>\n', '', 0, 0, 0, 0, 0, 0, 0, 0, 5, '', '2018-12-13 20:51:45', 'product'),
(128, 'Fresh power boost deodorant', 'Fresh-power-boost-deodorant', 'Fresh-power-boost-deodorant_15447343861.jpg', '', '', '', 7, 6, 13.00, 0.00, '<ul>\n	<li>\n	<h2>OVERVIEW</h2>\n\n	<p>NIVEA MEN Fresh Power Boost Deodorant, for men who want to feel fresh all day with a boost of powerful masculine fragrance.</p>\n\n	<p>Managing a job, maintaining a home, and having a social life means that there are never enough hours in the day. A fresh start is a must!</p>\n\n	<p>NIVEA MEN Fresh Power Boost Deodorant is for men who are always on the run. A men&rsquo;s deodorant that gives you a powerful boost of freshness and day long protection from body odour. This body spray for men comes with a warm musk and citrus fragrance notes, which keep you in high gears, throughout the day.</p>\n\n	<p>Enriched with an optimal combination of reliable deodorant protection and NIVEA&reg; MEN Care Complex, this deo for men keeps you refreshed while caring for your skin, unlike other deodorants for men. It has been tested and dermatologically proven to be skin tolerant.</p>\n\n	<p>Be it an office presentation or attending a social event, take the day head on, with the confidence of day long freshness and body odour protection. It starts with you!</p>\n\n	<h2>RESULT</h2>\n	</li>\n	<li>Long lasting freshness</li>\n	<li>Day long body odour control</li>\n	<li>Warm musk and citrus scent</li>\n	<li>NIVEA&rsquo;s trusted skin care expertise</li>\n	<li>\n	<p>&nbsp;</p>\n\n	<h2>USAGE</h2>\n\n	<p>&nbsp;</p>\n	</li>\n	<li>Hold the can 10-15 cms away.</li>\n	<li>Spray directly on underarm and on body.</li>\n	<li>Apply on skin for best results.</li>\n</ul>\n', '', 0, 0, 0, 0, 0, 0, 0, 0, 5, '', '2018-12-13 20:53:06', 'product');
INSERT INTO `tbl_products` (`id`, `title`, `url_title`, `image`, `image2`, `image3`, `image4`, `category`, `maincategory`, `price`, `old_price`, `description`, `keywords`, `best_seller`, `new_arrival`, `most_wanted`, `featured`, `slot_1`, `slot_2`, `slot_3`, `slot_4`, `brand`, `color`, `date`, `type`) VALUES
(129, 'Fresh ocean deodorant', 'Fresh-ocean-deodorant', 'Fresh-ocean-deodorant_15447345431.jpg', '', '', '', 7, 6, 13.00, 0.00, '<ul>\n	<li>\n	<h2>OVERVIEW</h2>\n\n	<p>NIVEA MEN Fresh Ocean Deodorant, for men who want ocean freshness, all day long.</p>\n\n	<p>Untamed, fresh, and full of stories &ndash; the fresh aqua fragrance of the ocean in this deo for men, helps you stay ahead in every venture by giving you long-lasting freshness. &nbsp;Not just that, this body spray for men helps keep body odour in check, regardless of how hectic your day is.</p>\n\n	<p>Enriched with ocean extracts and a fresh aqua scent, the NIVEA MEN Fresh Ocean Deodorant ensures long-lasting freshness and enhances positive experiences, to keep you ocean-fresh.</p>\n\n	<p>Unlike other men&rsquo;s deodorants, it is enriched with an optimal combination of reliable deodorant protection and NIVEA&reg; MEN Care Complex, which cares for your underarms. Making this men&rsquo;s deo a way to stay odour-free all day long, and avoid any damage to your skin.</p>\n\n	<p>Here&rsquo;s a deodorant for men that can be your one-spray solution for a long day ahead. The perfect partner for a late evening gathering or a quaint dinner after work. Don&rsquo;t just freshen up, carry along the freshness of the ocean! It starts with you!</p>\n\n	<h2>RESULT</h2>\n	</li>\n	<li>Long-lasting freshness</li>\n	<li>Day-long body odour control</li>\n	<li>Aqua fresh scent</li>\n	<li>NIVEA&rsquo;s trusted skin care expertise</li>\n	<li>\n	<p>&nbsp;</p>\n\n	<h2>USAGE</h2>\n\n	<p>&nbsp;</p>\n	</li>\n	<li>Hold the can 10-15 cms away.</li>\n	<li>Spray directly on underarm and on body.</li>\n	<li>Apply on skin for best results.</li>\n</ul>\n', '', 0, 0, 0, 0, 0, 0, 0, 0, 5, '', '2018-12-13 20:55:44', 'product'),
(130, 'Cool kick roll on ', 'Cool-kick-roll-on', 'Cool-kick-roll-on_15447347631.jpg', '', '', '', 7, 6, 13.00, 0.00, '<p><a href="http://www.amazon.in/Nivea-Deo-Cool-Kick-Roll/dp/B007E9KG6S/ref=sr_1_2?ie=UTF8&amp;qid=1441344803&amp;sr=8-2&amp;keywords=nivea+men+Cool+Kick+Roll+On" id="content_0_cta1link" target="_blank">FIND A STORE</a></p>\n\n<h2>OVERVIEW</h2>\n\n<p>NIVEA MEN Cool Kick Roll-on, for men who want an instant cool kick of freshness with effective anti-perspirant protection.</p>\n\n<p>It is a roll-on deodorant, which gives instant freshness, even after a long journey or a workout. Enriched with a Cool Care formula, this roll-on gives a long-lasting feeling of freshness. Its effective anti-perspirant formula regulates sweat and reduces formation of odour causing bacteria in the underarms to ensure day-long body odour protection.</p>\n\n<p>A roll-on for the man who is always on the move. Its long-lasting masculine fragrance revitalizes all the senses and gives day-long freshness and confidence to breeze through the day. This roll-on for men ensures effective body odour protection in all your daily tasks and activities.</p>\n\n<p>That&rsquo;s not all; this roll-on for men has the optimal combination of reliable deodorant protection and the NIVEA MEN Care Complex, which makes it especially caring for your underarms. It has been dermatologically proven to cause no harm to your underarm skin.</p>\n\n<p>So chase your dreams, or the morning bus, this roll-on for men can give you the energy to take everything life puts in front of you, head on.&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<h2>RESULT</h2>\n\n<ul>\n	<li>Day long body odour control.</li>\n	<li>Long lasting freshness.</li>\n	<li>Fresh masculine scent.</li>\n</ul>\n\n<p>&nbsp;</p>\n\n<h2>USAGE</h2>\n\n<p>&nbsp;</p>\n\n<ul>\n	<li>Roll on evenly on your underarm skin.</li>\n	<li>Allow the product to dry before dressing.</li>\n</ul>\n', '', 0, 0, 0, 0, 0, 0, 0, 0, 5, '', '2018-12-13 20:59:23', 'product'),
(131, 'NIVEA men deep impact roll on deodorant', 'NIVEA-men-deep-impact-roll-on-deodorant', 'NIVEA-men-deep-impact-roll-on-deodorant_15447348481.jpg', '', '', '', 7, 6, 13.00, 0.00, '<p>&nbsp;</p>\n\n<p><a href="http://www.amazon.in/Nivea-Deo-Cool-Kick-Roll/dp/B007E9KG6S/ref=sr_1_2?ie=UTF8&amp;qid=1441344803&amp;sr=8-2&amp;keywords=nivea+men+Cool+Kick+Roll+On" id="content_0_cta1link" target="_blank">FIND A STORE</a></p>\n\n<h2>OVERVIEW</h2>\n\n<p>NIVEA MEN Cool Kick Roll-on, for men who want an instant cool kick of freshness with effective anti-perspirant protection.</p>\n\n<p>It is a roll-on deodorant, which gives instant freshness, even after a long journey or a workout. Enriched with a Cool Care formula, this roll-on gives a long-lasting feeling of freshness. Its effective anti-perspirant formula regulates sweat and reduces formation of odour causing bacteria in the underarms to ensure day-long body odour protection.</p>\n\n<p>A roll-on for the man who is always on the move. Its long-lasting masculine fragrance revitalizes all the senses and gives day-long freshness and confidence to breeze through the day. This roll-on for men ensures effective body odour protection in all your daily tasks and activities.</p>\n\n<p>That&rsquo;s not all; this roll-on for men has the optimal combination of reliable deodorant protection and the NIVEA MEN Care Complex, which makes it especially caring for your underarms. It has been dermatologically proven to cause no harm to your underarm skin.</p>\n\n<p>So chase your dreams, or the morning bus, this roll-on for men can give you the energy to take everything life puts in front of you, head on.&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<h2>RESULT</h2>\n\n<ul>\n	<li>Day long body odour control.</li>\n	<li>Long lasting freshness.</li>\n	<li>Fresh masculine scent.</li>\n</ul>\n\n<p>&nbsp;</p>\n\n<h2>USAGE</h2>\n\n<p>&nbsp;</p>\n\n<ul>\n	<li>Roll on evenly on your underarm skin.</li>\n	<li>Allow the product to dry before dressing.</li>\n</ul>\n', '', 0, 0, 0, 0, 0, 0, 0, 0, 5, '', '2018-12-13 21:00:48', 'product'),
(132, 'NIVEA men protect and care roll on', 'NIVEA-men-protect-and-care-roll-on', 'NIVEA-men-protect-and-care-roll-on_15447350011.jpg', '', '', '', 7, 6, 13.00, 0.00, '<h2>OVERVIEW</h2>\n\n<p>NIVEA MEN Protect &amp; Care Roll-on gives you day-long body odour control without underarm irritation.<br />\n<br />\nIts unique formula contains 0% Alcohol which ensures no skin irritation or burning on application. The woody masculine scent gives you long-lasting freshness. It has the optimal combination of reliable deodorant protection and NIVEA&reg; MEN Care Complex.<br />\n<br />\nSkin tolerance dermatologically proven. Contains 0% alcohol.</p>\n\n<h2>RESULT</h2>\n\n<ul>\n	<li>Day long body odour control.</li>\n	<li>No Irritation.</li>\n	<li>Long lasting freshness.</li>\n	<li>Fresh masculine scent.</li>\n</ul>\n', '', 0, 0, 0, 0, 0, 0, 0, 0, 5, '', '2018-12-13 21:03:21', 'product'),
(133, 'Fresh active roll on', 'Fresh-active-roll-on', 'Fresh-active-roll-on_15447350471.jpg', '', '', '', 7, 6, 13.00, 0.00, '<h2>RESULT</h2>\n\n<ul>\n	<li>Gives long-lasting freshness</li>\n	<li>Ensures day-long body odour control</li>\n	<li>Has a fresh masculine fragrance</li>\n</ul>\n\n<p>&nbsp;</p>\n\n<h2>USAGE</h2>\n\n<p>&nbsp;</p>\n\n<ul>\n	<li>Roll on evenly on your underarm skin.</li>\n	<li>Allow the product to dry before dressing.</li>\n</ul>\n', '', 0, 0, 0, 0, 0, 0, 0, 0, 5, '', '2018-12-13 21:04:08', 'product'),
(134, 'Fresh power roll on', 'Fresh-power-roll-on', 'Fresh-power-roll-on_15447351051.jpg', '', '', '', 7, 6, 13.00, 0.00, '<h2>OVERVIEW</h2>\n\n<p>NIVEA MEN Fresh Power Charge Roll-on, for men who want to feel fresh all day with a charge of powerful masculine fragrance.</p>\n\n<p>Not every morning guarantees a hearty breakfast or a refreshing cool shower. Its demand for a fresh and a zestful start often is missed. NIVEA MEN Fresh Power Charge Roll-on comes with a powerful, warm, and masculine fragrance that provides long-lasting freshness. It contains musk and oriental notes that provide an instant gush of energy. Just one use of this roll-on deodorant before rushing out of the door, will levitate you with all the energy that you need for the entire day.</p>\n\n<p>Formulated with an optimal combination of reliable deodorant protection and NIVEA&reg; MEN Care Complex, this roll-on for men delivers its promise of odour control far ahead of its peers. It contains no alcohol and has been dermatologically proven to cause no harm to your underarm skin.</p>\n\n<p>Work towards your dreams or spend an entire day with loved one, this roll-on will give you enough energy to handle all that life puts in front of you every day. It lets you be proactive without causing damage to your skin.</p>\n\n<p>Don&rsquo;t just start your day, kick start it!</p>\n\n<h2>RESULT</h2>\n\n<ul>\n	<li>Day long body odour control.</li>\n	<li>Long lasting freshness.</li>\n	<li>Warm musk and oriental scent.</li>\n</ul>\n\n<p>&nbsp;</p>\n\n<h2>USAGE</h2>\n\n<p>&nbsp;</p>\n\n<ul>\n	<li>Roll on evenly on your underarm skin.</li>\n	<li>Allow the product to dry before dressing.</li>\n</ul>\n', '', 0, 0, 0, 0, 0, 0, 0, 0, 5, '', '2018-12-13 21:05:05', 'product'),
(135, 'Bronz Tone Maxi Tone Fade Milk With Cocoa Butter &amp; Honey ', 'Bronz-Tone-Maxi-Tone-Fade-Milk-With-Cocoa-Butter-amp-Honey', 'Bronz-Tone-Maxi-Tone-Fade-Milk-With-Cocoa-Butter-amp-Honey_15447391281.jpg', '', '', '', 8, 6, 16.00, 0.00, '<p>Bronze Tone is a moisturizing formula with cocoa butter and honey extracts. With UV Protection, it removes undesireble spots and leaves your skin soft and glowing andgivesit a radiant bronze complexion.</p>\n', '', 0, 1, 0, 1, 0, 0, 0, 0, 14, '', '2018-12-13 22:12:08', 'product'),
(136, ' El-glittas Hair Wonder Natural Hair Treatment &amp; Growth Cream', 'El-glittas-Hair-Wonder-Natural-Hair-Treatment-amp-Growth-Cream', 'El-glittas-Hair-Wonder-Natural-Hair-Treatment-amp-Growth-Cream_15447397311.jpg', '', '', '', 8, 6, 12.00, 0.00, '<ul>\n	<li>Volume: 200g</li>\n	<li>100% Natural Ingredients</li>\n	<li>Nourishes Hair from Scalp</li>\n	<li>For Shiny Longer Hair</li>\n</ul>\n', '', 1, 0, 0, 1, 0, 0, 0, 0, 15, '', '2018-12-13 22:22:11', 'product'),
(137, 'El-glittas Hair Wonder Natural Oil', 'El-glittas-Hair-Wonder-Natural-Oil', 'El-glittas-Hair-Wonder-Natural-Oil_15447399741.jpg', 'El-glittas-Hair-Wonder-Natural-Oil_15447399742.jpg', '', '', 8, 6, 15.00, 0.00, '<ul>\n	<li>Volume: 70ml</li>\n	<li>With Natural Shea Oil</li>\n	<li>Nutrient Rich</li>\n</ul>\n', '', 0, 1, 0, 1, 0, 0, 0, 0, 15, '', '2018-12-13 22:26:14', 'product'),
(138, 'BOD man&reg; Vapor 8oz Fragrance Body Spray', 'BOD-man-reg-Vapor-8oz-Fragrance-Body-Spray', 'BOD-man-reg-Vapor-8oz-Fragrance-Body-Spray_15447409021.jpg', '', '', '', 7, 6, 23.50, 0.00, '<p>Vapor blends fresh citrus notes with crisp ferns overlaid with clean aquatic notes for a clean, masuline fragrance.&nbsp;</p>\n\n<ul>\n	<li>Top: White Grapefruit, Crisp Ozone</li>\n	<li>Middle: Cedar Leaf, Blue Spruce</li>\n	<li>Base: Cool Moss, Brushed White Suede, Fresh Musk</li>\n</ul>\n\n<p>&nbsp;</p>\n\n<p>BOD man products are formulated with only the finest quality fragrances in sexy scents she loves.&nbsp;Long lasting but never overpowering. What you spray on... stays on!</p>\n', '', 0, 0, 0, 0, 0, 0, 0, 0, 16, '', '2018-12-13 22:41:42', 'product'),
(139, 'BOD man&reg; Red Rush 8oz Fragrance Body Spray', 'BOD-man-reg-Red-Rush-8oz-Fragrance-Body-Spray', 'BOD-man-reg-Red-Rush-8oz-Fragrance-Body-Spray_15447410521.jpg', '', '', '', 7, 6, 23.50, 0.00, '<p>Red Rush is a warm, strong fragrance, with a blend of fresh citrus and musky patchouli.</p>\n\n<ul>\n	<li>Top: Mandarin, Lime Zest</li>\n	<li>Middle: Orange Blossom, Cardamom</li>\n	<li>Base: Red cedar, Australian Sandalwood</li>\n</ul>\n\n<p>&nbsp;</p>\n\n<p>BOD man products are formulated with only the finest quality fragrances in sexy scents she loves.&nbsp;Long lasting but never overpowering. What you spray on... stays on!</p>\n', '', 0, 0, 0, 0, 0, 0, 0, 0, 16, '', '2018-12-13 22:44:12', 'product'),
(140, 'BOD man&reg; Heroic 8oz Fragrance Body Spray', 'BOD-man-reg-Heroic-8oz-Fragrance-Body-Spray', 'BOD-man-reg-Heroic-8oz-Fragrance-Body-Spray_15447414871.jpg', '', '', '', 7, 6, 23.50, 0.00, '<p><em>Heroic</em>&nbsp;is a mix of oriental spices and creamy vanilla and cashmere for a bold, long-lasting fragrance.</p>\n\n<p>For every purchase of BOD man Heroic,&nbsp;7.5% of net price will be donated to Homes for Our Troops. &nbsp;Homes for Our Troops provides mortgage-free, specially adapted homes nationwide for severely injured Veterans of post 9/11, enabling them to rebuild their lives.</p>\n\n<p>&nbsp;</p>\n\n<p>Top Notes: Chilled Black Pepper, Sliced Ginger</p>\n\n<p>Middle Notes: Orange Flower, Iced Juniper, Vanilla Absolute</p>\n\n<p>Base Notes: Cashmere Woods, Tonka Bean, Young Patchouli&nbsp;</p>\n', '', 0, 0, 0, 0, 0, 0, 0, 0, 16, '', '2018-12-13 22:45:47', 'product'),
(142, 'BOD Man&reg; Black 8oz Fragrance Body Spray', 'BOD-Man-reg-Black-8oz-Fragrance-Body-Spray', 'BOD-Man-reg-Black-8oz-Fragrance-Body-Spray_15447415671.jpg', '', '', '', 7, 6, 23.50, 0.00, '<p>BOD Man&reg; Black Body Spray is smooth, potent and smokin&rsquo; hot. So beyond what you &ldquo;or she&rdquo; has ever smelled before. Irresistibly sexy! In this body spray the essence of crisp verbena is highlighted by wild bergamot and a bright citrus zest accord. The masculine impact is revealed in the midnote where white sage, orange blossom, and a cool oceanic accord create a sense of modern seduction. The background is sexy and a bold blend of tonka bean, sandalwood, and amber intensifying the exotic charisma of this fragrance.</p>\n', '', 0, 1, 0, 0, 0, 0, 0, 0, 16, '', '2018-12-13 22:52:47', 'product'),
(143, 'BOD man&reg; Fresh Guy 8oz Fragrance Body Spray', 'BOD-man-reg-Fresh-Guy-8oz-Fragrance-Body-Spray', 'BOD-man-reg-Fresh-Guy-8oz-Fragrance-Body-Spray_15447418741.jpg', '', '', '', 7, 6, 23.50, 0.00, '<p>A spirited energy flows through&nbsp;</p>\n\n<p>BOD Man Fresh Guy Fragrance Body Spray is a vibrant combination of crisp green apple and a juicy melon accord. The full body envelops the senses in sparkling freshness created with watermelon, lily of the valley and bamboo leaf. The hype of this composition evolves into a strong and masculine character that continues in the woody, ambery notes featuring sheer musk, white sandalwood and teakwood.</p>\n', '', 0, 0, 0, 0, 0, 0, 0, 0, 16, '', '2018-12-13 22:54:20', 'product'),
(144, 'BOD man&reg; Most Wanted 8oz Fragrance Body Spray', 'BOD-man-reg-Most-Wanted-8oz-Fragrance-Body-Spray', 'BOD-man-reg-Most-Wanted-8oz-Fragrance-Body-Spray_15447420181.jpg', '', '', '', 7, 6, 23.50, 0.00, '<p>Most Wanted&hellip; very clean and very sexy. &nbsp;Hints of fresh citrus and herbs mix with smoldering woods and bold marine scents to create a full, aromatic fragrance that will last for hours and hours.</p>\n\n<p>Dare to be wanted.</p>\n', '', 0, 0, 1, 0, 0, 0, 0, 0, 16, '', '2018-12-13 23:00:18', 'product'),
(145, 'BOD man&reg; Blue Surf 8oz Fragrance Body Spray', 'BOD-man-reg-Blue-Surf-8oz-Fragrance-Body-Spray', 'BOD-man-reg-Blue-Surf-8oz-Fragrance-Body-Spray_15447421191.jpg', '', '', '', 7, 6, 23.50, 0.00, '<p>Blue Surf is a brisk, aromatic herbal fragrance with a crisp, invigorating signature and warm sexy musk background.</p>\n', '', 0, 0, 0, 0, 0, 0, 0, 0, 16, '', '2018-12-13 23:02:00', 'product'),
(146, 'BOD man&reg; Lights Out 8oz Fragrance Body Spray', 'BOD-man-reg-Lights-Out-8oz-Fragrance-Body-Spray', 'BOD-man-reg-Lights-Out-8oz-Fragrance-Body-Spray_15447422091.jpg', '', '', '', 7, 6, 23.50, 0.00, '<p>Warm and spicy meet fresh and cool in the newest fragrance from BOD Man&reg;, LIGHTS OUT.&nbsp; Soft fruits and florals are married with rich leather, woods, and amber notes to create an incredibly powerful fragrance.&nbsp;</p>\n', '', 0, 0, 0, 0, 0, 0, 0, 0, 16, '', '2018-12-13 23:03:29', 'product'),
(147, 'BOD Man&reg; Really Ripped Abs 8oz Fragrance Body Spray', 'BOD-Man-reg-Really-Ripped-Abs-8oz-Fragrance-Body-Spray', 'BOD-Man-reg-Really-Ripped-Abs-8oz-Fragrance-Body-Spray_15447422941.jpg', '', '', '', 7, 6, 23.50, 0.00, '<p>With BOD Man&reg; Really Ripped Abs Fragrance Body Spray you will experience a &ldquo;just out of the shower&rdquo; clean. This fragrance begins with citrus notes of bergamot and mandarin orange followed by a fresh, natural outdoorsy sensation that includes crisp green sage and masculine notes of geranium and lavender. This fragrance exudes powerful sex appeal from the sexy warm musk, creamy sandalwood and energizing cedarwood.</p>\n', '', 0, 0, 0, 0, 0, 0, 0, 0, 16, '', '2018-12-13 23:04:55', 'product'),
(148, 'BOD man&reg; Black 6oz Fragrance Body Spray', 'BOD-man-reg-Black-6oz-Fragrance-Body-Spray', 'BOD-man-reg-Black-6oz-Fragrance-Body-Spray_15447424981.jpg', '', '', '', 7, 6, 23.50, 0.00, '<p>BOD Man&reg; Black Fragrance Body Spray is smooth, potent and smokin&rsquo; hot. So beyond what you &ldquo;or she&rdquo; has ever smelled before. Irresistibly sexy!<br />\nIn this body spray the essence of crisp verbena is highlighted by wild bergamot and a bright citrus zest accord. The masculine impact is revealed in the midnote where white sage, orange blossom, and a cool oceanic accord create a sense of modern seduction. The background is sexy and a bold blend of tonka bean, sandalwood, and amber intensifying the exotic charisma of this fragrance.</p>\n\n<p><br />\nTop:&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; Bergamot, Lemon<br />\nMiddle:&nbsp; Olive Flower<br />\nBase:&nbsp;&nbsp;&nbsp;&nbsp; Guaiac Wood, Tonka</p>\n', '', 0, 0, 0, 0, 0, 0, 0, 0, 16, '', '2018-12-13 23:08:18', 'product'),
(149, 'BOD man&reg; Really Ripped Abs 6oz Fragrance Body Spray', 'BOD-man-reg-Really-Ripped-Abs-6oz-Fragrance-Body-Spray', 'BOD-man-reg-Really-Ripped-Abs-6oz-Fragrance-Body-Spray_15447425611.jpg', '', '', '', 7, 6, 23.50, 0.00, '<p>With BOD Man&reg; Really Ripped Abs Fragrance Body Spray you will experience a &ldquo;just out of the shower&rdquo; clean. This fragrance begins with citrus notes of bergamot and mandarin orange followed by a fresh, natural outdoorsy sensation that includes crisp green sage and masculine notes of geranium and lavender. This fragrance exudes powerful sex appeal from the sexy warm musk, creamy sandalwood and energizing cedarwood.</p>\n\n<p><br />\nTop:&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; Fresh Shower Accord / Italian Bergamot / Mandarin Orange<br />\nMiddle:&nbsp; Fresh Geranium / Green Sage / French Lavender<br />\nBase:&nbsp;&nbsp;&nbsp;&nbsp; Creamy Musk / Energizing Cedarwood / Sexy Warm Musk</p>\n', '', 0, 0, 0, 0, 0, 0, 0, 0, 16, '', '2018-12-13 23:09:21', 'product'),
(150, 'BOD man&reg; Fresh Guy 6oz Fragrance Body Spray', 'BOD-man-reg-Fresh-Guy-6oz-Fragrance-Body-Spray', 'BOD-man-reg-Fresh-Guy-6oz-Fragrance-Body-Spray_15447426271.jpg', '', '', '', 7, 6, 23.50, 0.00, '<p>A spirited energy flows through BOD Man Fresh Guy Fragrance Body Spray is a vibrant combination of crisp green apple and a juicy melon accord. The full body envelops the senses in sparkling freshness created with watermelon, lily of the valley and bamboo leaf. The hype of this composition evolves into a strong and masculine character that continues in the woody, ambery notes featuring sheer musk, white sandalwood and teakwood.</p>\n\n<p><br />\nTop: Green Apple / Melon Accord / Watermelon<br />\nMiddle:&nbsp; Bamboo Leaf / Lily of the Valley / Violet<br />\nBase:&nbsp; White Sandalwood / Sheer Musk / Amber&nbsp;</p>\n', '', 0, 0, 0, 0, 0, 0, 0, 0, 16, '', '2018-12-13 23:10:28', 'product'),
(151, 'BOD man&reg; Most Wanted 6oz Fragrance Body Spray', 'BOD-man-reg-Most-Wanted-6oz-Fragrance-Body-Spray', 'BOD-man-reg-Most-Wanted-6oz-Fragrance-Body-Spray_15447426921.jpg', '', '', '', 7, 6, 23.50, 0.00, '<p>Most Wanted&hellip; very clean and very sexy.&nbsp; Hints of fresh citrus and herbs mix with smoldering woods and bold marine scents to create a full, aromatic fragrance that will last for hours and hours.</p>\n\n<p><br />\nDare to be wanted.<br />\nTop:&nbsp; Brazilian Bergamot / Fresh Sage Leaves / Meyer Lemon Zest / Crisp Marine Notes / Cantaloupe Melon<br />\nMiddle:&nbsp; English Lavender / Jasmine Sambac / Atlantic Cedarwood / Orange Blossom<br />\nBase:&nbsp;&nbsp;&nbsp;&nbsp; Molten Amber Crystals / Spanish Oakmoss / Blonde Wood / White Musk</p>\n', '', 0, 1, 1, 0, 0, 0, 0, 0, 16, '', '2018-12-13 23:11:33', 'product'),
(152, 'BOD man&reg; Blue Surf 6oz Fragrance Body Spray', 'BOD-man-reg-Blue-Surf-6oz-Fragrance-Body-Spray', 'BOD-man-reg-Blue-Surf-6oz-Fragrance-Body-Spray_15447427701.jpg', '', '', '', 7, 6, 23.50, 0.00, '<p>Blue Surf is a brisk, aromatic herbal fragrance with a crisp, invigorating signature and warm sexy musk background.</p>\n\n<p><br />\nTop: Chilled Cucumber / Ocean Breeze Accord / Bergamot<br />\nMiddle: Blue Lavender / Black Pepper / Violet Leaf<br />\nBase: Cedarwood / Patchouli / Guiacwood</p>\n', '', 0, 0, 0, 0, 0, 0, 0, 0, 16, '', '2018-12-13 23:12:51', 'product'),
(153, 'BOD man&reg; Dark Ice 8oz Fragrance Body Spray', 'BOD-man-reg-Dark-Ice-8oz-Fragrance-Body-Spray', 'BOD-man-reg-Dark-Ice-8oz-Fragrance-Body-Spray_15447430611.jpg', '', '', '', 7, 6, 23.50, 0.00, '<p>Dark Ice is a&nbsp; strong, clean, aquatic fragrance with notes of Italian bergamot, shaved nutmeg, green tea leaves, Baltic amber, and sensual skin musk.</p>\n\n<p><br />\nTop: Italian Bergamot /Cardoman /Papaya<br />\nMiddle: Shaved Nutmeg / Green Tea Leaves/ Violet Buds&nbsp;<br />\nBase: Baltic Amber / Skin Musk&nbsp;</p>\n', '', 0, 0, 0, 0, 0, 0, 0, 0, 16, '', '2018-12-13 23:17:41', 'product'),
(154, 'BOD man&reg; Midnight Reign 8oz Fragrance Body Spray', 'BOD-man-reg-Midnight-Reign-8oz-Fragrance-Body-Spray', 'BOD-man-reg-Midnight-Reign-8oz-Fragrance-Body-Spray_15447431351.jpg', '', '', '', 7, 6, 23.50, 0.00, '<p>Rule the night with Midnight Reign. This crisp, aquatic fragrance is a clean blend of crystal clear water, lush foliage and woody herbs.</p>\n\n<p><br />\nTop: Bergamot / Lemon / Mandarin<br />\nMiddle: Lavender / Myrrh / Clove / Nutmeg / Coriander&nbsp;<br />\nBase: Vanilla / Amber / Incense / Vetiver&nbsp;</p>\n', '', 0, 0, 0, 0, 0, 0, 0, 0, 16, '', '2018-12-13 23:18:55', 'product'),
(155, 'BOD man&reg; Fresh Blue Musk 8oz Body Spray', 'BOD-man-reg-Fresh-Blue-Musk-8oz-Body-Spray', 'BOD-man-reg-Fresh-Blue-Musk-8oz-Body-Spray_15447440341.jpg', '', '', '', 7, 6, 23.50, 0.00, '<p>Fresh Blue Musk, one of BOD Man&rsquo;s most popular Fragrance Body Sprays, is warm, sexy, and incredibly long-lasting.&nbsp;</p>\n\n<p>The fragrance opens fresh and light.&nbsp; As the scent evolves the background dries down warm and creamy with masculine woods and musks.&nbsp; It will leave her saying&nbsp;<em>&ldquo;I want your BOD!&rdquo;</em></p>\n', '', 0, 1, 0, 0, 0, 0, 0, 0, 16, '', '2018-12-13 23:33:54', 'product'),
(156, 'NIVEA cleanse and care cleansing milk', 'NIVEA-cleanse-and-care-cleansing-milk', 'NIVEA-cleanse-and-care-cleansing-milk_15447445331.jpg', '', '', '', 8, 6, 17.00, 0.00, '<ul>\n	<li>cleanses your skin thoroughly and mildly, removing impurities</li>\n	<li>removes make-up and even waterproof mascara</li>\n	<li>protects your skin&#39;s natural moisture balance</li>\n	<li>the caring formula with Eucerit&reg;, Panthenol and the unique scent of NIVEA Creme is suitable for all skin types</li>\n</ul>\n', '', 0, 0, 0, 0, 0, 0, 0, 0, 16, '', '2018-12-13 23:42:13', 'product'),
(157, 'PEARL &amp; BEAUTY ANTI-PERSPIRANT DEODORANT SPRAY', 'PEARL-amp-BEAUTY-ANTI-PERSPIRANT-DEODORANT-SPRAY', 'PEARL-amp-BEAUTY-ANTI-PERSPIRANT-DEODORANT-SPRAY_15449538241.jpg', '', '', '', 7, 6, 13.00, 0.00, '<p>Nivea Pearl &amp; Beauty Deodorant Spray for Women is perfect for beautiful, smooth underarms and provides the best ever 24-hour protection against underarm wetness and odour.</p>\n\n<p>&nbsp;</p>\n\n<h3>Product Specification</h3>\n\n<p>Size (250) Unit (ML) Height (21.4) Width (5) Depth (5)</p>\n', '																					  ', 1, 0, 0, 0, 0, 0, 0, 1, 5, '', '2018-12-16 08:09:15', 'product'),
(158, 'DRY FRESH ANTI-PERSPIRANT DEODORANT SPRAY', 'DRY-FRESH-ANTI-PERSPIRANT-DEODORANT-SPRAY', 'DRY-FRESH-ANTI-PERSPIRANT-DEODORANT-SPRAY_15449537281.jpg', '', '', '', 7, 6, 13.00, 0.00, '<p>For powerful protection tested in real life situations.</p>\n\n<p>Skin tolerance dermatologically approved, 0% ethyl alcohol, Dual Active formula with 2 anti-perspirant actives and a long-lasting dry feeling, Powerful protection tested in real life situations., 48h effective anti-perspirant protection that cares for your skin</p>\n', '', 0, 0, 0, 0, 0, 0, 0, 1, 5, '', '2018-12-16 09:47:42', 'product'),
(159, 'DOUBLE EFFECT ANTI-PERSPIRANT DEODORANT SPRAY', 'DOUBLE-EFFECT-ANTI-PERSPIRANT-DEODORANT-SPRAY', 'DOUBLE-EFFECT-ANTI-PERSPIRANT-DEODORANT-SPRAY_15449539761.jpg', '', '', '', 7, 6, 13.00, 0.00, '<p>NIVEA&reg; Double Effect Violet Senses Deodorant softens the skin, helping you get a close shave.</p>\n\n<p>&nbsp;</p>\n\n<h3>Benefits</h3>\n\n<p>&nbsp;</p>\n\n<p>Specially designed formula, with natural avocado extract, for smoother underarms for longer.</p>\n\n<p>Violet senses - a delicate flower fragrance with 48h confidence, anti-perspirant protection.</p>\n\n<p>&nbsp;</p>\n\n<h3>Product Specification</h3>\n\n<p>Size (250) Unit (ML) Height (21.4) Width (5) Depth (5)</p>\n', '', 0, 0, 0, 0, 0, 0, 0, 1, 5, '', '2018-12-16 09:52:56', 'product'),
(160, 'Wig', 'Wig', 'Wig_15450514651.jpg', 'Wig_15450514652.jpg', '', '', 16, 7, 120.00, 0.00, '<p>Wigs</p>\n', '																																  										  ', 0, 0, 0, 0, 1, 0, 0, 0, 0, '', '2018-12-17 12:57:45', 'product'),
(161, 'Wigs', 'Wigs', 'Wigs_15450515091.jpg', '', '', '', 16, 7, 120.00, 0.00, '<p>Long Wigs</p>\n', '																					  ', 0, 0, 0, 0, 1, 0, 0, 0, 0, '', '2018-12-17 12:58:29', 'product');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url_title` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `facebook_status` int(1) NOT NULL,
  `facebook` text NOT NULL,
  `instagram_status` int(1) NOT NULL,
  `instagram` text NOT NULL,
  `twitter_status` int(1) NOT NULL,
  `twitter` text NOT NULL,
  `google_status` int(1) NOT NULL,
  `google` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `title`, `url_title`, `position`, `image`, `facebook_status`, `facebook`, `instagram_status`, `instagram`, `twitter_status`, `twitter`, `google_status`, `google`, `date`) VALUES
(2, 'Member 1', 'Member-1', 'head', 'Member-1_1532167742.jpg', 1, 'facebook', 1, 'instagram', 1, 'twitter', 0, '', '2018-07-21 10:09:02'),
(3, 'Member 2', 'Member-2', 'new member', 'Member-2_1532168904.jpg', 1, 'facebook', 0, '', 1, 'twitter', 0, '', '2018-07-21 10:28:24');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `customer_id`, `product_id`, `product_name`, `price`, `image`, `date`) VALUES
(9, 0, 5, 'new grass', 22.00, 'new-grass_15422136181.jpg', '2018-11-20 11:13:51'),
(10, 0, 6, 'oil product', 3.00, 'oil-product_15425340031.png', '2018-11-20 11:14:16'),
(11, 0, 1, 'Handle Poly Scoop', 10.00, 'Handle-Poly-Scoop_15424973161.jpg', '2018-11-20 11:23:44'),
(24, 6, 5, 'new grass', 22.00, 'new-grass_15422136181.jpg', '2018-11-20 14:18:56'),
(25, 6, 1, 'Handle Poly Scoop', 10.00, 'Handle-Poly-Scoop_15424973161.jpg', '2018-11-20 14:19:00'),
(26, 6, 6, 'oil product', 3.00, 'oil-product_15425340031.png', '2018-11-20 14:19:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `albumimages`
--
ALTER TABLE `albumimages`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`album_ID`);

--
-- Indexes for table `apps_countries`
--
ALTER TABLE `apps_countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `list_tags`
--
ALTER TABLE `list_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `news` ADD FULLTEXT KEY `title` (`title`,`description`,`keywords`,`category`);
ALTER TABLE `news` ADD FULLTEXT KEY `title_2` (`title`,`description`,`keywords`,`category`);
ALTER TABLE `news` ADD FULLTEXT KEY `title_3` (`title`,`description`,`keywords`,`category`);
ALTER TABLE `news` ADD FULLTEXT KEY `title_4` (`title`,`description`,`keywords`,`category`);
ALTER TABLE `news` ADD FULLTEXT KEY `title_5` (`title`,`description`,`keywords`,`category`);
ALTER TABLE `news` ADD FULLTEXT KEY `title_6` (`title`,`description`,`keywords`,`category`);
ALTER TABLE `news` ADD FULLTEXT KEY `title_7` (`title`,`description`,`keywords`,`category`);
ALTER TABLE `news` ADD FULLTEXT KEY `title_8` (`title`,`description`,`keywords`,`category`);
ALTER TABLE `news` ADD FULLTEXT KEY `title_9` (`title`,`description`,`keywords`,`category`);
ALTER TABLE `news` ADD FULLTEXT KEY `title_10` (`title`,`description`,`keywords`,`category`);
ALTER TABLE `news` ADD FULLTEXT KEY `title_11` (`title`,`description`,`keywords`,`category`);
ALTER TABLE `news` ADD FULLTEXT KEY `title_12` (`title`,`description`,`keywords`,`category`);
ALTER TABLE `news` ADD FULLTEXT KEY `title_13` (`title`,`description`,`keywords`,`category`);
ALTER TABLE `news` ADD FULLTEXT KEY `title_14` (`title`,`description`,`keywords`,`category`);
ALTER TABLE `news` ADD FULLTEXT KEY `title_15` (`title`,`description`,`keywords`,`category`);
ALTER TABLE `news` ADD FULLTEXT KEY `title_16` (`title`,`description`,`keywords`,`category`);

--
-- Indexes for table `newsletter_emails`
--
ALTER TABLE `newsletter_emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_brands`
--
ALTER TABLE `products_brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_categories`
--
ALTER TABLE `products_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_subcategories`
--
ALTER TABLE `products_subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `single_images`
--
ALTER TABLE `single_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_2` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_3` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_4` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_5` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_6` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_7` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_8` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_9` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_10` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_11` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_12` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_13` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_14` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_15` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_16` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_17` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_18` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_19` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_20` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_21` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_22` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_23` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_24` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_25` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_26` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_27` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_28` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_29` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_30` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_31` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_32` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_33` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_34` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_35` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_36` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_37` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_38` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_39` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_40` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_41` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_42` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_43` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_44` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_45` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_46` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_47` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_48` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_49` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_50` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_51` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_52` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_53` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_54` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_55` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_56` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_57` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_58` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_59` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_60` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_61` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_62` (`title`,`description`,`keywords`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `title_63` (`title`,`description`,`keywords`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `albumimages`
--
ALTER TABLE `albumimages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `album_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `apps_countries`
--
ALTER TABLE `apps_countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `newsletter_emails`
--
ALTER TABLE `newsletter_emails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `products_brands`
--
ALTER TABLE `products_brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `products_categories`
--
ALTER TABLE `products_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `products_subcategories`
--
ALTER TABLE `products_subcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `social`
--
ALTER TABLE `social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;
--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
