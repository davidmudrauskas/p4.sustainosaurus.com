-- phpMyAdmin SQL Dump
-- version 4.0.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 25, 2013 at 06:50 PM
-- Server version: 5.1.70-cll
-- PHP Version: 5.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sustaino_p4_sustainosaurus_com`
--

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE IF NOT EXISTS `states` (
  `state_id` int(11) NOT NULL AUTO_INCREMENT,
  `state` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `start_year` int(11) NOT NULL,
  `start_year_type` varchar(255) NOT NULL,
  `end_year` int(11) NOT NULL,
  `end_year_type` varchar(255) NOT NULL,
  `timeline` varchar(255) NOT NULL,
  `css_id` varchar(255) NOT NULL,
  `description_location` int(11) NOT NULL,
  PRIMARY KEY (`state_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=63 ;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`state_id`, `state`, `display_name`, `start_year`, `start_year_type`, `end_year`, `end_year_type`, `timeline`, `css_id`, `description_location`) VALUES
(1, 'Elam', 'Elam', -2700, 'BCE', -539, 'BCE', 'Iranian', 'Elam', 1),
(2, 'Xia_Dynasty', 'Xia Dynasty', -2100, 'BCE', -1600, 'BCE', 'Chinese', 'Xia_Dynasty', 1),
(3, 'Shang_Dynasty', 'Shang Dynasty', -1600, 'BCE', -1046, 'BCE', 'Chinese', 'Shang_Dynasty', 1),
(4, 'Zhou_Dynasty', 'Zhou Dynasty', -1045, 'BCE', -256, 'BCE', 'Chinese', 'Zhou_Dynasty', 1),
(5, 'Mannaeans', 'Mannaeans', -850, 'BCE', -616, 'BCE', 'Iranian', 'Mannaeans', 0),
(6, 'Medes', 'Median Empire', -678, 'BCE', -550, 'BCE', 'Iranian', 'Median_Empire', 1),
(7, 'Achaemenid_Empire', 'Achaemenid Empire', -550, 'BCE', -330, 'BCE', 'Iranian', 'Achaemenid_Empire', 2),
(8, 'Atropatene', 'Atropatene', -320, 'BCE', 300, 'CE', 'Iranian', 'Atropatene', 1),
(9, 'Seleucid_Empire', 'Seleucid Empire', -312, 'BCE', -63, 'BCE', 'Iranian', 'Seleucid_Empire', 2),
(10, 'Parthian_Empire', 'Parthian Empire', -247, 'BCE', 224, 'CE', 'Iranian', 'Parthian_Empire', 1),
(11, 'Qin_Dynasty', 'Qin Dynasty', -221, 'BCE', -206, 'BCE', 'Chinese', 'Qin_Dynasty', 1),
(12, 'Han_Dynasty', 'Han Dynasty', -206, 'BCE', 220, 'CE', 'Chinese', 'Han_Dynasty', 1),
(13, 'Three_Kingdoms', 'Three Kingdoms', 220, '', 280, '', 'Chinese', 'Three_Kingdoms', 1),
(14, 'Sasanian_Empire', 'Sasanian Empire', 224, '', 651, '', 'Iranian', 'Sasanian_Empire', 1),
(15, 'Jin_Dynasty_(265–420)', 'Jin Dynasty', 265, '', 420, '', 'Chinese', 'Jin_Dynasty', 0),
(16, 'Southern_and_Northern_Dynasties', 'Southern and Northern Dynasties', 420, '', 589, '', 'Chinese', 'Southern_and_Northern_Dynasties', 0),
(17, 'Turkic_Khaganate', 'Turkic Khaganate', 552, '', 744, '', 'Turkic', 'Turkic_Khaganate', 1),
(18, 'Avar_Khaganate', 'Avar Khaganate', 564, '', 804, '', 'Turkic', 'Avar_Khaganate', 1),
(19, 'Sui_Dynasty', 'Sui Dynasty', 581, '', 618, '', 'Chinese', 'Sui_Dynasty', 1),
(20, 'Khazars', 'Khazar Khaganate', 618, '', 1048, '', 'Turkic', 'Khazar_Khaganate', 1),
(21, 'Tang_Dynasty', 'Tang Dynasty', 618, '', 907, '', 'Chinese', 'Tang_Dynasty', 1),
(22, 'Old_Great_Bulgaria', 'Old Great Bulgaria', 632, '', 668, '', 'Turkic', 'Old_Great_Bulgaria', 2),
(23, 'Umayyad_Caliphate', 'Umayyad Caliphate', 661, '', 750, '', 'Iranian', 'Umayyad_Caliphate', 2),
(24, 'Turgesh', 'Turgesh Khaganate', 699, '', 766, '', 'Turkic', 'Turgesh_Khaganate', 1),
(25, 'Kimek_Khanate', 'Kimek Khanate', 743, '', 1035, '', 'Turkic', 'Kimek_Khanate', 1),
(26, 'Uyghur_Khaganate', 'Uyghur Khaganate', 744, '', 840, '', 'Turkic', 'Uyghur_Khaganate', 1),
(27, 'Oghuz_Yabgu_State', 'Oghuz Yabgu State', 750, '', 1055, '', 'Turkic', 'Oghuz_Yabgu_State', 1),
(28, 'Abbasid_Caliphate', 'Abbasid Caliphate', 750, '', 1258, '', 'Iranian', 'Abbasid_Caliphate', 0),
(29, 'Kara-Khanid_Khanate', 'Kara-Khanid Khanate', 840, '', 1212, '', 'Turkic', 'Kara-Khanid_Khanate', 1),
(30, 'Pechenegs', 'Pecheneg Khanates', 860, '', 1091, '', 'Turkic', 'Pecheneg_Khanates', 1),
(31, 'Five_Dynasties_and_Ten_Kingdoms_period', '5 Dynasties and 10 Kingdoms', 907, '', 960, '', 'Chinese', '5_Dynasties_and_10_Kingdoms', 0),
(32, 'Liao_Dynasty', 'Liao Dynasty', 907, '', 1125, '', 'Chinese', 'Liao_Dynasty', 1),
(33, 'Shatuo', 'Shatuo Dynasties', 923, '', 979, '', 'Turkic', 'Shatuo_Dynasties', 1),
(34, 'Song_Dynasty', 'Song Dynasty', 960, '', 1279, '', 'Chinese', 'Song_Dynasty', 2),
(35, 'Ghaznavids', 'Ghaznavid Empire', 963, '', 1186, '', 'Turkic', 'Ghaznavid_Empire', 1),
(36, 'Ghaznavids', 'Ghaznavid Empire', 963, '', 1186, '', 'Iranian', 'Ghaznavid_Empire', 1),
(37, 'Kakuyids', 'Kakuyids', 1008, '', 1141, '', 'Iranian', 'Kakuyids', 1),
(38, 'Seljuq_Empire ', 'Seljuq Empire ', 1037, '', 1194, '', 'Turkic', 'Seljuq_Empire', 1),
(39, 'Seljuq_Empire', 'Great Seljuq Empire', 1037, '', 1194, '', 'Iranian', 'Great_Seljuq_Empire', 1),
(40, 'Kipchaks', 'Kipchak Khanates', 1067, '', 1239, '', 'Turkic', 'Kipchak_Khanates', 1),
(41, 'Khwarazmian_dynasty', 'Khwarezmian Empire ', 1077, '', 1231, '', 'Turkic', 'Khwarezmian_Empire', 1),
(42, 'Khwarazmian_dynasty', 'Khwarazmian Empire', 1077, '', 1231, '', 'Iranian', 'Khwarazmian_Empire', 1),
(43, 'Sultanate_of_Rum', 'Seljuq Sultanate of Rum ', 1092, '', 1307, '', 'Turkic', 'Seljuq_Sultanate_of_Rum', 0),
(44, 'Atabegs_of_Yazd', 'Atabegs of Yazd', 1141, '', 1319, '', 'Iranian', 'Atabegs_of_Yazd', 1),
(45, 'Ghurid_dynasty', 'Ghurid Dynasty', 1148, '', 1215, '', 'Iranian', 'Ghurid_Dynasty', 0),
(46, 'Delhi_Sultanate ', 'Delhi Sultanate ', 1206, '', 1526, '', 'Turkic', 'Delhi_Sultanate', 1),
(47, 'Mihrabanids', 'Mihrabanids', 1236, '', 1537, '', 'Iranian', 'Mihrabanids', 1),
(48, 'Kurt_dynasty', 'Kurt Dynasty', 1244, '', 1396, '', 'Iranian', 'Kurt_Dynasty', 0),
(49, 'Mamluk_Sultanate_(Cairo)', 'Cairo Sultanate ', 1250, '', 1517, '', 'Turkic', 'Cairo_Sultanate', 3),
(50, 'Ilkhanate', 'Ilkhanate Empire', 1256, '', 1335, '', 'Iranian', 'Ilkhanate_Empire', 1),
(51, 'Yuan_Dynasty', 'Yuan Dynasty', 1271, '', 1368, '', 'Chinese', 'Yuan_Dynasty', 1),
(52, 'Ming_Dynasty', 'Ming Dynasty', 1368, '', 1644, '', 'Chinese', 'Ming_Dynasty', 1),
(53, 'Timurid_dynasty', 'Timurid Empire', 1370, '', 1405, '', 'Iranian', 'Timurid_Empire', 0),
(54, 'Safavid_dynasty', 'Safavid Empire', 1501, '', 1736, '', 'Iranian', 'Safavid_Empire', 1),
(55, 'Qing_Dynasty', 'Qing Dynasty', 1644, '', 1911, '', 'Chinese', 'Qing_Dynasty', 4),
(56, 'Afsharid_dynasty', 'Afsharid Empire', 1736, '', 1747, '', 'Iranian', 'Afsharid_Empire', 1),
(57, 'Qajar_dynasty', 'Qajar Empire', 1796, '', 1925, '', 'Iranian', 'Qajar_Empire', 2),
(58, 'Republic_of_China_(1912–49)', 'Republic of China', 1912, '', 1949, '', 'Chinese', 'Republic_of_China', 0),
(59, 'Pahlavi_dynasty', 'Pahlavi Dynasty', 1925, '', 1979, '', 'Iranian', 'Pahlavi_Dynasty', 0),
(60, 'History_of_the_People''s_Republic_of_China', 'People''s Republic of China', 1949, '', 2013, '', 'Chinese', 'Peoples_Republic_of_China', 0),
(61, 'Interim_Government_of_Iran_(1979)', 'Interim Government', 1979, '', 1980, '', 'Iranian', 'Interim_Government', 1),
(62, 'History_of_the_Islamic_Republic_of_Iran', 'Islamic Republic', 1980, '', 2013, '', 'Iranian', 'Islamic_Republic', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
