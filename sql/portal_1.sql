-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2020. Nov 27. 20:08
-- Kiszolgáló verziója: 10.4.10-MariaDB
-- PHP verzió: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `beadando1`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `groups`
--

CREATE TABLE `groups` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(30) NOT NULL,
  `event_date` date NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `is_draw` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `groups`
--

INSERT INTO `groups` (`group_id`, `group_name`, `event_date`, `create_date`, `is_draw`) VALUES
(1, 'Test', '2021-01-08', '2020-11-27 11:15:42', 1),
(2, ':group_name', '0000-00-00', '2020-11-27 11:18:23', 0),
(3, 'Test', '2020-11-06', '2020-11-27 11:19:00', 0),
(4, 'adfdsa', '2020-11-28', '2020-11-27 11:22:20', 0),
(5, 'asdfasdf', '2020-11-28', '2020-11-27 11:23:03', 0),
(9, 'asdf', '2020-11-28', '2020-11-27 11:41:32', 0),
(10, 'tres', '2020-11-28', '2020-11-27 13:02:51', 0),
(11, 'erterzterz', '2020-11-28', '2020-11-27 13:05:38', 0),
(12, 'erterzterz', '2020-11-28', '2020-11-27 13:07:00', 0),
(13, 'erterzterz', '2020-11-28', '2020-11-27 13:24:15', 0),
(14, 'erterzterz', '2020-11-29', '2020-11-27 13:25:41', 0),
(15, 'asdfasdfasdfa', '2020-11-29', '2020-11-27 13:30:07', 0),
(16, 'erterzterz', '2020-11-28', '2020-11-27 13:30:51', 0);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `group_fk` int(11) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `is_creator` tinyint(1) NOT NULL,
  `drawn_person` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `email`, `group_fk`, `is_admin`, `is_creator`, `drawn_person`) VALUES
(7, 'test1', '7c222fb2927d828af22f592134e8932480637c0d', 'test1@gmail.com', 16, 1, 1, 0),
(8, 'test2', '011c945f30ce2cbafc452f39840f025693339c42', 'test2@gmail.com', 1, 0, 1, 10),
(9, 'test3', '011c945f30ce2cbafc452f39840f025693339c42', 'test3@gmail.com', 1, 0, 0, 8),
(10, 'test4', '011c945f30ce2cbafc452f39840f025693339c42', 'test4@gmail.com', 1, 0, 0, 9);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`group_id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD KEY `users_ibfk_1` (`group_fk`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`group_fk`) REFERENCES `groups` (`group_id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
