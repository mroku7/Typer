-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 10 Maj 2018, 16:16
-- Wersja serwera: 10.1.30-MariaDB
-- Wersja PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `worldcup`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `match`
--

CREATE TABLE `match` (
  `id` int(11) NOT NULL,
  `FixtureNr` int(11) NOT NULL,
  `HomeTeam` varchar(20) NOT NULL,
  `AwayTeam` varchar(20) NOT NULL,
  `HomeScore` int(11) NOT NULL,
  `AwayScore` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `match`
--

INSERT INTO `match` (`id`, `FixtureNr`, `HomeTeam`, `AwayTeam`, `HomeScore`, `AwayScore`) VALUES
(1, 1, 'legia', 'lechia', 0, 0),
(3, 1, 'legaaaaia', 'lechaaaaia', 0, 0),
(4, 1, 'ruch', 'wisla', 0, 0),
(5, 2, 'legia', 'lech', 0, 0),
(6, 3, 'jaga', 'gornik', 0, 0),
(7, 3, 'wisla p', 'wisla k', 0, 0),
(8, 3, 'zaglebie', 'korona', 0, 0),
(9, 3, 'cracovia', 'slask', 0, 0),
(10, 3, 'pogon', 'arka', 0, 0),
(11, 3, 'piast', 'lechia', 0, 0),
(12, 3, 'bruk bet', 'sndecja', 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user` text COLLATE latin1_general_ci NOT NULL,
  `pass` longtext COLLATE latin1_general_ci NOT NULL,
  `email` text COLLATE latin1_general_ci NOT NULL,
  `admin` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `user`, `pass`, `email`, `admin`) VALUES
(8, 'laweu', '$2y$10$ftU013CHVxT2TbVmbrS2sOhZNnW7WaMPMAp8ywZV429O/GktxXyjC', 'mrokuuuu@gmail.com', 0),
(9, 'Lawi', '$2y$10$3XWykte3LYvAnDtBIYpb9OIkP8bshQy2AgXZZEAEUt0/UIyKZA6XC', 'trolo@o2.pl', 0),
(10, 'asdfgh', '$2y$10$YTWYl6IMib4OOJtNlFHM7uac5ZVzP63NxrkQGCZUW6yD2WywDrP5.', 'asds@oa2.pl', 0),
(11, 'dsadsad', '$2y$10$BSNSHfYCfzw5SV8KlFmmXuIhVaafRQaR1ODR6HEdyj7SaV6R5rSQO', 'sada@a82.pl', 0),
(12, 'fnsdfds', '$2y$10$5WpiQAm.m41Td032IY2nE.x2fheG.GbePpxuUeNobxGzKcz0TeEpW', 'mrokusuuu@gmail.com', 0),
(13, 'mati', '$2y$10$r3EQ/4eesREYmC2uqK1Yt.7bfZqWOA5tzSPHfkS2D2Pvuv/AdNe7a', 'asaaad@o2.pl', 1),
(14, 'mat', '$2y$10$NTUlDcYN0salO4OG2c.RQuB6Gpa007AB3OfLMo9QAcqvxwIu5oCoe', '1qa@o2.pl', 0),
(15, 'lolol', '$2y$10$xO88lHnvLZv4rSFWT3q.EueqFnIAudsEnZ0sDPej/7VQ0t8RVcGn2', 'asdfghhh@o2.pl', 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `match`
--
ALTER TABLE `match`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `match`
--
ALTER TABLE `match`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
