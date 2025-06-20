-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 19 2025 г., 19:30
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
-- База данных: `school`
--

-- --------------------------------------------------------

--
-- Структура таблицы `class`
--

CREATE TABLE `class` (
  `class_id` int(11) NOT NULL,
  `grade` int(11) DEFAULT NULL,
  `letter` varchar(3) DEFAULT NULL
) ;

--
-- Дамп данных таблицы `class`
--

INSERT INTO `class` (`class_id`, `grade`, `letter`) VALUES
(1, 1, 'А'),
(2, 5, 'Б'),
(3, 10, 'В'),
(4, 11, 'п');

-- --------------------------------------------------------

--
-- Структура таблицы `journal`
--

CREATE TABLE `journal` (
  `teacher_id` int(11) DEFAULT NULL,
  `schedule_id` int(11) DEFAULT NULL,
  `journal_id` varchar(18) NOT NULL,
  `work_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Структура таблицы `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` int(11) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `workload_id` int(11) DEFAULT NULL,
  `period` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Структура таблицы `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `full_name` varchar(120) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Дамп данных таблицы `student`
--

INSERT INTO `student` (`student_id`, `class_id`, `full_name`, `birth_date`, `address`, `phone`) VALUES
(2, 1, 'Кузнецова Екатерина', '2016-07-22', 'ул. Мира, 5', '+79161234568'),
(3, 1, 'Васильев Дмитрий', '2016-11-30', 'пр. Победы, 20', '+79161234569'),
(4, 2, 'Николаева Ольга', '2012-05-10', 'ул. Садовая, 15', '+79161234570'),
(5, 2, 'Попов Игорь', '2012-02-28', 'ул. Лесная, 3', '+79161234571'),
(6, 3, 'Соколова Анна', '2008-09-05', 'пр. Космонавтов, 8', '+79161234572'),
(7, 3, 'Морозов Павел', '2008-12-12', 'ул. Центральная, 1', '+79161234573'),
(8, 3, 'Орлова Виктория', '2008-04-18', 'пер. Школьный, 7', '+79161234574');

-- --------------------------------------------------------

--
-- Структура таблицы `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `full_name` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Дамп данных таблицы `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `class_id`, `full_name`) VALUES
(1, 1, 'Иванова Мария Петровна'),
(2, 2, 'Сидоров Иван Васильевич'),
(3, 3, 'Петров Алексей Николаевич'),
(4, NULL, 'Козлова Елена Владимировна'),
(5, 2, 'Кукарача');

-- --------------------------------------------------------

--
-- Структура таблицы `workload`
--

CREATE TABLE `workload` (
  `workload_id` int(11) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `hours` int(11) DEFAULT NULL,
  `period` varchar(20) DEFAULT NULL
) ;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Индексы таблицы `journal`
--
ALTER TABLE `journal`
  ADD PRIMARY KEY (`journal_id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `schedule_id` (`schedule_id`);

--
-- Индексы таблицы `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `workload_id` (`workload_id`);

--
-- Индексы таблицы `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Индексы таблицы `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Индексы таблицы `workload`
--
ALTER TABLE `workload`
  ADD PRIMARY KEY (`workload_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `workload`
--
ALTER TABLE `workload`
  MODIFY `workload_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `journal`
--
ALTER TABLE `journal`
  ADD CONSTRAINT `journal_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`),
  ADD CONSTRAINT `journal_ibfk_2` FOREIGN KEY (`schedule_id`) REFERENCES `schedule` (`schedule_id`);

--
-- Ограничения внешнего ключа таблицы `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`),
  ADD CONSTRAINT `schedule_ibfk_2` FOREIGN KEY (`workload_id`) REFERENCES `workload` (`workload_id`);

--
-- Ограничения внешнего ключа таблицы `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`);

--
-- Ограничения внешнего ключа таблицы `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`);

--
-- Ограничения внешнего ключа таблицы `workload`
--
ALTER TABLE `workload`
  ADD CONSTRAINT `workload_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
