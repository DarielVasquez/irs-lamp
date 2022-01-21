-- phpMyAdmin SQL Dump
-- version 4.0.10deb1ubuntu0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 13, 2021 at 11:48 AM
-- Server version: 5.5.62-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `IRS`
--

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE IF NOT EXISTS `campaigns` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `campaigname` varchar(256) DEFAULT NULL,
  `locationid` int(11) DEFAULT NULL,
  `lobid` int(11) DEFAULT NULL,
  `comments` varchar(256) DEFAULT NULL,
  `createddate` date DEFAULT NULL,
  `createid` int(11) DEFAULT NULL,
  `modifydate` date DEFAULT NULL,
  `modifyid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `locationid` (`locationid`),
  KEY `lobid` (`lobid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `entries`
--

CREATE TABLE IF NOT EXISTS `entries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entrytypeid` int(11) DEFAULT NULL,
  `campaignid` int(11) DEFAULT NULL,
  `startdate` date DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  `description` varchar(256) DEFAULT NULL,
  `comments` varchar(256) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `statusid` int(11) DEFAULT NULL,
  `modifydate` date DEFAULT NULL,
  `modifyid` int(11) DEFAULT NULL,
  `createdate` date DEFAULT NULL,
  `createid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `entrytypeid` (`entrytypeid`,`campaignid`,`userid`,`statusid`),
  KEY `campaignid` (`campaignid`),
  KEY `userid` (`userid`),
  KEY `statusid` (`statusid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `entrytype`
--

CREATE TABLE IF NOT EXISTS `entrytype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entryname` int(11) DEFAULT NULL,
  `createdate` date DEFAULT NULL,
  `createid` int(11) DEFAULT NULL,
  `modifydate` date DEFAULT NULL,
  `modifyid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lob`
--

CREATE TABLE IF NOT EXISTS `lob` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(256) DEFAULT NULL,
  `description` varchar(256) DEFAULT NULL,
  `createdate` date DEFAULT NULL,
  `createid` int(11) DEFAULT NULL,
  `modifydate` date DEFAULT NULL,
  `modifyid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nanme` varchar(256) DEFAULT NULL,
  `createdate` date DEFAULT NULL,
  `createid` int(11) DEFAULT NULL,
  `modifydate` date DEFAULT NULL,
  `modifyid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `createdate` date DEFAULT NULL,
  `createid` int(11) DEFAULT NULL,
  `modifydate` date DEFAULT NULL,
  `modifyid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(256) DEFAULT NULL,
  `user` varchar(256) DEFAULT NULL,
  `pass` varchar(256) DEFAULT NULL,
  `createdate` date DEFAULT NULL,
  `createid` int(11) DEFAULT NULL,
  `modifydate` date DEFAULT NULL,
  `modifyid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD CONSTRAINT `campaigns_ibfk_2` FOREIGN KEY (`locationid`) REFERENCES `location` (`id`),
  ADD CONSTRAINT `campaigns_ibfk_1` FOREIGN KEY (`lobid`) REFERENCES `lob` (`id`);

--
-- Constraints for table `entries`
--
ALTER TABLE `entries`
  ADD CONSTRAINT `entries_ibfk_4` FOREIGN KEY (`statusid`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `entries_ibfk_1` FOREIGN KEY (`entrytypeid`) REFERENCES `entrytype` (`id`),
  ADD CONSTRAINT `entries_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `entries_ibfk_3` FOREIGN KEY (`campaignid`) REFERENCES `campaigns` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
