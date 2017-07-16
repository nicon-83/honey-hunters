-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июл 16 2017 г., 12:33
-- Версия сервера: 5.7.14
-- Версия PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `honey_hunters`
--
CREATE DATABASE IF NOT EXISTS `honey_hunters` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `honey_hunters`;

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `user_name`, `user_email`, `text`, `date`) VALUES
(1, 'Николай', 'nikolay@mail.ru', 'ЭтоОдноБольшоеДлинноеСловоДолжноБытьПеренесноНаДругуюСтроку', '2017-07-13 16:39:20'),
(2, 'Татьяна', 'tanya@google.com', 'Многие думают, что Lorem Ipsum - взятый с потолка псевдо-латинский набор слов, но это не совсем так. Его корни уходят в один фрагмент классической латыни 45 года н.э., то есть более двух тысячелетий назад.', '2017-07-13 16:40:11'),
(3, 'Владимир', 'vladimir@yandex.ru', 'Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона', '2017-07-13 17:05:41'),
(25, 'Юрий', 'yuri@yandex.ru', 'ЭтоКороткоеСлово', '2017-07-14 18:41:17'),
(27, 'Александр', 'alexander@yandex.ru', 'Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона', '2017-07-14 19:21:06'),
(41, 'Николай', 'nik@yandex.ru', 'Классический текст Lorem Ipsum, используемый с XVI века, приведён ниже. Также даны разделы 1.10.32 и 1.10.33 "de Finibus Bonorum et Malorum" Цицерона и их английский перевод, сделанный H. Rackham, 1914 год.', '2017-07-16 11:36:12'),
(26, 'Петр', 'petr@yandex.ru', 'Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона', '2017-07-14 19:10:22'),
(30, 'Владимир', 'vladimir@yandex.ru', 'Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации "Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст.."', '2017-07-14 19:23:20'),
(31, 'Василий', 'vasya@yandex.ru', 'Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона', '2017-07-14 19:27:44'),
(32, 'Юлия', 'yulia@yandex.ru', 'Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона', '2017-07-14 19:37:36'),
(42, 'Иван Грозный', 'groz@google.com', '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. ', '2017-07-16 12:00:57'),
(39, 'Анастасия', 'anastas@mail.ru', 'Есть много вариантов Lorem Ipsum, но большинство из них имеет не всегда приемлемые модификации, например, юмористические вставки или слова, которые даже отдалённо не напоминают латынь. Если вам нужен Lorem Ipsum для серьёзного проекта, вы наверняка не хотите какой-нибудь шутки, скрытой в середине абзаца. Также все другие известные генераторы Lorem Ipsum используют один и тот же текст, который они.', '2017-07-16 09:50:08');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
