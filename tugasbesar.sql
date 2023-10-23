-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2023 at 05:46 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugasbesar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bankadmin`
--

CREATE TABLE `bankadmin` (
  `namadonasi` varchar(100) NOT NULL,
  `namadonatur` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlaht` int(11) NOT NULL,
  `terkumpul` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banktarik`
--

CREATE TABLE `banktarik` (
  `namadonasi` varchar(100) NOT NULL,
  `namafundraiser` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlaht` int(11) NOT NULL,
  `namabank` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donasi`
--

CREATE TABLE `donasi` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `tanggalakhir` date NOT NULL,
  `max` int(11) NOT NULL,
  `terkumpul` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `verif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donatur`
--

CREATE TABLE `donatur` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `notelp` varchar(100) NOT NULL,
  `norek` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donatur`
--

INSERT INTO `donatur` (`id`, `nama`, `username`, `password`, `email`, `notelp`, `norek`, `image`) VALUES
(1, 'David Dimas Patty', 'david', 'david', 'daviddimas80@gmail.com', '08123124', '213123', '');

-- --------------------------------------------------------

--
-- Table structure for table `fundraiser`
--

CREATE TABLE `fundraiser` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `namaorganisasi` varchar(100) NOT NULL,
  `alamatorganisasi` varchar(100) NOT NULL,
  `notelp` varchar(100) NOT NULL,
  `norek` varchar(100) NOT NULL,
  `valid` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fundraiser`
--

INSERT INTO `fundraiser` (`id`, `username`, `password`, `namaorganisasi`, `alamatorganisasi`, `notelp`, `norek`, `valid`, `image`) VALUES
(2, 'david', 'david', 'david', 'david', '0239141', '0923412', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `fundraiserkedonasi`
--

CREATE TABLE `fundraiserkedonasi` (
  `idf` int(11) NOT NULL,
  `idd` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `tanggalakhir` date NOT NULL,
  `max` int(11) NOT NULL,
  `terkumpul` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `haldonatur`
--

CREATE TABLE `haldonatur` (
  `id` int(11) NOT NULL,
  `namafund` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `tanggalakhir` date NOT NULL,
  `max` int(11) NOT NULL,
  `terkumpul` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `verif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `riwayatfundraiser`
--

CREATE TABLE `riwayatfundraiser` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `max` int(11) NOT NULL,
  `terkumpul` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `verif` int(11) NOT NULL,
  `komen` varchar(100) NOT NULL,
  `anonim` int(11) NOT NULL,
  `jumlaht` int(11) NOT NULL,
  `namauser` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userkedonasi`
--

CREATE TABLE `userkedonasi` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlaht` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `anonim` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donasi`
--
ALTER TABLE `donasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donatur`
--
ALTER TABLE `donatur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fundraiser`
--
ALTER TABLE `fundraiser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fundraiserkedonasi`
--
ALTER TABLE `fundraiserkedonasi`
  ADD KEY `idf` (`idf`),
  ADD KEY `idd` (`idd`);

--
-- Indexes for table `haldonatur`
--
ALTER TABLE `haldonatur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riwayatfundraiser`
--
ALTER TABLE `riwayatfundraiser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userkedonasi`
--
ALTER TABLE `userkedonasi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donasi`
--
ALTER TABLE `donasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donatur`
--
ALTER TABLE `donatur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fundraiser`
--
ALTER TABLE `fundraiser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `haldonatur`
--
ALTER TABLE `haldonatur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `riwayatfundraiser`
--
ALTER TABLE `riwayatfundraiser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userkedonasi`
--
ALTER TABLE `userkedonasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
