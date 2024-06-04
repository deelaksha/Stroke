-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2024 at 12:24 AM
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
-- Database: `hackathon`
--

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int(11) NOT NULL,
  `image_location` varchar(255) NOT NULL,
  `option1` varchar(255) NOT NULL,
  `option2` varchar(255) NOT NULL,
  `option3` varchar(255) NOT NULL,
  `option4` varchar(255) NOT NULL,
  `answer` int(11) NOT NULL CHECK (`answer` in (1,2,3,4))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `image_location`, `option1`, `option2`, `option3`, `option4`, `answer`) VALUES
(1, 'colours/red.png', 'Red', 'Blue', 'Green', 'Yellow', 1),
(2, 'colours/black.png', 'Black', 'Red', 'Orange', 'Pink', 1),
(3, 'colours/blue.png', 'Green', 'Black', 'Blue', 'Yellow', 3),
(4, 'colours/green.png', 'Blue', 'Green', 'Red', 'Pink', 2),
(5, 'colours/orange.png', 'Yellow', 'Green', 'Orange', 'Black', 3),
(6, 'colours/pink.png', 'Orange', 'Pink', 'Blue', 'Green', 2),
(7, 'colours/yellow.png', 'Black', 'Yellow', 'Red', 'Blue', 2);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctor_name` varchar(256) NOT NULL,
  `doctor_phone_number` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_name`, `doctor_phone_number`) VALUES
('fffe', '1234567890'),
('fffe', '1234567890'),
('fffe', '1234567890'),
('dee', '1234567890'),
('dee', '1234567890');

-- --------------------------------------------------------

--
-- Table structure for table `exercise`
--

