-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Bulan Mei 2024 pada 07.31
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kpop_album_review`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `albums`
--

CREATE TABLE `albums` (
  `album_id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `release_date` date DEFAULT NULL,
  `artist_id` int(11) DEFAULT NULL,
  `cover_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `albums`
--

INSERT INTO `albums` (`album_id`, `title`, `release_date`, `artist_id`, `cover_image`) VALUES
(1, 'Maxident', '2022-10-07', 1, 'https://upload.wikimedia.org/wikipedia/en/d/de/Stray_Kids_-_Maxident.png'),
(2, 'Oddinary', '2022-03-18', 1, 'https://upload.wikimedia.org/wikipedia/en/4/45/Stray_Kids_-_Oddinary.jpeg'),
(3, 'Noeasy', '2021-08-23', 1, 'https://upload.wikimedia.org/wikipedia/en/5/59/Stray_Kids_-_Noeasy_%28Digital%29.jpeg'),
(4, '5-Star', '2023-06-02', 1, 'https://upload.wikimedia.org/wikipedia/id/5/52/Stray_Kids_-_5-Star.png'),
(5, ' I Am Not', '2018-03-26', 1, 'https://upload.wikimedia.org/wikipedia/en/1/14/Stray_Kids_Debut_Album.jpg'),
(6, 'I Am Who', '2018-08-06', 1, 'https://upload.wikimedia.org/wikipedia/id/f/ff/Stray_Kids_I_Am_Who_album_cover.jpg'),
(7, ' I Am You', '2018-10-22', 1, 'https://upload.wikimedia.org/wikipedia/en/1/11/I_Am_You_Album_Cover.jpeg'),
(8, 'Clé 1: Miroh', '2019-03-25', 1, 'https://upload.wikimedia.org/wikipedia/en/0/07/Stray_Kids_-_Cl%C3%A9_1_-_Miroh.png'),
(9, 'Clé: Levanter', '2019-12-09', 1, 'https://upload.wikimedia.org/wikipedia/en/1/1c/Stray_Kids_-_Cl%C3%A9_Levanter.jpg'),
(10, 'The Dream Chapter: Star', '2019-03-04', 2, 'https://upload.wikimedia.org/wikipedia/commons/9/9f/The_Dream_Chapter_Star.png'),
(11, 'The Dream Chapter: Magic', '2019-10-21', 2, 'https://upload.wikimedia.org/wikipedia/en/7/79/TXT_-_The_Dream_Chapter_-_Magic.png'),
(12, 'The Chaos Chapter: Freeze', '2021-05-31', 2, 'https://upload.wikimedia.org/wikipedia/en/6/6a/The_Chaos_Chapter_-_Freeze.png'),
(13, 'The Name Chapter: Freefall', '2023-10-13', 2, 'https://upload.wikimedia.org/wikipedia/en/1/15/The_Name_Chapter_-_Freefall.png'),
(14, 'The Name Chapter: Temptation', '2023-01-27', 2, 'https://upload.wikimedia.org/wikipedia/en/f/f2/TXT_-_The_Name_Chapter_Temptation.png'),
(15, 'Border: Day One', '2020-11-30', 3, 'https://upload.wikimedia.org/wikipedia/en/d/df/Enhypen_-_Border_-_One_Day_-_Dusk.png'),
(16, 'Border: Carnival', '2021-04-26', 3, 'https://upload.wikimedia.org/wikipedia/en/7/76/Enhypen_Border_Carnival.jpg'),
(17, 'Dimension: Dilemma', '2021-10-12', 3, 'https://upload.wikimedia.org/wikipedia/en/0/06/Enhypen_-_Dimension_Dilemma.jpg'),
(18, 'Manifesto: Day 1', '2022-07-04', 3, 'https://upload.wikimedia.org/wikipedia/id/1/1e/Enhypen_-_Manifesto_Day_1.jpg'),
(19, 'Sadame', '2022-10-26', 3, 'https://upload.wikimedia.org/wikipedia/id/3/33/Enhypen_-_Sadame.jpg'),
(20, 'Dark Blood', '2023-05-22', 3, 'https://upload.wikimedia.org/wikipedia/id/4/43/Enhypen_-_Dark_Blood.jpg'),
(21, 'Orange Blood', '2023-11-17', 3, 'https://upload.wikimedia.org/wikipedia/id/5/53/Enhypen_-_Orange_Blood.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `artists`
--

CREATE TABLE `artists` (
  `artist_id` int(11) NOT NULL,
  `artist_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `artists`
--

INSERT INTO `artists` (`artist_id`, `artist_name`) VALUES
(1, 'Stray Kids'),
(2, 'Tomorrow X Together'),
(3, 'Enhypen'),
(4, 'AYuu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `review_text` text DEFAULT NULL,
  `album_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `reviews`
--

INSERT INTO `reviews` (`review_id`, `user_id`, `review_text`, `album_id`) VALUES
(1, 1, 'guddd', 2),
(3, 1, 'gudd', 3),
(6, 1, 'bagudd', 1),
(7, 1, 'love it!', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`) VALUES
(1, 'angela', '$2y$10$.71YYiHbVld213EadzPI2.kwIefuJI3elV9AbwLzC0Ll2LgbHWPIK'),
(3, 'admin', '$2y$10$YU92jrljY9s87CUBH/DaP.5lMfrbQHhDsJCOgYf/8fObjPhhXpxW.');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`album_id`),
  ADD KEY `artist_id` (`artist_id`);

--
-- Indeks untuk tabel `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`artist_id`);

--
-- Indeks untuk tabel `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `albums`
--
ALTER TABLE `albums`
  MODIFY `album_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `artists`
--
ALTER TABLE `artists`
  MODIFY `artist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `albums_ibfk_1` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`artist_id`);

--
-- Ketidakleluasaan untuk tabel `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
