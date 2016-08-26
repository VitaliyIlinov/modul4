-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Авг 19 2016 г., 21:17
-- Версия сервера: 10.1.10-MariaDB
-- Версия PHP: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `modulfour`
--

-- --------------------------------------------------------

--
-- Структура таблицы `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `count_like` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `article`
--

INSERT INTO `article` (`id`, `name`, `description`, `count_like`) VALUES
(1, 'Первая статья', 'Текст первой статьи!', 76);

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id_category` int(11) UNSIGNED NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id_category`, `category_name`) VALUES
(1, 'Економика'),
(2, 'Наука'),
(3, 'Технологии'),
(4, 'категория1');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id_comment` int(10) UNSIGNED NOT NULL,
  `id_user` smallint(5) NOT NULL,
  `id_news` int(11) UNSIGNED NOT NULL,
  `comment` text NOT NULL,
  `id_parent` int(10) UNSIGNED DEFAULT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cnt_like` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `cnt_dislike` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id_comment`, `id_user`, `id_news`, `comment`, `id_parent`, `date_time`, `cnt_like`, `cnt_dislike`) VALUES
(1, 35, 25, 'первый комент', 0, '2016-08-17 19:03:45', 0, 0),
(2, 37, 25, 'второй комент', 0, '2016-08-17 19:04:04', 0, 0),
(3, 36, 25, 'третий комент', 0, '2016-08-17 19:04:35', 0, 0),
(4, 34, 25, 'ответ на 1 комент(1 запись)', 1, '2016-08-17 19:05:49', 0, 0),
(5, 35, 25, 'Ответ на 1 комент(2 запись)', 1, '2016-08-17 19:08:06', 0, 0),
(6, 34, 25, 'ответ на 3 комент(1 запись)', 3, '2016-08-17 19:09:03', 2, 0),
(7, 36, 25, 'ответ на 3 комент(2 запись)', 3, '2016-08-17 19:09:30', 1, 0),
(8, 35, 25, 'ответ на 1 комент(3 запись)', 1, '2016-08-17 19:11:54', 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `log`
--

CREATE TABLE `log` (
  `id_log` int(11) NOT NULL,
  `id_news` int(11) UNSIGNED NOT NULL,
  `ip_visit` int(11) UNSIGNED NOT NULL,
  `date_visit` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `log`
--

INSERT INTO `log` (`id_log`, `id_news`, `ip_visit`, `date_visit`) VALUES
(912, 25, 2130706433, '2016-08-19 22:09:20'),
(913, 25, 2130706433, '2016-08-19 22:09:58'),
(914, 25, 2130706433, '2016-08-19 22:10:09'),
(915, 25, 2130706433, '2016-08-19 22:10:10'),
(916, 25, 2130706433, '2016-08-19 22:10:30');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id_news` int(11) UNSIGNED NOT NULL,
  `title_news` varchar(50) NOT NULL DEFAULT '',
  `content_news` text NOT NULL,
  `image_news` varchar(100) NOT NULL DEFAULT '',
  `date_news` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_analitic` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `id_category` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `is_published` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `cnt_visit` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id_news`, `title_news`, `content_news`, `image_news`, `date_news`, `is_analitic`, `id_category`, `is_published`, `cnt_visit`) VALUES
(6, 'Нацбанк визнав неплатоспроможним черговий банк', 'У зазначеному банку не були розміщені вклади  фізичних осіб, повідомляє прес-центр НБУ.', '1.jpg', '2016-07-26 22:54:12', 0, 1, 0, 0),
(7, 'Врожай-2016 буде кращим, ніж очікували – експерти', 'В Україні чекають на добрий врожай зернових: аграрії зберуть принаймні не менше, ніж торік. За інформацією Мінагрополітики, українські фермери вже намолотили понад 20 мільйонів тонн ранніх зернових та зернобобових. У відомстві звітують: врожайність по більшості показників перевищує минулорічні. Експерти у свою чергу вважать їх успішними, втім зазначають: через хороший врожай зернових у світі вартість експорту не буде високою. Втім, Україна матиме шанс закріпитися на світовому ринку серед лідерів і стати конкурентоспроможною не лише в якості, а й в ціні', '2.jpg', '2016-07-26 22:55:58', 0, 1, 0, 0),
(8, 'Украинским военным повысят зарплаты из-за инфляции', 'Оборонный бюджет на 2017 год должен предусматривать увеличение зарплаты военнослужащих.\r\nСекретарь Совета национальной безопасности и обороны Украины Александр Турчинов заявляет, что оборонный бюджет на 2017 год должен предусматривать увеличение зарплаты военнослужащих с учетом инфляции в стране.\r\n\r\nКак сообщили в пресс-службе СНБО, под председательством Турчинова состоялось совещание по вопросу подготовки оборонного бюджета на 2017 год с участием руководителей всех силовых министерств и ведомств, а также министерства экономики и министерства финансов.\r\n\r\nСекретарь СНБО сказал, что, учитывая угрозы, которые стоят перед страной, "мы не можем уменьшить объемы финансирования сектора безопасности и обороны". "Именно поэтому требование Стратегии национальной безопасности в отношении финансирования сектора безопасности и обороны в размере 5% от ВВП должно четко выполняться", - заявил Турчинов.', '3.jpg', '2016-07-26 22:58:00', 0, 1, 0, 0),
(10, 'Названа неожиданная причина возможной преждевремен', 'Американские ученые из Гарвардского университета провели масштабное исследование и установили, что потребление в больших количествах ненасыщенных жиров, содержащихся в растительных маслах, минимизирует вероятность ранней смерти. В то же время рацион, насыщенный животными жирами, наоборот, способствует ухудшению здоровья, сообщает портал Medical Daily.\r\n\r\nПо словам ученых, их работа является на настоящее время наиболее полной и тщательной проверкой, как жиры в пище влияют на состояние организма. Диетологи выяснили, что если заменить насыщенные жиры, которые содержатся в сливочном масле, сале и красном мясе, ненасыщенными из оливкового, рапсового и соевого масел, то можно избежать серьезных проблем со здоровьем.\r\n\r\nДиетологи изучили данные 126 тысяч человек, которые принимали участие в двух долгосрочных исследованиях: Nurses'' Health Study и Health Pr-fessi-nals F-ll-w-Up Study. Добровольцы в течение 32 лет периодически, каждые два-четыре года, заполняли анкеты, отвечая на вопросы о диете, режиме питания, стиле жизни и здоровье. За все время исследования умерли 33 тысяч человек. Ученые проверили, существует ли связь между питанием и смертями, наступившими в результате сердечно-сосудистых заболеваний, рака, нейродегенеративных расстройств и поражений дыхательной системы.\r\n\r\nОказалось, что различные типы жиров по-разному влияли на состояние организма. Трансжиры (содержатся в мясных и молочных продуктах) оказались самыми вредными: если увеличить их потребление на два процента, то риск преждевременной смерти повысится на 16 процентов. Пятипроцентное увеличение потребления насыщенных жиров связано с дополнительными восемью процентами смертей. А вот ненасыщенные жиры оказывают прямо противоположный эффект. Обогащенная ими диета снижала вероятность смерти на 11-19 процентов. Замена насыщенных жиров углеводами лишь незначительно способствует улучшению здоровья.', '4.jpg', '2016-07-26 22:59:38', 1, 2, 0, 0),
(11, 'Ученые рассказали об интересных изменениях в клима', 'ченые Центра океанических исследований GEOMAR в Киле (Германия) провели исследование влияния океана на климатические условия планеты. В соответствии с полученными результатами, деятельность человека в рекордные сроки смогла изменить механизмы, для формирования которых необходимы десятилетия.', '5.jpg', '2016-07-26 23:01:19', 0, 2, 0, 0),
(12, 'Проверка', 'проверка_контент', '', '2016-07-27 01:22:46', 1, 1, 1, 2),
(18, 'дореми', 'доремий', '3.jpg', '2016-07-27 01:39:32', 0, 4, 0, 0),
(19, 'економически новости', 'тролололло', '3.jpg', '2016-07-27 12:53:29', 0, 3, 0, 1),
(25, ' економика бизнес технологии', 'категория 1\r\n економика бизнес технологии', '', '2016-07-28 01:14:47', 1, 4, 1, 2),
(26, 'аналитика', 'В Україні чекають на добрий врожай зернових: аграрії зберуть принаймні не менше, ніж торік. За інформацією Мінагрополітики, українські фермери вже намолотили понад 20 мільйонів тонн ранніх зернових та зернобобових. У відомстві звітують: врожайність по більшості показників перевищує минулорічні. Експерти у свою чергу вважать їх успішними, втім зазначають: через хороший врожай зернових у світі вартість експорту не буде високою. Втім, Україна матиме шанс закріпитися на світовому ринку серед лідерів і стати конкурентоспроможною не лише в якості, а й в ціні', '', '2016-07-31 20:03:39', 1, 1, 0, 1),
(46, '111', '11', '', '2016-08-09 15:52:20', 0, 1, 1, 1),
(49, '333333', '333', 'qwe.jpg', '2016-08-09 23:18:58', 1, 1, 1, 2),
(52, 'hhhhhhhhhhhh', 'hhh', 'fgdfg.jpeg', '2016-08-17 15:11:31', 0, 4, 1, 2);

--
-- Триггеры `news`
--
DELIMITER $$
CREATE TRIGGER `news_before_insert` BEFORE INSERT ON `news` FOR EACH ROW BEGIN
SET NEW.date_news=NOW();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Структура таблицы `tags`
--

CREATE TABLE `tags` (
  `id_tag` int(11) UNSIGNED NOT NULL,
  `tag_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tags`
--

INSERT INTO `tags` (`id_tag`, `tag_name`) VALUES
(1, 'економика'),
(2, 'наука'),
(3, 'Бизнес'),
(4, 'Технологии');

-- --------------------------------------------------------

--
-- Структура таблицы `tag_news`
--

CREATE TABLE `tag_news` (
  `id_news` int(11) UNSIGNED NOT NULL,
  `id_tag` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tag_news`
--

INSERT INTO `tag_news` (`id_news`, `id_tag`) VALUES
(46, 2),
(46, 3),
(46, 4),
(25, 1),
(25, 3),
(25, 4),
(18, 3),
(12, 1),
(12, 3),
(49, 1),
(49, 2),
(49, 3),
(49, 4),
(52, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` smallint(5) NOT NULL,
  `login` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` varchar(45) NOT NULL,
  `password` char(32) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `email`, `role`, `password`, `is_active`) VALUES
(34, 'vetal', 'vetal@ukr.net', '', 'ee72131cf82e024e5e20854fc3702f94', 1),
(35, '111', '1111211@ww', '', '1c6be783cdddbc8f3323abd5749599e0', 1),
(36, 'test', 'test@test.ru', '', 'd3636e2ae38913e9d678a8b9b0200871', 1),
(37, 'jjjjjjj', 'jjj@fdd.t', '', '01f5734d1547cdf29a5ff160995c10bb', 1),
(39, 'admin', 'ilinov123@ukr.net', 'admin', '44ca5fa5c67e434b9e779c5febc46f06', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `votes_comment`
--

CREATE TABLE `votes_comment` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_comment` int(10) UNSIGNED NOT NULL,
  `id_user` smallint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `FK_comments_news` (`id_news`),
  ADD KEY `FK_comments_users` (`id_user`);

--
-- Индексы таблицы `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `FK_log_news` (`id_news`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`),
  ADD KEY `FK_news_category` (`id_category`);

--
-- Индексы таблицы `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id_tag`);

--
-- Индексы таблицы `tag_news`
--
ALTER TABLE `tag_news`
  ADD KEY `FK_tag_news_tags` (`id_tag`),
  ADD KEY `FK_tag_news_news` (`id_news`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Индексы таблицы `votes_comment`
--
ALTER TABLE `votes_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_votes_comment_comments` (`id_comment`),
  ADD KEY `FK_votes_comment_users` (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comment` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT для таблицы `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=917;
--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT для таблицы `tags`
--
ALTER TABLE `tags`
  MODIFY `id_tag` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT для таблицы `votes_comment`
--
ALTER TABLE `votes_comment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `FK_comments_news` FOREIGN KEY (`id_news`) REFERENCES `news` (`id_news`),
  ADD CONSTRAINT `FK_comments_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `FK_log_news` FOREIGN KEY (`id_news`) REFERENCES `news` (`id_news`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `FK_news_category` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`);

--
-- Ограничения внешнего ключа таблицы `tag_news`
--
ALTER TABLE `tag_news`
  ADD CONSTRAINT `FK_tag_news_news` FOREIGN KEY (`id_news`) REFERENCES `news` (`id_news`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_tag_news_tags` FOREIGN KEY (`id_tag`) REFERENCES `tags` (`id_tag`);

--
-- Ограничения внешнего ключа таблицы `votes_comment`
--
ALTER TABLE `votes_comment`
  ADD CONSTRAINT `FK_votes_comment_comments` FOREIGN KEY (`id_comment`) REFERENCES `comments` (`id_comment`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_votes_comment_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
