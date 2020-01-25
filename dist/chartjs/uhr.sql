-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2008 at 11:50 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `uhr`
--

-- --------------------------------------------------------

--
-- Table structure for table `accesslog`
--

CREATE TABLE IF NOT EXISTS `accesslog` (
  `id` int(20) NOT NULL,
  `ownerid` varchar(15) NOT NULL,
  `personnelid` varchar(15) NOT NULL,
  `status` varchar(10) NOT NULL,
  `accesskey` varchar(10) NOT NULL,
  `attempt` int(2) NOT NULL,
  `expiry_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `center`
--

CREATE TABLE IF NOT EXISTS `center` (
  `id` int(11) NOT NULL COMMENT 'COUNTER',
  `center_name` varchar(50) NOT NULL COMMENT 'CENTER NAME WITH ACRONYM',
  `center_desc` text NOT NULL COMMENT 'SHORT DESCRIPTION',
  `center_lat` bigint(20) NOT NULL COMMENT 'LATITUDE',
  `center_lon` bigint(20) NOT NULL COMMENT 'LONGITUDE',
  `center_loc` varchar(50) NOT NULL COMMENT 'STATE/COUNTRY',
  `center_accreditor` varchar(50) NOT NULL COMMENT 'GOVERNMENT | ASSOCIATION',
  `indexing` varchar(150) NOT NULL,
  `regno` varchar(20) NOT NULL,
  `type` varchar(30) NOT NULL,
  `acronym` varchar(10) NOT NULL,
  `nhis` varchar(20) NOT NULL,
  `approved_by` varchar(50) NOT NULL,
  `center_cred` varchar(200) NOT NULL,
  `commission_date` date NOT NULL,
  `commission_by` varchar(50) NOT NULL,
  `registrar` varchar(50) NOT NULL,
  `country` varchar(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `center`
--

INSERT INTO `center` (`id`, `center_name`, `center_desc`, `center_lat`, `center_lon`, `center_loc`, `center_accreditor`, `indexing`, `regno`, `type`, `acronym`, `nhis`, `approved_by`, `center_cred`, `commission_date`, `commission_by`, `registrar`, `country`) VALUES
(1, 'Apata Hebron Medical Center', 'Apata Hebron was founded in year 2015, by Dr. Akanbi james. And now a ', 193758937594850, 194878348744947, 'Asa LGA, Kwara State', 'kwara State Ministry of Health', ' APT HBRN MTKL SNTR APT HBRN WS FNTT IN YR  B TR AKNB JMS ANT N A  ', '', '', '', '', '', '', '0000-00-00', '', '', ''),
(2, 'SURE-P Primary Health Care, Ogele, Asa LGA.', 'Sure-P is a primary health care center founded as a means of reaching the local people of Ogele village with Medical care. Which is managed by Asa Local Government Authority', 989867481065, 982152014583, 'Asa LGA, Kwara State', 'kwara State Ministry of Health', ' SRP PRMR HL0 KR OJL AS LK SRP IS A PRMR HL0 KR SNTR FNTT AS A MNS OF RXNK 0 LKL PPL OF OJL FLJ W0 MTKL KR WX IS MNJT B AS LKL KFRNMNT A0RT ', '', '', '', '', '', '', '0000-00-00', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `healthlog`
--

CREATE TABLE IF NOT EXISTS `healthlog` (
  `hid` int(11) NOT NULL,
  `logdatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sid` varchar(11) NOT NULL,
  `administered_by` varchar(11) NOT NULL,
  `illness_nature` varchar(50) NOT NULL,
  `symptoms` varchar(50) NOT NULL,
  `days` int(2) NOT NULL,
  `treatments_given` varchar(50) NOT NULL,
  `actiontype` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `symptoms`
--

CREATE TABLE IF NOT EXISTS `symptoms` (
  `symptom_id` int(11) NOT NULL,
  `symptom_name` varchar(50) NOT NULL,
  `symptom_desc` varchar(100) NOT NULL,
  `disease_id` int(7) NOT NULL,
  `symptom_index` varchar(150) NOT NULL,
  `symptom_level` varchar(15) NOT NULL,
  `symptom_added_by` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(11) NOT NULL,
  `sid` varchar(10) NOT NULL,
  `surname` varchar(15) NOT NULL,
  `othernames` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `dp` varchar(50) NOT NULL,
  `blood_type` varchar(5) NOT NULL,
  `blood_group` varchar(5) NOT NULL,
  `blood_razors` varchar(10) NOT NULL,
  `blood_verification` varchar(12) NOT NULL,
  `marital_status` varchar(10) NOT NULL,
  `address1` varchar(100) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `phonenumber` varchar(15) NOT NULL,
  `nextofkinid` varchar(10) NOT NULL COMMENT 'must be a registered user',
  `role` varchar(10) NOT NULL,
  `nationality` varchar(3) NOT NULL,
  `state` varchar(5) NOT NULL,
  `voterid` varchar(50) NOT NULL,
  `nimcid` varchar(50) NOT NULL,
  `postalcode` int(8) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `sid`, `surname`, `othernames`, `email`, `password`, `dp`, `blood_type`, `blood_group`, `blood_razors`, `blood_verification`, `marital_status`, `address1`, `gender`, `phonenumber`, `nextofkinid`, `role`, `nationality`, `state`, `voterid`, `nimcid`, `postalcode`) VALUES
(1, '', 'Olasegiri', 'Oluwafemi Ennanuel', 'olasegirioluwafemi@gmail.com', 'b70abe351242b51587da114c62a9249a', '', 'O', 'AB', 'a+', '', 'S', 'NO 262 OGELE,ODO AKUO, EYENKORIN, ILORIN, KWARA STATE, NIGERIA', 'M', '+2348101336055', '1', '', 'NG', 'KW', '2e4sffdr34fe43sf', '2d3ws54dt4tdre5', 240001),
(2, '', 'Olasegiri', 'Ifeoluwa Elijah', 'wolicomedy@gmail.com', '5458ff004ef4f4ea9997441e3f04daf4', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accesslog`
--
ALTER TABLE `accesslog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `center`
--
ALTER TABLE `center`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `healthlog`
--
ALTER TABLE `healthlog`
  ADD PRIMARY KEY (`hid`);

--
-- Indexes for table `symptoms`
--
ALTER TABLE `symptoms`
  ADD PRIMARY KEY (`symptom_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`), ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accesslog`
--
ALTER TABLE `accesslog`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `center`
--
ALTER TABLE `center`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'COUNTER',AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `healthlog`
--
ALTER TABLE `healthlog`
  MODIFY `hid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `symptoms`
--
ALTER TABLE `symptoms`
  MODIFY `symptom_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
