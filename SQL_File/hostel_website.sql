-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 30 jan. 2024 à 01:53
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `hostel_website`
--

-- --------------------------------------------------------

--
-- Structure de la table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `room` int(11) NOT NULL,
  `starting_date` date NOT NULL,
  `saved_at` date NOT NULL DEFAULT current_timestamp(),
  `nb_days` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `booking`
--

INSERT INTO `booking` (`id`, `user`, `room`, `starting_date`, `saved_at`, `nb_days`) VALUES
(2, 48, 3, '2023-11-15', '2023-11-08', 7);

-- --------------------------------------------------------

--
-- Structure de la table `catalogue_images`
--

CREATE TABLE `catalogue_images` (
  `id` int(11) NOT NULL,
  `image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `catalogue_images`
--

INSERT INTO `catalogue_images` (`id`, `image`) VALUES
(2, 'pexels-thorsten-technoman-338504.jpg'),
(3, 'pexels-sami-abdullah-7313084.jpg'),
(4, 'pexels-quang-nguyen-vinh-14012230.jpg'),
(5, 'pexels-metin-mutlu-8585881.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `parteners`
--

CREATE TABLE `parteners` (
  `id` int(11) NOT NULL,
  `part_name` varchar(100) NOT NULL,
  `part_logo` varchar(255) NOT NULL,
  `part_website` varchar(100) NOT NULL DEFAULT '#'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `restaurant`
--

CREATE TABLE `restaurant` (
  `id` int(11) NOT NULL,
  `menu` varchar(100) NOT NULL,
  `menu_image` varchar(255) NOT NULL,
  `menu_details` varchar(1000) NOT NULL,
  `menu_price` float NOT NULL,
  `menu_reduction` float NOT NULL,
  `menu_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `room_number` varchar(100) NOT NULL,
  `room_image` varchar(255) NOT NULL,
  `room_details` varchar(1000) NOT NULL,
  `room_price` int(11) NOT NULL,
  `room_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `rooms`
--

INSERT INTO `rooms` (`id`, `room_number`, `room_image`, `room_details`, `room_price`, `room_status`) VALUES
(1, 'Swit-001', 'pexels-max-rahubovskiy-6438743.jpg', 'Bedroom, bathroom, ....', 50, 0),
(2, 'Swit-002', 'presidential_suite_01_hero.jpg', 'Presidential Suite 1 Bedroom with Balcony', 300, 0),
(3, 'Swit-003', '5ce3a2e55d44aa0f277b61.13279749_.webp', 'Room with in-room fitness', 450, 1);

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `service_name` varchar(100) NOT NULL,
  `service_details` varchar(1000) NOT NULL,
  `service_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id`, `service_name`, `service_details`, `service_image`) VALUES
(2, 'Furnished room', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'pexels-max-rahubovskiy-6438767.jpg'),
(3, 'Internet connection', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'pexels-rdne-stock-project-7563687.jpg'),
(4, 'Restaurant', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.\r\n\r\n', 'pexels-metin-mutlu-8585881.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `hostel_name` varchar(100) NOT NULL,
  `hostel_intro` varchar(100) NOT NULL,
  `hostel_tagline` varchar(1000) NOT NULL,
  `hostel_logo` varchar(255) NOT NULL,
  `hostel_bigger_picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `swimming_pool`
--

CREATE TABLE `swimming_pool` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `permission` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` int(11) NOT NULL,
  `userimage` varchar(255) NOT NULL DEFAULT 'but.jpg',
  `status` int(11) NOT NULL,
  `id_number` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tblusers`
--

INSERT INTO `tblusers` (`id`, `name`, `lastname`, `username`, `email`, `sex`, `permission`, `password`, `mobile`, `userimage`, `status`, `id_number`, `Address`) VALUES
(40, 'Chris', 'Birego', 'Chris', 'chis@gmail.com', 'Homme', 'Super Admin', '81dc9bdb52d04dc20036dbd8313ed055', 62438449, 'avatar.jpg', 1, 'ChrdBe397499', 'Bujumbura'),
(47, 'Clementine', 'Kahambu', 'Clementine', 'clementine@gmail.com', 'Male', 'Super Admin', '81dc9bdb52d04dc20036dbd8313ed055', 62438449, 'vue-homme-3d-souriant-aide-smartphone.jpg', 1, 'YehxThD91769', 'Bujumbura Mairie'),
(48, 'Adas', 'Sandrine', 'Adas', 'adas@gmail.com', 'Female', 'Client', '827ccb0eea8a706c4c34a16891f84e7b', 64537896, '', 1, 'AdaJDo923216', 'Addis-Ababa');

-- --------------------------------------------------------

--
-- Structure de la table `testimonies`
--

CREATE TABLE `testimonies` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `name` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `lastname` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `userEmail` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `logout` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `userlog`
--

INSERT INTO `userlog` (`id`, `username`, `name`, `lastname`, `userEmail`, `userip`, `loginTime`, `logout`, `status`) VALUES
(1, 'Yehosh', 'Yehosh', 'Nzighali', 'nzighalij@gmail.com', 0x3a3a3100000000000000000000000000, '0000-00-00 00:00:00', '06-11-2023 01:09:24 AM', 1),
(2, 'Yehosh', 'Yehosh', 'Nzighali', 'nzighalij@gmail.com', 0x3a3a3100000000000000000000000000, '0000-00-00 00:00:00', '06-11-2023 01:30:56 AM', 1),
(3, 'Yehosh', 'Yehosh', 'Nzighali', 'nzighalij@gmail.com', 0x3a3a3100000000000000000000000000, '0000-00-00 00:00:00', '06-11-2023 01:33:41 AM', 1),
(4, 'Yehosh', 'Intruision', NULL, 'No registered user', 0x3a3a3100000000000000000000000000, '0000-00-00 00:00:00', NULL, 0),
(5, 'Yehosh', 'Yehosh', 'Nzighali', 'nzighalij@gmail.com', 0x3a3a3100000000000000000000000000, '0000-00-00 00:00:00', '08-11-2023 01:37:14 AM', 1),
(6, 'Hug', 'Huguette', 'Kanumbu', 'hug@gmail.com', 0x3a3a3100000000000000000000000000, '0000-00-00 00:00:00', '08-11-2023 01:51:23 AM', 1),
(7, 'Hug', 'Huguette', 'Kanumbu', 'hug@gmail.com', 0x3a3a3100000000000000000000000000, '0000-00-00 00:00:00', '08-11-2023 02:35:50 AM', 1),
(8, 'Yehosh', 'Yehosh', 'Nzighali', 'nzighalij@gmail.com', 0x3a3a3100000000000000000000000000, '0000-00-00 00:00:00', '08-11-2023 03:01:55 AM', 1),
(9, 'Adas', 'Adas', 'Sandrine', 'adas@gmail.com', 0x3a3a3100000000000000000000000000, '0000-00-00 00:00:00', '08-11-2023 03:06:02 AM', 1),
(10, 'Yehosh', 'Yehosh', 'Nzighali', 'nzighalij@gmail.com', 0x3a3a3100000000000000000000000000, '0000-00-00 00:00:00', '08-11-2023 03:25:54 AM', 1),
(11, 'chris', 'Intruision', NULL, 'No registered user', 0x3a3a3100000000000000000000000000, '0000-00-00 00:00:00', NULL, 0),
(12, 'yehosh', 'Intruision', NULL, 'No registered user', 0x3a3a3100000000000000000000000000, '0000-00-00 00:00:00', NULL, 0),
(13, 'Yehosh', 'Yehosh', 'Nzighali', 'nzighalij@gmail.com', 0x3a3a3100000000000000000000000000, '0000-00-00 00:00:00', '30-01-2024 02:49:14 AM', 1),
(14, 'clementine', 'Clementine', 'Kahambu', 'clementine@gmail.com', 0x3a3a3100000000000000000000000000, '0000-00-00 00:00:00', '30-01-2024 02:52:02 AM', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room` (`room`),
  ADD KEY `user` (`user`);

--
-- Index pour la table `catalogue_images`
--
ALTER TABLE `catalogue_images`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `parteners`
--
ALTER TABLE `parteners`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `swimming_pool`
--
ALTER TABLE `swimming_pool`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `testimonies`
--
ALTER TABLE `testimonies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Index pour la table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `catalogue_images`
--
ALTER TABLE `catalogue_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `parteners`
--
ALTER TABLE `parteners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `swimming_pool`
--
ALTER TABLE `swimming_pool`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT pour la table `testimonies`
--
ALTER TABLE `testimonies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`room`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`user`) REFERENCES `tblusers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `testimonies`
--
ALTER TABLE `testimonies`
  ADD CONSTRAINT `testimonies_ibfk_1` FOREIGN KEY (`user`) REFERENCES `tblusers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
