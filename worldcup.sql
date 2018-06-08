-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 08 Cze 2018, 16:34
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
-- Struktura tabeli dla tabeli `bet`
--

CREATE TABLE `bet` (
  `matchId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `fixtureNr` int(11) NOT NULL,
  `homeScore` int(11) NOT NULL,
  `awayScore` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `bet`
--

INSERT INTO `bet` (`matchId`, `userId`, `fixtureNr`, `homeScore`, `awayScore`) VALUES
(17, 2, 2, 4, 1),
(18, 2, 2, 1, 2),
(19, 2, 2, 4, 0),
(20, 2, 2, 0, 3),
(21, 2, 2, 0, 2),
(22, 2, 2, 3, 1),
(23, 2, 2, 0, 0),
(24, 2, 2, 3, 1),
(17, 3, 2, 5, 6),
(18, 3, 2, 9, 8),
(19, 3, 2, 5, 6),
(20, 3, 2, 5, 8),
(21, 3, 2, 9, 6),
(22, 3, 2, 1, 2),
(23, 3, 2, 1, 2),
(24, 3, 2, 1, 2),
(17, 4, 2, 2, 2),
(18, 4, 2, 1, 3),
(19, 4, 2, 1, 0),
(20, 4, 2, 1, 2),
(21, 4, 2, 0, 3),
(22, 4, 2, 0, 2),
(23, 4, 2, 0, 1),
(24, 4, 2, 2, 0),
(17, 5, 2, 2, 6),
(18, 5, 2, 2, 2),
(19, 5, 2, 2, 3),
(20, 5, 2, 2, 3),
(21, 5, 2, 0, 2),
(22, 5, 2, 2, 0),
(23, 5, 2, 2, 0),
(24, 5, 2, 0, 0),
(17, 1, 2, 3, 4),
(18, 1, 2, 6, 5),
(19, 1, 2, 3, 4),
(20, 1, 2, 7, 6),
(21, 1, 2, 5, 4),
(22, 1, 2, 5, 4),
(23, 1, 2, 3, 0),
(24, 1, 2, 0, 0),
(1, 1, 1, 2, 6),
(2, 1, 1, 2, 2),
(3, 1, 1, 2, 3),
(4, 1, 1, 2, 3),
(5, 1, 1, 0, 2),
(6, 1, 1, 2, 0),
(7, 1, 1, 2, 0),
(8, 1, 1, 0, 0),
(1, 2, 1, 2, 2),
(2, 2, 1, 1, 3),
(3, 2, 1, 1, 0),
(4, 2, 1, 1, 2),
(5, 2, 1, 0, 3),
(6, 2, 1, 0, 2),
(7, 2, 1, 0, 1),
(8, 2, 1, 2, 0),
(1, 3, 1, 4, 1),
(2, 3, 1, 1, 2),
(3, 3, 1, 4, 0),
(4, 3, 1, 0, 3),
(5, 3, 1, 0, 2),
(6, 3, 1, 3, 1),
(7, 3, 1, 0, 0),
(8, 3, 1, 3, 1),
(1, 4, 1, 3, 4),
(2, 4, 1, 6, 5),
(3, 4, 1, 3, 4),
(4, 4, 1, 7, 6),
(5, 4, 1, 5, 4),
(6, 4, 1, 5, 4),
(7, 4, 1, 3, 0),
(8, 4, 1, 0, 0),
(1, 5, 1, 5, 6),
(2, 5, 1, 9, 8),
(3, 5, 1, 5, 6),
(4, 5, 1, 5, 8),
(5, 5, 1, 9, 6),
(6, 5, 1, 1, 2),
(7, 5, 1, 1, 2),
(8, 5, 1, 1, 2),
(33, 1, 3, 5, 6),
(34, 1, 3, 5, 6),
(35, 1, 3, 8, 5),
(36, 1, 3, 6, 8),
(37, 1, 3, 5, 1),
(38, 1, 3, 5, 8),
(39, 1, 3, 7, 4),
(40, 1, 3, 5, 9);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `match`
--

CREATE TABLE `match` (
  `id` int(11) NOT NULL,
  `FixtureNr` int(11) NOT NULL,
  `HomeTeam` varchar(20) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `AwayTeam` varchar(20) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `HomeScore` int(11) NOT NULL,
  `AwayScore` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `match`
--

INSERT INTO `match` (`id`, `FixtureNr`, `HomeTeam`, `AwayTeam`, `HomeScore`, `AwayScore`) VALUES
(1, 1, 'Lech Poznań', 'Jagiellonia', 3, 2),
(2, 1, 'Legia', 'Wisła', 5, 6),
(3, 1, 'Górnik', 'Korona', 3, 5),
(4, 1, 'Wisła Kraków', 'Zagłębie', 5, 1),
(5, 1, 'Arka', 'Cracovia', 0, 2),
(6, 1, 'Śląsk', 'Pogoń', 2, 0),
(7, 1, 'Piast', 'Lechia', 2, 0),
(8, 1, 'Bruk Bet', 'Sandecja', 0, 0),
(17, 2, 'Rosja', 'Arabia Saudyjska', 0, 0),
(18, 2, 'Egipt', 'Urugwaj', 0, 0),
(19, 2, 'Maroko ', 'Iran', 0, 0),
(20, 2, 'Portugalia', 'Hiszpania', 0, 0),
(21, 2, 'Francja', 'Australi', 0, 0),
(22, 2, 'Argentyna', 'Islandia', 0, 0),
(23, 2, 'Peru', 'Dania', 0, 0),
(24, 2, 'Chorwacja', 'Nigeria', 0, 0),
(33, 3, 'j', 'kl', 8, 5),
(34, 3, 'j', 'kjn', 9, 5),
(35, 3, 'kn', 'kjn', 6, 5),
(36, 3, 'k', 'nkj', 8, 5),
(37, 3, 'nk', 'n', 4, 5),
(38, 3, 'kn', 'kn', 8, 4),
(39, 3, 'k', 'nk', 5, 6),
(40, 3, 'n', 'k', 3, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `score`
--

CREATE TABLE `score` (
  `playerId` int(11) NOT NULL,
  `fixtureId` int(11) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `score`
--

INSERT INTO `score` (`playerId`, `fixtureId`, `score`) VALUES
(1, 99, 27),
(2, 99, 8),
(3, 99, 9),
(4, 99, 14),
(5, 99, 12),
(1, 2, 11),
(2, 2, 4),
(3, 2, 3),
(4, 2, 5),
(5, 2, 7),
(1, 1, 13),
(2, 1, 2),
(3, 1, 6),
(4, 1, 7),
(5, 1, 1),
(1, 3, 1),
(1, 2, 1),
(2, 2, 1),
(3, 2, 0),
(4, 2, 1),
(5, 2, 2),
(1, 2, 1),
(2, 2, 1),
(3, 2, 0),
(4, 2, 1),
(5, 2, 2);

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
(1, 'Mateusz', '$2y$10$g7eTxjOTUddljxMQ87r8bu92bSpOsomvsDfo0mKauDp/L996GxSg2', 'mrokuuuu@gmail.com', 1),
(2, 'lawi', '$2y$10$.pPozXnkppFKld1P1PV7uOnW/rWs2n1KWSaUftU2SZHPqJJ7KSYRy', 'ddda3aaad@o2.pl', 0),
(3, 'Michal', '$2y$10$hWEe4TPRUmlQsiY3c.ve4em4rbdMN5ZqiM.Q1cLqEMHUDYs/voSue', 'dasda@o2.pl', 0),
(4, 'Lukasz', '$2y$10$nF4JREtlmL2KcLWPDR4ULu568qiAh1VXbLxtg2zfJT1smf2PAqDXG', 'dddsads@o2.pl', 0),
(5, 'Adam', '$2y$10$wdNqIoQiZaVfWUKWpApqs.5OYI/d216CRxWpFMsld6XfkNWcWRAz6', 'dsadsssss@o2.pl', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