CREATE TABLE `exercise` (
  `id` int(11) NOT NULL,
  `exercise_name` varchar(50) DEFAULT NULL,
  `exercise_detail` text DEFAULT NULL,
  `gif_location` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exercise`
--

INSERT INTO `exercise` (`id`, `exercise_name`, `exercise_detail`, `gif_location`) VALUES
(1, 'Ball Squeeze', 'Hold a small ball between your hands and squeeze it for 5 seconds. Repeat 10 times. This exercise strengthens your grip and forearms.', 'gifs/Ball_squeeze.gif'),
(2, 'Bicep Curls', 'Hold a dumbbell in each hand with palms facing up. Curl the weights towards your shoulders, then lower back down. Do 3 sets of 10 reps.', 'gifs/Bicep_lift.gif'),
(3, 'Calf Raises', 'Stand with feet hip-width apart. Raise your heels off the ground, hold for 2 seconds, then lower. Do 3 sets of 15 reps.', 'gifs/Calf_exercise.gif'),
(4, 'Knee Lifts', 'Stand straight, lift one knee towards your chest, hold for 5 seconds, then lower. Alternate legs. Do 10 reps per leg.', 'gifs/Knee_lifts.gif'),
(5, 'Knee Rolling', 'Lie on your back, knees bent. Gently roll your knees from side to side, keeping shoulders flat. Do 10 rolls each side.', 'gifs/knee_rolling.gif'),
(6, 'Weight Shifting', 'Stand with feet hip-width apart. Shift your weight to one foot, then the other. Do this for 30 seconds, rest, then repeat.', 'gifs/shifting.gif'),
(7, 'Shoulder Blade Squeezes', 'Sit up straight, squeeze your shoulder blades together for 5 seconds, then release. Repeat 10 times.', 'gifs/Shoulder_blade.gif'),
(8, 'Shoulder Stretch', 'Cross one arm across your chest, use the other arm to gently pull it closer. Hold 15 seconds, then switch arms.', 'gifs/Shoulder_streach.gif'),
(9, 'Side-Lying Leg Lifts', 'Lie on your side, lift the top leg up about 45 degrees, hold 2 seconds, then lower. Do 3 sets of 10 reps each side.', 'gifs/Side_lying.gif'),
(10, 'Supported Forward Reach', 'Sit in a chair, lean forward reaching both arms out, as if hugging a tree. Hold 10 seconds, repeat 5 times.', 'gifs/Supported_reach.gif'),
(11, 'Wrist Curls', 'Rest your forearm on a table, palm up, with wrist hanging off edge. Curl your wrist upward, then lower. Do 3 sets of 12 reps.', 'gifs/Wrist_curl.gif');

-- --------------------------------------------------------

--
-- Table structure for table `interaction`
--

CREATE TABLE `interaction` (
  `doctor_phonr_number` int(15) NOT NULL,
  `patient_phone_number` int(15) NOT NULL,
  `messege` varchar(256) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_name` varchar(256) NOT NULL,
  `patient_phone_number` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_name`, `patient_phone_number`) VALUES
('www', '2234567894'),
('www', '1234567890'),
('dee', '1111111111'),
('www', '2234567890'),
('deelaksha', '1212121212'),
('qeweq', '2233445566');

-- --------------------------------------------------------

--
-- Table structure for table `patient_medicine`
--

CREATE TABLE `patient_medicine` (
  `patient_phone_number` varchar(15) NOT NULL,
  `doctor_phone` varchar(15) NOT NULL,
  `date` date NOT NULL,
  `tablet_name` varchar(100) NOT NULL,
  `taken` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_profile`
--

CREATE TABLE `patient_profile` (
  `patient_phone_number` varchar(15) NOT NULL,
  `patient_name` varchar(256) NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `age` int(11) NOT NULL,
  `hypertension` tinyint(1) NOT NULL,
  `heart_disease` tinyint(1) NOT NULL,
  `ever_married` enum('Yes','No') NOT NULL,
  `work_type` enum('children','Govt_job','Never_worked','Private','Self-employed') NOT NULL,
  `residence_type` enum('Rural','Urban') NOT NULL,
  `avg_glucose_level` decimal(5,2) NOT NULL,
  `bmi` decimal(4,1) NOT NULL,
  `smoking_status` enum('formerly smoked','never smoked','smokes','Unknown') NOT NULL,
  `stroke` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient_profile`
--

INSERT INTO `patient_profile` (`patient_phone_number`, `patient_name`, `gender`, `age`, `hypertension`, `heart_disease`, `ever_married`, `work_type`, `residence_type`, `avg_glucose_level`, `bmi`, `smoking_status`, `stroke`) VALUES
('2234567890', 'www', 'Male', 1, 1, 1, 'Yes', 'children', 'Rural', 0.01, 4.0, 'formerly smoked', 1),
('2234567890', 'www', 'Male', 1, 1, 1, 'Yes', 'children', 'Rural', 0.01, 4.0, 'formerly smoked', 1),
('2234567890', 'www', 'Male', 1, 1, 1, 'Yes', 'children', 'Rural', 0.01, 4.0, 'formerly smoked', 1),
('2234567890', 'www', 'Male', 1, 1, 1, 'Yes', 'children', 'Rural', 0.01, 4.0, 'formerly smoked', 1),
('1212121212', 'deelaksha', 'Male', 45, 1, 0, 'No', 'Never_worked', 'Urban', 0.02, 55.0, 'never smoked', 1);

-- --------------------------------------------------------

--
-- Table structure for table `trivia`
--

CREATE TABLE `trivia` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `option1` varchar(255) NOT NULL,
  `option2` varchar(255) NOT NULL,
  `option3` varchar(255) NOT NULL,
  `option4` varchar(255) NOT NULL,
  `answer` int(11) NOT NULL CHECK (`answer` in (1,2,3,4))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trivia`
--

INSERT INTO `trivia` (`id`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`) VALUES
(1, 'What is the capital of France?', 'Paris', 'London', 'Berlin', 'Madrid', 1),
(2, 'Which planet is known as the Red Planet?', 'Earth', 'Mars', 'Jupiter', 'Saturn', 2),
(3, 'Who wrote \"Romeo and Juliet\"?', 'Shakespeare', 'Dickens', 'Austen', 'Hemingway', 1),
(4, 'What is the largest ocean on Earth?', 'Atlantic', 'Indian', 'Pacific', 'Arctic', 3),
(5, 'What is the chemical symbol for water?', 'H2O', 'O2', 'CO2', 'NaCl', 1),
(6, 'What is the capital of Italy?', 'Rome', 'Paris', 'Berlin', 'Madrid', 1),
(7, 'Which planet is the closest to the Sun?', 'Earth', 'Venus', 'Mercury', 'Mars', 3),
(8, 'Who wrote \"1984\"?', 'Orwell', 'Huxley', 'Bradbury', 'Asimov', 1),
(9, 'What is the largest continent on Earth?', 'Africa', 'Asia', 'Europe', 'Antarctica', 2),
(10, 'What is the chemical symbol for gold?', 'Au', 'Ag', 'Pb', 'Fe', 1),
(11, 'What is the capital of Japan?', 'Tokyo', 'Seoul', 'Beijing', 'Bangkok', 1),
(12, 'Which planet is known for its rings?', 'Earth', 'Mars', 'Jupiter', 'Saturn', 4),
(13, 'Who painted the Mona Lisa?', 'Da Vinci', 'Picasso', 'Van Gogh', 'Rembrandt', 1),
(14, 'What is the smallest ocean on Earth?', 'Atlantic', 'Indian', 'Southern', 'Arctic', 4),
(15, 'What is the chemical symbol for oxygen?', 'O', 'O2', 'Ox', 'O3', 1),
(16, 'What is the capital of Canada?', 'Ottawa', 'Toronto', 'Vancouver', 'Montreal', 1),
(17, 'Which planet is known as the Gas Giant?', 'Mars', 'Jupiter', 'Saturn', 'Uranus', 2),
(18, 'Who wrote \"To Kill a Mockingbird\"?', 'Lee', 'Twain', 'Hemingway', 'Fitzgerald', 1),
(19, 'What is the second largest continent on Earth?', 'Africa', 'Asia', 'Europe', 'Antarctica', 1),
(20, 'What is the chemical symbol for carbon?', 'C', 'Ca', 'Cr', 'Co', 1),
(21, 'What is the capital of Australia?', 'Canberra', 'Sydney', 'Melbourne', 'Brisbane', 1),
(22, 'Which planet is known for its Great Red Spot?', 'Mars', 'Jupiter', 'Saturn', 'Neptune', 2),
(23, 'Who wrote \"Pride and Prejudice\"?', 'Austen', 'Brontë', 'Shelley', 'Dickens', 1),
(24, 'What is the largest desert on Earth?', 'Sahara', 'Gobi', 'Arabian', 'Antarctic', 4),
(25, 'What is the chemical symbol for sodium?', 'Na', 'K', 'S', 'N', 1),
(26, 'What is the capital of Germany?', 'Berlin', 'Munich', 'Frankfurt', 'Hamburg', 1),
(27, 'Which planet is known as the Earth\'s twin?', 'Venus', 'Mars', 'Jupiter', 'Saturn', 1),
(28, 'Who wrote \"Moby-Dick\"?', 'Melville', 'Twain', 'Hawthorne', 'Poe', 1),
(29, 'What is the smallest continent on Earth?', 'Australia', 'Europe', 'Antarctica', 'South America', 1),
(30, 'What is the chemical symbol for iron?', 'Fe', 'Ir', 'In', 'I', 1),
(31, 'What is the capital of Russia?', 'Moscow', 'Saint Petersburg', 'Kazan', 'Novosibirsk', 1),
(32, 'Which planet is known as the Ice Giant?', 'Uranus', 'Neptune', 'Saturn', 'Pluto', 1),
(33, 'Who wrote \"War and Peace\"?', 'Tolstoy', 'Dostoevsky', 'Chekhov', 'Pushkin', 1),
(34, 'What is the largest country by area?', 'Russia', 'Canada', 'China', 'USA', 1),
(35, 'What is the chemical symbol for silver?', 'Ag', 'Au', 'Si', 'Sg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exercise`
--
ALTER TABLE `exercise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trivia`
--
ALTER TABLE `trivia`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `exercise`
--
ALTER TABLE `exercise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `trivia`
--
ALTER TABLE `trivia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
