-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2025 at 06:46 PM
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
-- Database: `e_learning`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `email_account` varchar(255) NOT NULL,
  `password_account` varchar(255) NOT NULL,
  `login_count_account` tinyint(4) NOT NULL DEFAULT 0,
  `lock_account` tinyint(1) NOT NULL DEFAULT 0,
  `ban_account` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`email_account`, `password_account`, `login_count_account`, `lock_account`, `ban_account`, `updated_at`) VALUES
('huggies147@gmail.com', '$2y$12$8BlWmSJbGGbkyJVHCu4CNevburj9L9SsRyUXnheIFAb5AiZGqICSO', 0, 0, NULL, NULL),
('nine.night2555@gmail.com', '$2y$12$e23jjheJwvvj0Y5KN/NxI.rKmTkDMvH5kyAdAn9kyS/0NscOsQLOG', 0, 0, NULL, NULL),
('nine.night2565@gmail.com', '$2y$12$va2H1LQRhuybtGRfu3Zcru6U6vN6Ili2YPG2agEtM7723VoEUYh7e', 0, 0, NULL, NULL),
('Tanate.w@ku.th', '$2y$12$ZeoVacoj4lDjVpAUjb3AWOWFFFlONytO0zgxtTj/qkI8L5DnyjT.i', 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coursefeatures`
--

CREATE TABLE `coursefeatures` (
  `feature_id` bigint(20) NOT NULL,
  `course_id` bigint(20) NOT NULL,
  `feature_name` varchar(255) NOT NULL,
  `feature_value` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coursefeatures`
--

INSERT INTO `coursefeatures` (`feature_id`, `course_id`, `feature_name`, `feature_value`, `created_at`, `updated_at`) VALUES
(3, 3, 'ไทย', 'ไทย', '2025-10-05 23:35:17', '2025-10-05 23:35:17'),
(5, 2, 'ไทย', 'ไทย', '2025-10-06 00:37:48', '2025-10-06 00:37:48'),
(6, 4, 'Phthon', 'ไทย', '2025-10-11 19:06:31', '2025-10-11 19:06:31');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `instructor` varchar(255) NOT NULL,
  `duration` varchar(100) DEFAULT NULL,
  `level` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `image_url` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `title`, `category`, `instructor`, `duration`, `level`, `price`, `image_url`, `description`, `created_at`, `updated_at`) VALUES
(2, 'web', 'Program', 'Tanate', '0', 'Beginer', 1.00, 'uploads/courses/b4b9329f-8d4a-4cff-bda4-de3ee7377bf3.jpg', NULL, '2025-10-02 07:44:38', '2025-10-11 01:55:57'),
(3, 'web', 'Programmar', 'ขนมต้ม', '5', 'Beginer', 1000.00, 'uploads/courses/49640bd2-f8eb-4359-812e-c8ef56783333.png', NULL, '2025-10-05 23:35:17', '2025-10-05 23:35:17'),
(4, 'สอน system', 'Programmar', 'ธเนศ วนิชชากร', '4', 'Beginer', 1.00, 'uploads/courses/69bc767d-a34e-4c43-be1e-5dd655d86dc2.jpg', 'เรียนเกี่ยวกับ SA', '2025-10-11 19:06:31', '2025-10-11 19:06:31');

-- --------------------------------------------------------

--
-- Table structure for table `email_otps`
--

