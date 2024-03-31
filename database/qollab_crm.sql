-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 31 2024 г., 20:03
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `qollab_crm`
--

-- --------------------------------------------------------

--
-- Структура таблицы `qollab_admin`
--

CREATE TABLE `qollab_admin` (
  `admin_id` int(20) NOT NULL,
  `admin_fname` varchar(200) NOT NULL,
  `admin_lname` varchar(200) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_uname` varchar(200) NOT NULL,
  `admin_pwd` varchar(200) NOT NULL,
  `admin_dpic` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Дамп данных таблицы `qollab_admin`
--

INSERT INTO `qollab_admin` (`admin_id`, `admin_fname`, `admin_lname`, `admin_email`, `admin_uname`, `admin_pwd`, `admin_dpic`) VALUES
(1, 'Akhrorkhon', 'Safaev', 'akhrorsafaev@gmail.com', 'Akhrorkhon', '7186ebfb69adb98029cce10975245bf1e6c44194', '1.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `qollab_client`
--

CREATE TABLE `qollab_client` (
  `client_id` int(20) NOT NULL,
  `client_fname` varchar(200) NOT NULL,
  `client_lname` varchar(200) NOT NULL,
  `client_phone` varchar(200) NOT NULL,
  `client_addr` varchar(200) NOT NULL,
  `client_email` varchar(200) NOT NULL,
  `client_pwd` varchar(200) NOT NULL,
  `client_dpic` varchar(200) NOT NULL,
  `client_uname` varchar(200) NOT NULL,
  `client_bday` varchar(200) NOT NULL,
  `client_bio` longtext NOT NULL,
  `client_table_name` varchar(200) NOT NULL,
  `client_table_number` varchar(200) NOT NULL,
  `client_place_location` varchar(200) NOT NULL,
  `client_start_time` varchar(200) NOT NULL,
  `client_end_time` varchar(200) NOT NULL,
  `client_place_price` varchar(200) NOT NULL,
  `client_payment_code` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Дамп данных таблицы `qollab_client`
--

INSERT INTO `qollab_client` (`client_id`, `client_fname`, `client_lname`, `client_phone`, `client_addr`, `client_email`, `client_pwd`, `client_dpic`, `client_uname`, `client_bday`, `client_bio`, `client_table_name`, `client_table_number`, `client_place_location`, `client_start_time`, `client_end_time`, `client_place_price`, `client_payment_code`) VALUES
(33, 'Madina', 'Ahrorova', '99899255332', 'Mirabad street', 'Madina@gmail.com', '7186ebfb69adb98029cce10975245bf1e6c44194', '', 'Madina', '', '', 'Library tables', '2', 'main hall', '22:26:00', '00:26:00', '1500000', '1222515');

-- --------------------------------------------------------

--
-- Структура таблицы `qollab_employee`
--

CREATE TABLE `qollab_employee` (
  `emp_id` int(20) NOT NULL,
  `emp_fname` varchar(200) NOT NULL,
  `emp_lname` varchar(200) NOT NULL,
  `emp_passport` varchar(200) NOT NULL,
  `emp_phone` varchar(200) NOT NULL,
  `emp_addr` varchar(200) NOT NULL,
  `emp_uname` varchar(200) NOT NULL,
  `emp_email` varchar(200) NOT NULL,
  `emp_pwd` varchar(200) NOT NULL,
  `emp_dpic` varchar(200) NOT NULL,
  `emp_dept` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Дамп данных таблицы `qollab_employee`
--

INSERT INTO `qollab_employee` (`emp_id`, `emp_fname`, `emp_lname`, `emp_passport`, `emp_phone`, `emp_addr`, `emp_uname`, `emp_email`, `emp_pwd`, `emp_dpic`, `emp_dept`) VALUES
(7, 'Ozod', 'Jalilov', 'AA7777777', '+998999999999', 'Novza street', 'client@gmail.com', 'Ozod@gmail.com', '7186ebfb69adb98029cce10975245bf1e6c44194', '', 'Sales'),
(8, 'Jamol', 'Lochinov', 'AA22224', '+99899999999', 'Karasu street', 'Jamol', 'Jamol@gmail.com', '7186ebfb69adb98029cce10975245bf1e6c44194', '', 'Reception');

-- --------------------------------------------------------

--
-- Структура таблицы `qollab_passwordresets`
--

CREATE TABLE `qollab_passwordresets` (
  `pwd_id` int(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `qollab_places`
--

CREATE TABLE `qollab_places` (
  `id` int(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `location` varchar(200) NOT NULL,
  `section` varchar(200) NOT NULL,
  `available_from` time DEFAULT NULL,
  `available_to` time DEFAULT NULL,
  `total_places` varchar(200) NOT NULL,
  `table_number` varchar(200) NOT NULL,
  `price` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Дамп данных таблицы `qollab_places`
--

INSERT INTO `qollab_places` (`id`, `name`, `location`, `section`, `available_from`, `available_to`, `total_places`, `table_number`, `price`) VALUES
(28, 'Library tables', 'main hall', 'main area', '22:26:00', '00:26:00', '1', '2', '1500000'),
(29, 'meeting room', 'main hall', 'main area', '22:36:00', '00:36:00', '4', '2', '');

-- --------------------------------------------------------

--
-- Структура таблицы `qollab_place_tickets`
--

CREATE TABLE `qollab_place_tickets` (
  `ticket_id` int(20) NOT NULL,
  `client_name` varchar(200) NOT NULL,
  `client_email` varchar(200) NOT NULL,
  `client_addr` varchar(200) NOT NULL,
  `table_name` varchar(200) NOT NULL,
  `table_number` varchar(200) NOT NULL,
  `booked_from` varchar(200) NOT NULL,
  `booked_to` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `payment_code` varchar(200) NOT NULL,
  `confirmation` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Дамп данных таблицы `qollab_place_tickets`
--

INSERT INTO `qollab_place_tickets` (`ticket_id`, `client_name`, `client_email`, `client_addr`, `table_name`, `table_number`, `booked_from`, `booked_to`, `price`, `payment_code`, `confirmation`) VALUES
(19, 'Madina Ahrorova', 'Madina@gmail.com', 'Mirabad street', 'Library tables', '2', '22:26:00', '00:26:00', '1500000', '1222515', 'Approved');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `qollab_admin`
--
ALTER TABLE `qollab_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Индексы таблицы `qollab_client`
--
ALTER TABLE `qollab_client`
  ADD PRIMARY KEY (`client_id`);

--
-- Индексы таблицы `qollab_employee`
--
ALTER TABLE `qollab_employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Индексы таблицы `qollab_passwordresets`
--
ALTER TABLE `qollab_passwordresets`
  ADD PRIMARY KEY (`pwd_id`);

--
-- Индексы таблицы `qollab_places`
--
ALTER TABLE `qollab_places`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `qollab_place_tickets`
--
ALTER TABLE `qollab_place_tickets`
  ADD PRIMARY KEY (`ticket_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `qollab_admin`
--
ALTER TABLE `qollab_admin`
  MODIFY `admin_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `qollab_client`
--
ALTER TABLE `qollab_client`
  MODIFY `client_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT для таблицы `qollab_employee`
--
ALTER TABLE `qollab_employee`
  MODIFY `emp_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `qollab_passwordresets`
--
ALTER TABLE `qollab_passwordresets`
  MODIFY `pwd_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `qollab_places`
--
ALTER TABLE `qollab_places`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT для таблицы `qollab_place_tickets`
--
ALTER TABLE `qollab_place_tickets`
  MODIFY `ticket_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
