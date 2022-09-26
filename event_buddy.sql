-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2022 at 05:24 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event_buddy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `event_id` varchar(255) NOT NULL,
  `a_mail` varchar(255) NOT NULL,
  `a_name` varchar(255) NOT NULL,
  `a_password` varchar(255) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_sdate` date NOT NULL,
  `event_stime` time NOT NULL,
  `event_edate` date NOT NULL,
  `event_etime` time NOT NULL,
  `event_venue` varchar(255) NOT NULL,
  `organizer` varchar(255) NOT NULL,
  `event_desc` varchar(255) NOT NULL,
  `event_broc` longblob NOT NULL,
  `event_caro` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`event_id`, `a_mail`, `a_name`, `a_password`, `event_name`, `event_sdate`, `event_stime`, `event_edate`, `event_etime`, `event_venue`, `organizer`, `event_desc`, `event_broc`, `event_caro`) VALUES
('1MJNRD', 'david3@gmail.com', 'David', '562', 'Marrige', '2022-09-09', '20:00:00', '2022-09-06', '20:00:00', 'Hotel Royal Palace', 'David', 'Event Description ...fasd', '', ''),
('AREY0B', 'ghoshlokesh558@gamil.com', 'Ronit Biswas', '789', 'fest', '2022-09-22', '11:33:00', '2022-09-23', '19:34:00', 'auditorium', 'makaut', 'annual tech fest', '', ''),
('SD87PQ', 'ranit09@gmail.com', 'Ronit Roy', '789', 'Birthday party', '2022-09-15', '20:54:00', '2022-09-16', '20:55:00', 'Hotel Dolphin', 'Lokesh ghosh', 'This is just a normal birthday party', '', ''),
('ZMJXOV', 'pghosh9@gmail.com', 'Prakash Ghosh', '230', 'Fair', '2022-09-30', '09:00:00', '2022-10-06', '20:00:00', 'LMET International School Playground', 'LMET International School', 'Annual Science Fair , everyone can join', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `p_email` varchar(255) NOT NULL,
  `event_id` varchar(255) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`p_email`, `event_id`, `p_name`, `p_password`) VALUES
('jgoretti0@ow.ly', 'SD87PQ', 'Justine Goretti', '47wo1ELhEq'),
('bohannigan1@sfgate.com', 'AREY0B', 'Brenda O\'Hannigan', 'Zecbfl3'),
('ldufoure2@ibm.com', 'AREY0B', 'Lynde Dufoure', '6CGWIql'),
('dmarjoribanks3@msn.com', 'AREY0B', 'Donn Marjoribanks', '75h0vMw4kxC'),
('lreynard4@rediff.com', 'SD87PQ', 'Layton Reynard', 'gi8XOXr'),
('bslewcock5@webmd.com', 'SD87PQ', 'Bertrando Slewcock', '2XPqtCV'),
('nnare6@pagesperso-orange.fr', 'AREY0B', 'Nelie Nare', 'vEHHnBs8co'),
('braitt7@mail.ru', 'AREY0B', 'Brok Raitt', 'zc1IB0SieDCu'),
('dwainer8@loc.gov', 'SD87PQ', 'Douglass Wainer', 'L8xDqtbvpmH9'),
('gbloss9@qq.com', 'SD87PQ', 'Geno Bloss', 'vZv4DQx'),
('oherremaa@dyndns.org', 'AREY0B', 'Oralla Herrema', 'nnEvMPKV'),
('bstangerb@twitter.com', 'SD87PQ', 'Basilius Stanger', 'AUs1cZk'),
('rfurzerc@harvard.edu', 'AREY0B', 'Ragnar Furzer', 'jFk7Ftj09'),
('efairbraced@constantcontact.com', 'AREY0B', 'Eddy Fairbrace', 'CyB1z6E905pw'),
('msiaspinskie@pagesperso-orange.fr', '1MJNRD', 'Marena Siaspinski', 'v3nMwZJ2jir7'),
('dflandersf@house.gov', 'AREY0B', 'Dareen Flanders', 'uVhYXKKN8'),
('mcolbertg@booking.com', 'SD87PQ', 'Misti Colbert', '88Mw2pLZ'),
('ktreffreyh@tumblr.com', 'SD87PQ', 'Kristi Treffrey', 'wnQy7M7CR'),
('cquillinanei@bravesites.com', 'SD87PQ', 'Carola Quillinane', 'f4NXiTI'),
('rfaltinj@multiply.com', 'AREY0B', 'Rip Faltin', 'gO8uJsZ'),
('ndumbarek@squidoo.com', 'SD87PQ', 'Nari Dumbare', 'rVZE16UO4N'),
('emaltmanl@ucoz.com', 'AREY0B', 'Etta Maltman', 'Qc3fsEUqHyA'),
('mbastistinim@theguardian.com', 'AREY0B', 'Marylin Bastistini', 'lxLuhciT2jvy'),
('qtrottonn@nba.com', 'AREY0B', 'Querida Trotton', 'm7xHph'),
('ajollieo@weibo.com', 'SD87PQ', 'Auberon Jollie', 'uP5Xsbro'),
('skopacekp@nationalgeographic.com', 'AREY0B', 'Shelby Kopacek', 'WlRRglA'),
('csteinhamq@naver.com', 'AREY0B', 'Chelsy Steinham', '5IIaGDcs'),
('talywinr@businesswire.com', 'AREY0B', 'Tobias Alywin', 'FYEA9b7'),
('cmarkushkins@scientificamerican.com', 'SD87PQ', 'Charil Markushkin', '5d8CyZ7A25'),
('ckemt@meetup.com', 'AREY0B', 'Charlene Kem', 'y0pD7wWqUj'),
('rjennawayu@pagesperso-orange.fr', 'AREY0B', 'Ryun Jennaway', 'MnF9KhxlE1B'),
('adurramv@wufoo.com', 'AREY0B', 'Arleen Durram', '6UzgsSwd'),
('jbrimmacombew@spotify.com', '1MJNRD', 'Janelle Brimmacombe', 'IyGULWCCH9O'),
('rzanrex@facebook.com', 'AREY0B', 'Raphaela Zanre', 'yHGEEWb60'),
('sdoumency@gizmodo.com', '1MJNRD', 'Samara Doumenc', 'IXLRqAd8lB'),
('keveritz@cpanel.net', 'SD87PQ', 'Kinsley Everit', 'c7d4R8N'),
('bcammell10@reuters.com', 'SD87PQ', 'Bea Cammell', 'PjrpLXwz'),
('bpatria11@oracle.com', 'SD87PQ', 'Basilio Patria', 'vDBmXbmDO'),
('ewillbourne12@mediafire.com', 'SD87PQ', 'Ezri Willbourne', 'YmCjRrdbh'),
('ctooth13@globo.com', '1MJNRD', 'Cortie Tooth', 'Jh46WPWYHN'),
('ofrane14@goodreads.com', '1MJNRD', 'Odey Frane', 'R2b8HGCv'),
('nbollard15@npr.org', 'SD87PQ', 'Nike Bollard', 'QzIAza0eaUcD'),
('rpuig16@phpbb.com', '1MJNRD', 'Ravid Puig', 'e9jh9lfbf4'),
('sgruszczak17@tinypic.com', 'SD87PQ', 'Stanton Gruszczak', 'i1n85pin'),
('kabeau18@globo.com', '1MJNRD', 'Kippie Abeau', 'dGO5VfVo4Lf'),
('jyanez19@mapquest.com', 'SD87PQ', 'Justin Yanez', 'DloSOs7lb'),
('oborge1a@vkontakte.ru', 'SD87PQ', 'Ozzy Borge', 'yeZTIO'),
('ggauchier1b@cbslocal.com', 'AREY0B', 'Garv Gauchier', 'Nyqhixg'),
('dbretherton1c@tumblr.com', 'SD87PQ', 'Daryn Bretherton', 'v1hOBSc5in9'),
('pmcdougle1d@facebook.com', 'AREY0B', 'Pierre McDougle', 'PmVd1h5IFNTB'),
('gscutchings1e@unc.edu', 'AREY0B', 'Gorden Scutchings', 'hsaFgJS'),
('mclayal1f@123-reg.co.uk', 'SD87PQ', 'Mavra Clayal', 'VeceOkp'),
('jhinsch1g@howstuffworks.com', '1MJNRD', 'Jessalin Hinsch', 'Num91xpBBYnS'),
('hhosier1h@squarespace.com', '1MJNRD', 'Harlene Hosier', 'n1XojQQWA'),
('jpottie1i@state.tx.us', 'SD87PQ', 'Julissa Pottie', 'FqGyIjwuNm'),
('ebolstridge1j@t.co', 'AREY0B', 'Erin Bolstridge', 'slKMW1ZojlR'),
('lpanter1k@cpanel.net', '1MJNRD', 'Linnet Panter', 'BRc0UV'),
('jarndtsen1l@hugedomains.com', 'AREY0B', 'Jordana Arndtsen', 'JOD5FhAXvHW'),
('aeastman1m@springer.com', 'SD87PQ', 'Annelise Eastman', 'puxhTJ0qout'),
('drihosek1n@house.gov', 'SD87PQ', 'Dino Rihosek', 'gsJE4Tj'),
('gclausenthue1o@elegantthemes.com', '1MJNRD', 'Gael Clausen-Thue', 'BGZxsTWqucH'),
('lstennett1p@github.com', 'AREY0B', 'Lurette Stennett', 'WdGpCEdU'),
('fobal1q@over-blog.com', '1MJNRD', 'Ferdinand Obal', 'mYwav3'),
('mpirrone1r@soundcloud.com', 'AREY0B', 'Morton Pirrone', 'ad6ROT7bWfg'),
('dfeek1s@va.gov', 'SD87PQ', 'Deirdre Feek', 'iVFC4rS1kV3e'),
('mburvill1t@fotki.com', 'SD87PQ', 'Millicent Burvill', 'qK0GWuhVdszM'),
('lskydall1u@people.com.cn', 'SD87PQ', 'Lotta Skydall', 'PzgvzczBm'),
('pwickham1v@usgs.gov', 'AREY0B', 'Petronella Wickham', 'fovKiJdhR41K'),
('sverman1w@pcworld.com', 'AREY0B', 'Sonja Verman', 'UZjqcRf'),
('bparamor1x@vistaprint.com', 'SD87PQ', 'Berry Paramor', 'H5YMg4lJh'),
('lgronno1y@homestead.com', '1MJNRD', 'Lizabeth Gronno', 'PzH6mAsAD4u'),
('cboland1z@ed.gov', 'SD87PQ', 'Ches Boland', 'MUEjhwXj5'),
('astiggers20@mit.edu', 'AREY0B', 'Avie Stiggers', 'w4zpkYRplhAZ'),
('arintoul21@illinois.edu', 'SD87PQ', 'Antonino Rintoul', '7C4o9qaoAO'),
('lkeeling22@altervista.org', 'SD87PQ', 'Lenci Keeling', 'laRWFC'),
('sjodrelle23@opensource.org', '1MJNRD', 'Stu Jodrelle', 'QcRufXx1OXCe'),
('hyakunkin24@meetup.com', 'SD87PQ', 'Haskel Yakunkin', 'dKZdGp5JQD'),
('zduckerin25@hubpages.com', 'AREY0B', 'Zaccaria Duckerin', 'xXjsoU'),
('jwiggam26@cargocollective.com', 'AREY0B', 'Jennine Wiggam', '5EEvnpvx0'),
('aswiffin27@alexa.com', 'AREY0B', 'Ardella Swiffin', 'IbJFtH2Pq'),
('initti28@washingtonpost.com', '1MJNRD', 'Ingrim Nitti', '4SQgcQaYJ'),
('bvassel29@pen.io', 'SD87PQ', 'Belinda Vassel', 'OeYSxC14'),
('mselway2a@census.gov', '1MJNRD', 'Michaella Selway', 'Bvya5C'),
('tgravenell2b@comsenz.com', '1MJNRD', 'Tania Gravenell', 'znmwMs'),
('fflips2c@samsung.com', '1MJNRD', 'Farrel Flips', 'lblQvKl8'),
('greucastle2d@eepurl.com', 'AREY0B', 'Gregoor Reucastle', 'EGwEE4G'),
('calmond2e@zdnet.com', 'AREY0B', 'Charmine Almond', 'V0bNP9'),
('asprigging2f@huffingtonpost.com', '1MJNRD', 'Avril Sprigging', '0EWXiuoisE'),
('ddargavel2g@multiply.com', 'AREY0B', 'Denver Dargavel', '2j5eNLgarsD'),
('rhutchison2h@odnoklassniki.ru', 'AREY0B', 'Reeva Hutchison', 'jVVVpRv');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`event_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