CREATE TABLE `email_otps` (
  `id` char(36) NOT NULL,
  `email` varchar(255) NOT NULL,
  `otp` varchar(255) NOT NULL,
  `expires_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `email_otps`
--

INSERT INTO `email_otps` (`id`, `email`, `otp`, `expires_at`, `created_at`, `updated_at`) VALUES
('21e8860c-5f2c-4eab-9265-93fd8dd00c08', 'huggies147@gmail.com', '$2y$12$g4vU.0MghUf5i3uNBZSAGuRo2SFhboIsTSXuZZ.XVlCA5jIbz9mcW', '2025-10-05 23:44:03', '2025-10-05 23:39:04', '2025-10-05 23:39:04'),
('69cf8067-f9f7-435d-8a27-3467c5c58d6f', 'nine.night2555@gmail.com', '$2y$12$SlKQwnnw074O4jwJNzX6r.F2saVyFrqezBEP8aVdgJrYCUccf1umu', '2025-09-29 09:23:10', '2025-09-29 09:18:10', '2025-09-29 09:18:10');

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `enroll_id` bigint(20) NOT NULL,
  `course_id` bigint(20) NOT NULL,
  `user_id` char(36) NOT NULL,
  `payment_id` char(36) NOT NULL,
  `payment_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `status` enum('pending','paid','completed','canceled') NOT NULL DEFAULT 'pending',
  `ref` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrollments`
--

INSERT INTO `enrollments` (`enroll_id`, `course_id`, `user_id`, `payment_id`, `payment_amount`, `status`, `ref`, `created_at`, `updated_at`) VALUES
(2, 2, '5523afb3-6161-403d-9d4c-63667a6b1053', 'f8e92edb-cb2d-49c7-9d8b-7d755e637012', 100.00, 'pending', NULL, '2025-10-02 07:45:25', '2025-10-02 07:45:25'),
(3, 3, '374335e1-a66a-4c4d-8715-72afee0ad50e', 'fd712b84-1d6b-4deb-a0d1-7389216ec0cf', 1000.00, 'pending', NULL, '2025-10-05 23:40:17', '2025-10-05 23:40:17'),
(5, 3, '9ba0c35a-4a79-4232-9410-e3ea56d04dff', '89161f4f-90d9-4f35-af68-a319ed4ac845', 1000.00, 'pending', NULL, '2025-10-05 23:49:53', '2025-10-05 23:49:53'),
(6, 4, '374335e1-a66a-4c4d-8715-72afee0ad50e', 'db8dd05c-132e-460d-9144-830deaba29b7', 1.00, 'pending', NULL, '2025-10-11 19:09:35', '2025-10-11 19:09:35'),
(7, 4, '9ba0c35a-4a79-4232-9410-e3ea56d04dff', '041736cf-bcef-48c6-a89b-b3e9514e9bd2', 1.00, 'pending', NULL, '2025-10-11 20:13:46', '2025-10-11 20:13:46');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` bigint(20) NOT NULL,
  `course_id` varchar(266) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `receipt_path` varchar(255) DEFAULT NULL,
  `approved_at` timestamp NULL DEFAULT NULL,
  `rejected_at` timestamp NULL DEFAULT NULL,
  `reject_reason` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `course_id`, `payment_id`, `user_id`, `amount`, `status`, `created_at`, `updated_at`, `receipt_path`, `approved_at`, `rejected_at`, `reject_reason`) VALUES
