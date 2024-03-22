-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2024 at 06:08 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `be21_cr4_chidi_biglibrary`
--
CREATE DATABASE IF NOT EXISTS `be21_cr4_chidi_biglibrary` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `be21_cr4_chidi_biglibrary`;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `isbn_code` varchar(255) DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `type` enum('book','CD','DVD') NOT NULL,
  `author_first_name` varchar(255) DEFAULT NULL,
  `author_last_name` varchar(255) DEFAULT NULL,
  `publisher_name` varchar(255) DEFAULT NULL,
  `publisher_address` varchar(255) DEFAULT NULL,
  `publish_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `title`, `image`, `isbn_code`, `short_description`, `type`, `author_first_name`, `author_last_name`, `publisher_name`, `publisher_address`, `publish_date`) VALUES
(2, 'Revolver', 'https://cdn.pixabay.com/photo/2015/10/08/11/31/learn-977545_1280.jpg', '', 'The Beatles album that includes hits like \"Eleanor Rigby\".', 'CD', 'The', 'Beatles', 'Parlophone', 'London, UK', '1966-08-05'),
(3, 'Inception', 'https://cdn.pixabay.com/images/inception.jpg', '', 'A sci-fi thriller that explores dream invasion and espionage.', 'DVD', 'Christopher', 'Nolan', 'Warner Bros. Pictures', 'Burbank, CA, USA', '2010-07-16'),
(4, 'Pride and Prejudice', 'https://cdn.pixabay.com/images/pride_prejudice.jpg', '978-0679783268', 'A romantic novel that charts the emotional development of the protagonist Elizabeth Bennet.', 'book', 'Jane', 'Austen', 'Modern Library', 'London, UK', '1813-01-28'),
(5, 'Dark Side of the Moon', 'https://cdn.pixabay.com/images/dark_side_moon.jpg', '', 'A landmark album by Pink Floyd, known for its philosophical lyrics, innovative album art, and complex recordings.', 'CD', 'Pink', 'Floyd', 'Harvest Records', 'London, UK', '1973-03-01'),
(6, 'To Kill a Mockingbird', 'https://cdn.pixabay.com/images/to_kill_mockingbird.jpg', '978-0061120084', 'A novel about the injustices in the American South seen through the eyes of a child.', 'book', 'Harper', 'Lee', 'J. B. Lippincott & Co.', 'Philadelphia, PA, USA', '1960-07-11'),
(7, 'The Matrix', 'https://cdn.pixabay.com/images/matrix.jpg', '', 'A cyberpunk action film that depicts a dystopian future in which humanity is unknowingly trapped inside a simulated reality.', 'DVD', 'Lana', 'Wachowski', 'Warner Bros.', 'Burbank, CA, USA', '1999-03-31'),
(8, '1984', 'https://cdn.pixabay.com/images/1984.jpg', '978-0451524935', 'A dystopian novel by George Orwell presenting his vision of a future totalitarian state.', 'book', 'George', 'Orwell', 'Signet Classic', 'London, UK', '1949-06-08'),
(9, 'Abbey Road', 'https://cdn.pixabay.com/images/abbey_road.jpg', '', 'The eleventh studio album by the English rock band the Beatles, noted for its advanced production techniques and medley on Side Two.', 'CD', 'The', 'Beatles', 'Apple Records', 'London, UK', '1969-09-26'),
(10, 'Schindler\'s List', 'https://cdn.pixabay.com/images/schindlers_list.jpg', '', 'An epic historical drama film about Oskar Schindler, who saved over a thousand Polish Jews during the Holocaust.', 'DVD', 'Steven', 'Spielberg', 'Universal Pictures', 'Universal City, CA, USA', '1993-12-15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
