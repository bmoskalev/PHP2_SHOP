-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Июн 10 2018 г., 09:22
-- Версия сервера: 5.6.38
-- Версия PHP: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `catalog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` int(10) NOT NULL,
  `nameShort` varchar(30) NOT NULL,
  `nameFull` varchar(100) NOT NULL,
  `price` int(15) NOT NULL,
  `param` text NOT NULL,
  `weight` varchar(10) NOT NULL,
  `bigPhoto` varchar(50) NOT NULL,
  `miniPhoto` varchar(50) NOT NULL,
  `count` int(10) NOT NULL,
  `discount` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `clientInfo`
--

CREATE TABLE `clientInfo` (
  `id` int(10) NOT NULL,
  `timeOrder` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `discountCard` varchar(50) NOT NULL,
  `persons` varchar(50) NOT NULL,
  `pay` int(1) NOT NULL,
  `money` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `comment` text NOT NULL,
  `delivery` int(1) DEFAULT NULL,
  `desiredTime` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE `comment` (
  `id` int(5) NOT NULL,
  `fio` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comment`
--

INSERT INTO `comment` (`id`, `fio`, `email`, `text`) VALUES
(2, 'admin', 'admin@mail.ru', 'adminadminadminadminadminv'),
(3, 'max', 'max@mail.ru', 'привет');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(10) NOT NULL,
  `nameShort` varchar(30) NOT NULL,
  `nameFull` varchar(100) NOT NULL,
  `price` int(15) NOT NULL,
  `param` text NOT NULL,
  `bigPhoto` varchar(50) NOT NULL,
  `miniPhoto` varchar(50) NOT NULL,
  `weight` varchar(50) NOT NULL,
  `discount` int(3) NOT NULL,
  `stickerFit` int(3) NOT NULL,
  `stickerHit` int(3) NOT NULL,
  `views` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `nameShort`, `nameFull`, `price`, `param`, `bigPhoto`, `miniPhoto`, `weight`, `discount`, `stickerFit`, `stickerHit`, `views`) VALUES
(13, 'zapechennyj', 'Запеченный', 270, 'Тигровые креветки, хрустящий лук, острый сырный соус с чесноком.', 'img/batakon.jpeg', 'imgMini/batakon.jpeg', '230', 7, 0, 0, 0),
(14, 'zapechennyj_s_lososem', 'Запеченный с лососем', 260, 'Лосось, хрустящий лук, острый сырный соус с чесноком.', 'img/zapechennyj_s_lososem.jpeg', 'imgMini/zapechennyj_s_lososem.jpeg', '230', 5, 0, 0, 0),
(15, 'zapechennyj_so_snezhnym_krabom', 'Запеченный со снежным крабом', 250, 'Снежный краб, хрустящий лук, острый сырный соус с чесноком.', 'img/zapechennyj_so_snezhnym_krabom.jpeg', 'imgMini/zapechennyj_so_snezhnym_krabom.jpeg', '230', 3, 0, 0, 0),
(16, 'zelenyj_roll', 'Зеленый ролл', 200, 'Огурец, томат, перец болгарский, укроп, салат, сыр', 'img/zelenyj_roll.jpeg', 'imgMini/zelenyj_roll.jpeg', '240', 0, 0, 0, 0),
(17, 'joko', 'Йоко', 325, 'креветка, сыр, зеленый лук, томаго, икра лосося', 'img/joko.jpeg', 'imgMini/joko.jpeg', '250', 6, 0, 0, 0),
(18, 'kaliforniya_s_krevetkoj', 'Калифорния с креветкой', 325, 'Креветки, авокадо, тобико,майонез', 'img/kaliforniya_s_krevetkoj.jpeg', 'imgMini/kaliforniya_s_krevetkoj.jpeg', '250', 0, 0, 0, 0),
(19, 'kaliforniya_s_lososem', 'Калифорния с лососем', 295, 'Лосось, снежный краб, огурец, майонез, тобико', 'img/kaliforniya_s_lososem.jpeg', 'imgMini/kaliforniya_s_lososem.jpeg', '260', 3, 0, 0, 0),
(20, 'kaliforniya', 'Калифорния', 295, 'Снежный краб, авокадо, тобико, майонез', 'img/kaliforniya.jpeg', 'imgMini/kaliforniya.jpeg', '260', 0, 0, 0, 0),
(21, 'kanada', 'Канада', 275, 'лосось, снежный краб, зеленый лук, сыр, тобико', 'img/kanada.jpeg', 'imgMini/kanada.jpeg', '260', 5, 0, 0, 0),
(22, 'kimono', 'Кимоно', 265, 'Тунец, тобико, такуан, сыр', 'img/kimono.jpeg', 'imgMini/kimono.jpeg', '255', 0, 0, 0, 0),
(23, 'kiota', 'Киота', 340, 'Угорь, лосось, огурец, сыр, кунжут', 'img/kiota.jpeg', 'imgMini/kiota.jpeg', '260', 0, 0, 0, 0),
(24, 'krab-krevetka', 'Краб-креветка', 295, 'Креветки, снежный краб, сыр, кунжут', 'img/krab-krevetka.jpeg', 'imgMini/krab-krevetka.jpeg', '260', 0, 0, 0, 0),
(25, 'kunsej', 'Кунсей', 275, 'Семга, лосось х.к., тобико, сырный чипс, сыр', 'img/kunsej.jpeg', 'imgMini/kunsej.jpeg', '245', 1, 0, 0, 0),
(26, 'kurasiku_s_lososem', 'Курасику с лососем', 275, 'Рисовая бумага, тобико, сыр, снежный краб, зеленый лук, лосось.', 'img/kurasiku_s_lososem.jpeg', 'imgMini/kurasiku_s_lososem.jpeg', '260', 0, 0, 0, 0),
(27, 'kurasiku_s_tuncom', 'Курасику с тунцом', 275, 'Рисовая бумага, тунец, тобико, снежный краб', 'img/kurasiku_s_tuncom.jpeg', 'imgMini/kurasiku_s_tuncom.jpeg', '250', 0, 0, 0, 0),
(28, 'lava_unagi', 'Лава унаги', 275, 'угорь, огурец, сыр, соус Лава', 'img/lava_unagi.jpeg', 'imgMini/lava_unagi.jpeg', '250', 0, 0, 0, 0),
(29, 'lava_ehbi', 'Лава эби', 295, 'креветка, огурец, сыр, соус Лава', 'img/lava_ehbi.jpeg', 'imgMini/lava_ehbi.jpeg', '275', 2, 0, 0, 0),
(30, 'lava', 'Лава', 275, 'Семга, огурец, сыр, соус лава', 'img/lava.jpeg', 'imgMini/lava.jpeg', '280', 0, 0, 0, 0),
(31, 'maguro', 'Магуро', 295, 'Тунец, снежный краб, авокадо, сыр', 'img/maguro.jpeg', 'imgMini/maguro.jpeg', '260', 0, 0, 0, 0),
(32, 'mehiko', 'Мехико', 295, 'угорь, лосось, сыр, тобико', 'img/mehiko.jpeg', 'imgMini/mehiko.jpeg', '260', 0, 0, 0, 0),
(33, 'nagano', 'Нагано', 335, 'Угорь, снежный краб, икра лосося, сыр, кунжут', 'img/nagano.jpeg', 'imgMini/nagano.jpeg', '260', 0, 0, 0, 0),
(34, 'nidzi', 'Нидзи', 305, 'Лосось, икра лосося, огурец, сыр', 'img/nidzi.jpeg', 'imgMini/nidzi.jpeg', '270', 0, 0, 0, 0),
(35, 'raduga', 'Радуга', 330, 'Семга, тунец, снежный краб, икра лосося, салат, сыр', 'img/raduga.jpeg', 'imgMini/raduga.jpeg', '260', 5, 0, 0, 0),
(36, 'roll_s_syrom_parmezan', 'Ролл с сыром пармезан', 275, 'Семга, огурец, сыр, соус пармезан', 'img/roll_s_syrom_parmezan.jpeg', 'imgMini/roll_s_syrom_parmezan.jpeg', '270', 0, 0, 0, 0),
(37, 'roll-bekon', 'Ролл-бекон', 280, 'Тунец, снежный краб, бекон, салат, сыр', 'img/roll-bekon.jpeg', 'imgMini/roll-bekon.jpeg', '265', 0, 0, 0, 0),
(38, 'samuraj', 'Самурай', 275, 'Угорь, такуан, сыр', 'img/samuraj.jpeg', 'imgMini/samuraj.jpeg', '250', 0, 0, 0, 0),
(39, 'sensej', 'Сенсей', 295, 'Снежный краб, тобико, авокадо, сыр', 'img/sensej.jpeg', 'imgMini/sensej.jpeg', '260', 0, 0, 0, 0),
(40, 'spring_roll_s_krevetkoj', 'Спринг ролл с креветкой', 205, 'рисовая бумага, креветка, сыр пармезан, болгарский перец, салат, снежный краб, соус спайси.', 'img/spring_roll_s_krevetkoj.jpeg', 'imgMini/spring_roll_s_krevetkoj.jpeg', '100', 5, 0, 0, 0),
(41, 'spring_roll_s_lososem', 'Спринг ролл с лососем', 195, 'рисовая бумага, снежный краб, пармезан, болгарский перец, салат, лосось, соус спайси.', 'img/spring_roll_s_lososem.jpeg', 'imgMini/spring_roll_s_lososem.jpeg', '100', 0, 0, 0, 0),
(42, 'tajfun', 'Тайфун', 315, 'Креветки, тобико, огурец, сыр', 'img/tajfun.jpeg', 'imgMini/tajfun.jpeg', '250', 0, 0, 0, 0),
(43, 'tempura', 'Темпура', 265, 'Тигровые креветки в темпуре, тобико, острый соус', 'img/tempura.jpeg', 'imgMini/tempura.jpeg', '200', 3, 0, 0, 1),
(44, 'tokio', 'Токио', 325, 'Лосось, угорь, тобико, огурец, сыр', 'img/tokio.jpeg', 'imgMini/tokio.jpeg', '270', 0, 0, 0, 0),
(45, 'tomago_kani', 'Томаго кани', 250, 'Яичный блин, сливочный сыр, снежный краб, острый соус', 'img/tomago_kani.jpeg', 'imgMini/tomago_kani.jpeg', '250', 0, 0, 0, 0),
(46, 'tomago_syaki', 'Томаго сяки', 270, 'Яичный блин, сыр, лосось', 'img/tomago_syaki.jpeg', 'imgMini/tomago_syaki.jpeg', '250', 4, 0, 0, 0),
(47, 'tomago_unagi', 'Томаго унаги', 275, 'Яичный блин, угорь, сыр', 'img/tomago_unagi.jpeg', 'imgMini/tomago_unagi.jpeg', '250', 0, 0, 0, 0),
(48, 'tomago_chiken', 'Томаго чикен', 265, 'Яичный блин, курица жаренная, салат, перец болгарский, соус фета.', 'img/tomago_chiken.jpeg', 'imgMini/tomago_chiken.jpeg', '250', 0, 0, 0, 0),
(49, 'tomago_ehbi', 'Томаго эби', 285, 'Яичный блин, сыр, тигровые креветки', 'img/tomago_ehbi.jpeg', 'imgMini/tomago_ehbi.jpeg', '260', 0, 0, 0, 0),
(50, 'tono', 'Тоно', 325, 'Лосось гриль, сыр, зеленый лук, тигровые креветки', 'img/tono.jpeg', 'imgMini/tono.jpeg', '270', 0, 0, 0, 0),
(51, 'tortilya_ovoschnaya', 'Тортилья овощная', 205, 'Сырная лепешка, лист салата, перец болгарский, огурец,томат, такуан, сливочный сыр', 'img/tortilya_ovoschnaya.jpeg', 'imgMini/tortilya_ovoschnaya.jpeg', '210', 5, 0, 0, 0),
(52, 'tortilya_s_kuricej', 'Тортилья с курицей', 265, 'Сырная лепешка, курица, салат, бекон, перец болгарский, огурец, соус фета.', 'img/tortilya_s_kuricej.jpeg', 'imgMini/tortilya_s_kuricej.jpeg', '200', 0, 0, 0, 1),
(53, 'tortilya_s_lososem', 'Тортилья с лососем', 265, 'Лосось х.к., огурец, салат, сыр, сырная лепешка', 'img/tortilya_s_lososem.jpeg', 'imgMini/tortilya_s_lososem.jpeg', '180', 0, 0, 0, 0),
(54, 'unagi_filadelfiya', 'Унаги филадельфия', 285, 'угорь, сыр, сыр, кунжут', 'img/unagi_filadelfiya.jpeg', 'imgMini/unagi_filadelfiya.jpeg', '265', 0, 0, 0, 0),
(55, 'filadelfiya_lyuks', 'Филадельфия люкс', 320, 'Лосось, снежный краб, икра лосося, сыр', 'img/filadelfiya_lyuks.jpeg', 'imgMini/filadelfiya_lyuks.jpeg', '275', 5, 0, 0, 0),
(56, 'filadelfiya_s_zapechennym_perc', 'Филадельфия с запеченным перцем', 295, 'Лосось,перец болгарский запеченый, водоросли чукка, сливочный сыр.', 'img/filadelfiya_s_zapechennym_percem.jpeg', 'imgMini/filadelfiya_s_zapechennym_percem.jpeg', '280', 6, 0, 0, 3),
(57, 'filadelfiya_s_lososem', 'Филадельфия с лососем', 285, 'Лосось, огурец, сыр', 'img/filadelfiya_s_lososem.jpeg', 'imgMini/filadelfiya_s_lososem.jpeg', '270', 0, 0, 0, 1),
(58, 'filadelfiya_s_tuncom', 'Филадельфия с тунцом', 285, 'Тунец, огурец, сыр', 'img/filadelfiya_s_tuncom.jpeg', 'imgMini/filadelfiya_s_tuncom.jpeg', '270', 0, 0, 0, 0),
(59, 'fukusima', 'Фукусима', 280, 'Семга, огурец, перец обжаренный в сухарях, сливочный сыр, хрустящий лук', 'img/fukusima.jpeg', 'imgMini/fukusima.jpeg', '285', 0, 0, 0, 0),
(60, 'hirosima', 'Хиросима', 275, 'семга х.к., зеленый лук, сыр,огурец, тобико', 'img/hirosima.jpeg', 'imgMini/hirosima.jpeg', '260', 5, 0, 1, 16),
(61, 'cezar', 'Цезарь', 265, 'Курица жар., сыр сливочный, сыр пармезан перец болгарский, салат, кунжут.', 'img/cezar.jpeg', 'imgMini/cezar.jpeg', '250', 0, 0, 1, 5),
(62, 'shahmaty', 'Шахматы', 275, 'Лосось, огурец, тобико, сыр', 'img/shahmaty.jpeg', 'imgMini/shahmaty.jpeg', '260', 5, 1, 1, 72);

-- --------------------------------------------------------

--
-- Структура таблицы `orderToManager`
--

CREATE TABLE `orderToManager` (
  `idClient` int(10) NOT NULL DEFAULT '0',
  `idGood` int(10) NOT NULL DEFAULT '0',
  `count` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `login` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `login`, `pass`) VALUES
(4, 'admin', 'admin@mail.ru', 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `clientInfo`
--
ALTER TABLE `clientInfo`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orderToManager`
--
ALTER TABLE `orderToManager`
  ADD PRIMARY KEY (`idGood`,`idClient`),
  ADD KEY `idClient` (`idClient`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `clientInfo`
--
ALTER TABLE `clientInfo`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `orderToManager`
--
ALTER TABLE `orderToManager`
  ADD CONSTRAINT `ordertomanager_ibfk_1` FOREIGN KEY (`idClient`) REFERENCES `clientInfo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ordertomanager_ibfk_2` FOREIGN KEY (`idGood`) REFERENCES `goods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
