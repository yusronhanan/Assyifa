-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 04 Mei 2018 pada 20.19
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assovo`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `config`
--

CREATE TABLE `config` (
  `id_config` int(11) NOT NULL,
  `type` text NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `config`
--

INSERT INTO `config` (`id_config`, `type`, `text`) VALUES
(1, 'tag', 'fiqih'),
(2, 'tag', 'aqidah'),
(3, 'tag', 'remaja'),
(4, 'tag', 'orang tua'),
(5, 'tag', 'alquran'),
(6, 'tag', 'hadist'),
(7, 'tag', 'sirah'),
(8, 'tag', 'kesehatan'),
(9, 'tag', 'viral'),
(10, 'aboutus_text', '<p>Telkom Telkom&nbsp;Telkom TelkomTelkom TelkomTelkom TelkomTelkom TelkomTelkom TelkomTelkom TelkomTelkom TelkomTelkom TelkomTelkom Telkom</p>\r\n\r\n<blockquote>\r\n<p>&nbsp;Telkom TelkomTelkom TelkomTelkom TelkomTelkom TelkomTelkom Telkom</p>\r\n\r\n<p>Telkom TelkomTelkom TelkomTelkom TelkomTelkom Telkom</p>\r\n</blockquote>\r\n\r\n<p>Telkom TelkomTelkom TelkomTelkom TelkomTelkom TelkomTelkom TelkomTelkom TelkomTelkom TelkomTelkom TelkomTelkom TelkomTelkom TelkomTelkom TelkomTelkom Telkom</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut consequuntur magnam, excepturi aliquid ex itaque esse est vero natus quae optio aperiam soluta voluptatibus corporis atque iste neque sit tempora!</p>\r\n'),
(11, 'aboutus_maps', 'https://www.google.com/maps/embed/v1/place?q=place_id:ChIJYfPf3kQo1i0RG7GDY2MSfQE&key=AIzaSyCRmdhv10W9_1OwNB3C1rAf2PP4VUR476Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `post`
--

CREATE TABLE `post` (
  `id_post` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `question_id` int(11) DEFAULT NULL,
  `text_post` text NOT NULL,
  `desc_post` text NOT NULL,
  `date_post` date NOT NULL,
  `status_q` varchar(100) DEFAULT NULL,
  `hash_post` text NOT NULL,
  `title_post` varchar(400) NOT NULL,
  `tag` text,
  `publish` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `post`
--

INSERT INTO `post` (`id_post`, `id_user`, `question_id`, `text_post`, `desc_post`, `date_post`, `status_q`, `hash_post`, `title_post`, `tag`, `publish`) VALUES
(4, 1, NULL, '<p>asdasdsad</p>\r\n', 'ini desc', '2018-04-20', NULL, 's80tezrkSTW', 'posting 2', 'fiqih', 'yes'),
(5, 1, NULL, '<p style="text-align: center;">AJSDNJADASDNJANDJASNASD</p>\r\n\r\n<p style="text-align: center;"><span style="color:#2ecc71">ASDASDASDASDADSADDAS</span></p>\r\n\r\n<p style="text-align: right;"><span style="color:null"><strong>DASDASDASDASDASDASDAS</strong></span></p>\r\n', 'ini desc1', '2018-04-20', NULL, 'WY7ExU5fVNo', 'post 2', 'fiqih,aqidah', 'yes'),
(8, 4, NULL, '<p>asdasdsad</p>\r\n', 'ini desc 4', '2018-05-03', NULL, 'adasd423422345', 'posting 3', 'orang tua,hadist', 'yes'),
(9, 4, NULL, '<p style="text-align: center;">AJSDNJADASDNJANDJASNASD</p>\r\n\r\n<p style="text-align: center;"><span style="color:#2ecc71">ASDASDASDASDADSADDAS</span></p>\r\n\r\n<p style="text-align: right;"><span style="color:null"><strong>DASDASDASDASDASDASDAS</strong></span></p>\r\n', 'ini desc1afasfasasd', '2018-04-20', NULL, 'asdasdsq32313', 'post 5', 'fiqih,aqidah', 'yes'),
(10, 4, 2, '<div class="youtube-embed-wrapper" style="position:relative;padding-bottom:56.25%;padding-top:30px;height:0;overflow:hidden"><iframe allowfullscreen="" frameborder="0" height="360" src="https://www.youtube.com/embed/DDlpT-BHaf4" style="position:absolute;top:0;left:0;width:100%;height:100%" width="640"></iframe></div>\r\n\r\n<p><span style="font-size:22px"><span style="font-family:Comic Sans MS,cursive">begitu</span></span></p>\r\n', 'maraknya kesalahan persepsi. ternyata dalam alquran telah mendahului bidang medis saat ini', '2018-05-05', 'show_q', 'htPy4KWIuiT', 'Laki-Laki Haram memakai Emas', 'fiqih,remaja,alquran,hadist', 'yes'),
(11, 4, NULL, '<p>asdasdsa</p>\r\n', 'pa', '2018-05-03', NULL, '5eogfQWSr8q', 'apa aja', 'aqidah,orang tua', 'yes'),
(12, 4, 3, '<p>asdasasdasasd</p>\r\n', 'asdas', '2018-05-03', 'show_q', 'hZgyjivu4Yo', 'asdasd', 'aqidah,orang tua', 'yes'),
(13, 4, NULL, '<p>akdnaslnasklasdasdasdadas</p>\r\n', 'desc post 5', '2018-05-04', 'show_q', 'SoExc2ldKBq', 'Post 5', 'fiqih,hadist', 'no'),
(14, 1, 4, '<p>Jadi .sankjnasjkdnjasdnasbdasnd</p>\r\n\r\n<p>snkdnas;ldnasdasdas</p>\r\n\r\n<blockquote>\r\n<p>jsdsadoasdnsadiasd</p>\r\n</blockquote>\r\n\r\n<p>aasdasmdasmdasdasdadsadasdasd</p>\r\n', 'Menurut penelitian... asdnklasnlsadnlasdasjldbkjasdbkasjbdkjasbdkjasbdbasjkbdkjasbkjasbdjabd jkasbdkjasbjkasbjdbasjbjkasdb askjbkajsd', '2018-05-04', 'show_q', 'orTFq8LEOUv', 'Minum duduk lebih baik', NULL, 'yes');

-- --------------------------------------------------------

--
-- Struktur dari tabel `question`
--

CREATE TABLE `question` (
  `id_question` int(11) NOT NULL,
  `id_questioner` int(11) NOT NULL,
  `text_question` text NOT NULL,
  `date_question` date NOT NULL,
  `status_question` varchar(100) NOT NULL,
  `type_question` varchar(50) NOT NULL,
  `hash_question` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `question`
--

INSERT INTO `question` (`id_question`, `id_questioner`, `text_question`, `date_question`, `status_question`, `type_question`, `hash_question`) VALUES
(2, 2, 'mengapa laki-laki tidak boleh memakai emas? terimakasih', '2018-05-03', 'selesai', 'non-anonim', '8j7fNasdasddds'),
(3, 2, 'asdasd', '2018-05-03', 'selesai', 'anonim', 'Iyuo8JrvhNW'),
(4, 2, 'Apa boleh minum berdiri? Saya pernah tau Rasulullah pernah melakukannya.', '2018-05-03', 'selesai', 'non-anonim', 'GbzFYvsVm9c'),
(5, 2, 'Mengapa tidak boleh minum pakai tangan kiri? Kan sama aja', '2018-05-03', 'proses', 'anonim', '3wySf2VDOq7');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `oauth_provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `oauth_uid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `locale` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `picture_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `hash_code` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `oauth_provider`, `oauth_uid`, `first_name`, `last_name`, `email`, `password`, `gender`, `locale`, `birthday`, `picture_url`, `profile_url`, `role`, `created`, `modified`, `hash_code`) VALUES
(1, 'google', '100772832081570116367', 'yusron', 'zain', 'yusronzain@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '', 'in', '0000-00-00', 'https://lh5.googleusercontent.com/-gt18nKVm_sQ/AAAAAAAAAAI/AAAAAAAAJQc/OjPqDwS-9yM/photo.jpg', 'https://plus.google.com/100772832081570116367', 'admin', '2018-04-24 18:07:32', '2018-05-03 03:38:33', 'auyqjka7891'),
(2, 'google', '105062064701442203718', 'arya', 'bayu', 'aryabayu23@gmail.com', '5882985c8b1e2dce2763072d56a1d6e5', '', 'in', '0000-00-00', 'https://lh5.googleusercontent.com/-xMBO_qhR0b4/AAAAAAAAAAI/AAAAAAAAGwI/bW4dTuiZloM/photo.jpg', 'https://plus.google.com/105062064701442203718', 'user', '2018-04-25 07:58:53', '2018-04-25 07:58:53', 'ajjasndwii122'),
(3, 'google', '106144483611191030477', 'Muhammad', 'Taufik', 'microphoneid@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', '', 'en', '0000-00-00', 'https://lh6.googleusercontent.com/-GtqPGdtf99E/AAAAAAAAAAI/AAAAAAAAA8M/lKps1-W1mis/photo.jpg', 'https://plus.google.com/106144483611191030477', 'user', '2018-04-25 08:08:25', '2018-04-25 09:28:05', 'nadasb98178'),
(4, 'google', '110274577357900637237', 'Yusron', 'Imtinan', 'yusron_imtinan_24rpl@student.smktelkom-mlg.sch.id', 'cd662befd6173354f0ae3f8037c0f1ba', 'male', 'en', '0000-00-00', 'https://lh3.googleusercontent.com/-qGxPSejTKSY/AAAAAAAAAAI/AAAAAAAAADY/bMQ5e8v6qlg/photo.jpg', 'https://plus.google.com/110274577357900637237', 'ustad', '2018-04-25 07:53:49', '2018-05-03 03:38:24', 'c717sajdjdk9'),
(6, 'google', '108646936418451540956', 'Bakul', 'Jos', 'bakuljos@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', '', 'in', '0000-00-00', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg', '', 'user', '0000-00-00 00:00:00', '2018-04-25 09:28:38', 'XpAlCIajy6f'),
(7, 'google', '105108382953304761446', 'YESSY PERMATASARI', '24RPL', 'yessy_permatasari_24rpl@student.smktelkom-mlg.sch.id', 'ee11cbb19052e40b07aac0ca060c23ee', 'female', 'en', '0000-00-00', 'https://lh3.googleusercontent.com/-Kt2wLEABoD8/AAAAAAAAAAI/AAAAAAAAADU/785Lz-mS60k/photo.jpg', 'https://plus.google.com/105108382953304761446', 'user', '2018-04-25 09:43:19', '2018-05-02 16:34:13', 'mnGZ1aKVwt7'),
(9, 'google', '104272820721990118601', 'Andin', 'Andin', 'andini_ardiningrum_24rpl@student.smktelkom-mlg.sch.id', 'ee11cbb19052e40b07aac0ca060c23ee', '', 'en', '2018-12-31', 'https://lh4.googleusercontent.com/-QwKmw-SRCN4/AAAAAAAAAAI/AAAAAAAAAAw/PxTOGLau5_w/photo.jpg', '', 'user', '2018-05-04 18:50:59', '2018-05-04 18:50:59', 'mRrw7VSNCUO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id_config`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `question_id` (`question_id`),
  ADD KEY `question_id_2` (`question_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id_question`),
  ADD KEY `id_questioner` (`id_questioner`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id_config` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id_question` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `question` (`id_question`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`id_questioner`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