(1, '1', '79ce032f-35b9-4efb-b721-6a79b68e7fc4', '5523afb3-6161-403d-9d4c-63667a6b1053', 1, 'pending', '2025-10-02 11:27:25', '2025-10-02 11:27:25', NULL, NULL, NULL, NULL),
(2, '2', 'f8e92edb-cb2d-49c7-9d8b-7d755e637012', '5523afb3-6161-403d-9d4c-63667a6b1053', 100, 'pending', '2025-10-02 07:45:25', '2025-10-02 07:45:25', NULL, NULL, NULL, NULL),
(3, '3', 'fd712b84-1d6b-4deb-a0d1-7389216ec0cf', '374335e1-a66a-4c4d-8715-72afee0ad50e', 1000, 'pending', '2025-10-05 23:40:17', '2025-10-05 23:40:17', NULL, NULL, NULL, NULL),
(4, '1', '6614c4fd-cf59-4bd7-bb8d-34de55fd3c9e', '374335e1-a66a-4c4d-8715-72afee0ad50e', 1, 'pending', '2025-10-05 23:41:07', '2025-10-05 23:41:07', NULL, NULL, NULL, NULL),
(5, '3', '89161f4f-90d9-4f35-af68-a319ed4ac845', '9ba0c35a-4a79-4232-9410-e3ea56d04dff', 1000, 'pending', '2025-10-05 23:49:53', '2025-10-05 23:49:53', NULL, NULL, NULL, NULL),
(6, '4', 'db8dd05c-132e-460d-9144-830deaba29b7', '374335e1-a66a-4c4d-8715-72afee0ad50e', 1, 'pending', '2025-10-11 19:09:35', '2025-10-11 19:09:35', NULL, NULL, NULL, NULL),
(7, '4', '041736cf-bcef-48c6-a89b-b3e9514e9bd2', '9ba0c35a-4a79-4232-9410-e3ea56d04dff', 1, 'pending', '2025-10-11 20:13:46', '2025-10-11 20:13:46', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `syllabuses`
--

CREATE TABLE `syllabuses` (
  `syllabus_id` bigint(20) NOT NULL,
  `course_id` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `duration` varchar(100) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `syllabuses`
--

INSERT INTO `syllabuses` (`syllabus_id`, `course_id`, `title`, `duration`, `order`, `created_at`, `updated_at`) VALUES
(3, 3, 'Program', '5', NULL, '2025-10-05 23:35:17', '2025-10-05 23:35:17'),
(5, 2, 'Program', '1', NULL, '2025-10-06 00:37:48', '2025-10-06 00:37:48'),
(6, 4, 'นี้', '3', NULL, '2025-10-11 19:06:31', '2025-10-11 19:06:31'),
(7, 4, 'อีกอัน', '1', NULL, '2025-10-11 19:06:31', '2025-10-11 19:06:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uuid` char(36) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('Admin','Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uuid`, `fullname`, `email`, `username`, `tel`, `password`, `status`, `created_at`, `updated_at`) VALUES
('374335e1-a66a-4c4d-8715-72afee0ad50e', 'Tanate', 'huggies147@gmail.com', NULL, NULL, '$2y$12$LoD0lUQbi9UCSLb1vH7IE.4OrtmL6bEqaTZ6NtIbvSJcZmMWjwMty', 'Active', '2025-10-05 23:39:23', '2025-10-05 23:39:23'),
('5523afb3-6161-403d-9d4c-63667a6b1053', 'nine.night2555@gmail.com', 'nine.night2555@gmail.com', NULL, NULL, '$2y$12$yi0wbMEtJrJ75iX8pfXT2uP9IK1lAwGDRYXhBebJUYIzvmS50dGim', 'Active', '2025-09-29 09:18:48', '2025-09-29 09:18:48'),
('9ba0c35a-4a79-4232-9410-e3ea56d04dff', 'Admin12', 'Tanate.w@ku.th', NULL, NULL, '$2y$12$Y6Q4CxGvWJ8n6sMJTzU35.DJFWRTitIBl2.LiYGzFp2P5fA37bErC', 'Admin', '2025-10-05 23:31:57', '2025-10-05 23:31:57'),
('d6592057-c850-4f2a-a09e-826eee34696d', 'Admin', 'nine.night2565@gmail.com', NULL, NULL, '$2y$12$e2exOyERMQtblZZEVUdiCOpfj8.K3qxJApmFmRpRGuLeZoxeKEHxm', 'Admin', '2025-09-29 09:21:01', '2025-09-29 09:21:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`email_account`);

--
-- Indexes for table `coursefeatures`
--
ALTER TABLE `coursefeatures`
  ADD PRIMARY KEY (`feature_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `email_otps`
--
ALTER TABLE `email_otps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`enroll_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `syllabuses`
--
ALTER TABLE `syllabuses`
  ADD PRIMARY KEY (`syllabus_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uuid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coursefeatures`
--
ALTER TABLE `coursefeatures`
  MODIFY `feature_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `enroll_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `syllabuses`
--
ALTER TABLE `syllabuses`
  MODIFY `syllabus_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`email_account`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `coursefeatures`
--
ALTER TABLE `coursefeatures`
  ADD CONSTRAINT `coursefeatures_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD CONSTRAINT `enrollments_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enrollments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`uuid`) ON UPDATE CASCADE;

--
-- Constraints for table `syllabuses`
--
ALTER TABLE `syllabuses`
  ADD CONSTRAINT `syllabuses_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
