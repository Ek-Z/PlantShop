-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 12 2021 г., 14:37
-- Версия сервера: 8.0.19
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int NOT NULL,
  `id_session` varchar(200) NOT NULL,
  `id_goods` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id`, `id_session`, `id_goods`) VALUES
(41, '14brlm8odaee11i2apfmdtsf0jfi3sm5', 11),
(42, '14brlm8odaee11i2apfmdtsf0jfi3sm5', 11),
(43, '14brlm8odaee11i2apfmdtsf0jfi3sm5', 4),
(44, 'prk11b67kn3b35b9ttqf08a1d5m4jfrc', 6),
(45, 'prk11b67kn3b35b9ttqf08a1d5m4jfrc', 4),
(46, 'prk11b67kn3b35b9ttqf08a1d5m4jfrc', 3),
(47, 'prk11b67kn3b35b9ttqf08a1d5m4jfrc', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `catalog`
--

CREATE TABLE `catalog` (
  `id` int NOT NULL,
  `type` varchar(150) NOT NULL,
  `name` varchar(150) NOT NULL,
  `image` varchar(150) NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `catalog`
--

INSERT INTO `catalog` (`id`, `type`, `name`, `image`, `description`, `price`) VALUES
(1, 'Palm', 'Chrysalidocarpus lutescens - Areca Palm', '01.jpg', 'The Areca Palm is a truly elegant indoor palm. Multiple stems emerge from its base, with numerous long, gracefully arching fronds growing close together along the stems. Leaves are pinnate, ie feather shaped. It is one of the top air purifying plants and a natural humidifier that will improve the air quality of your home or office as well as adding a relaxing tropical feel.\r\n\r\nAreca Palm is sometimes known as Dypsis lutescens or Areca lutescens, more common names include Butterfly Palm, Yellow Palm and Golden Cane.', 700),
(2, 'Palm', 'Phoenix canariensis - Canary Island Date Palm', '02.jpg', 'Phoenix canariensis is an exotic, feather type palm, with a stout trunk and straight, narrow leaves that grow upwards from a single crown, spreading and arching into elegant fan shapes. It is also known as Slender Date Palm.\r\n\r\nWith their architectural and tropical profile, Canary Island Date Palms add dramatic impact wherever you put them: anywhere from the corner of a room to an outdoor terrace.', 1590),
(3, 'Palm', 'Beaucarnea - Pony Tail Palm - Head', '03.jpg', 'Beaucarnea recurvata was previously known as Nolina recurvata. Its common names are Pony Tail Palm and Elephant’s Foot. Although called a palm, it is in fact a succulent, being a member of the Agave family.\r\n\r\nThese smaller Pony Tail palms with ball shaped trunks look stunning as table and desk top plants. They are very easy to care for, making them ideal for almost everyone and an excellent choice for both home and office.', 1300),
(4, 'Succulents ', 'Aloe vera', '04.jpg', 'Aloe vera is a cool choice that is bang on trend. It looks great grown on a windowsill or shelves.\r\n\r\nAloe is a slow growing stemless succulent with thick, fleshy, grey-green leaves with serrated edges. Although Aloe vera is typically found outdoors in equatorial climates it is more than happy grown in a pot inside in our more temperate climate. It is an easy plant to care for and is well known for its healing and air purification properties.', 600),
(5, 'Succulents ', 'Peperomia Piccolo Banda', '05.jpg', 'Peperomia Piccolo Banda is distinguished by its thick, pale silvery-green leaves with dark green, sometimes purple tinged, heavy veining running in multiple bands down their length. Stems are a fleshy, succulent red. Green spikes of tiny flowers appear on long, thin, red stalks and waft tantalisingly above the plant. Definitely an eye-catching crowd pleaser.\r\n\r\nRadiator Plants are very much on trend, they are easy to look after and look great displayed on desks or small tables. They adapt well to low light levels, making them great for the office or a shady corner.\r\n\r\nPlease note: the stems and leaves on this plant are very fragile and despite our best efforts some may be lost during transit.', 599),
(6, 'Succulents', 'Sansevieria trifasciata Laurentii - Variegated Snake Plant', '06.jpg', 'Sansevieria trifasciata Laurentii is probably the most recognisable and popular Sansevieria houseplant with its mottled grey-green leaves and creamy-yellow margins.\r\n\r\nConsidered virtually indestructible this is an excellent choice for all situations. It\'s tall, architectural presence and warm colouring ensure this Sansevieria stands out from the crowd. Often called mother-in-law\'s tongue, it might be one for the guest room.\r\n\r\nPlease note: some scaring may occur on the leaves.', 899),
(7, 'Succulents', 'Epiphyllum anguliger - Fishbone Cactus', '07.jpg', 'A really stunning, ornamental cactus with funky foliage and glorious flowers. The leaves have beautifully wavy margins that oscillate along the stem and give rise to its common names: Fishbone Cactus or Zig Zag Cactus. Flowers, when produced, are creamy white, with long lemon yellow to orange-brown outer petals and are heavily scented. Other names include Moon Cactus and Rick-Rack (or Ric-Rac) Cactus. Epiphyllum anguliger looks best displayed as a hanging plant.\r\n\r\nPlease note: plants are not always provided in hanging planters.', 1400),
(8, 'Ferns', 'Nephrolepis exaltata Bostoniensis - Boston Fern', '08.jpg', 'The Boston Fern is an elegant Victorian favourite, sometimes called the Sword fern. It has graceful, arching, green fronds with a ruffled appearance that is best displayed in a hanging basket or on a stand where it can cascade over the edge.\r\n\r\nThe Boston Fern will not only bring an air of calm to your home. It is one of the best known plants for purifying the air and regulating humidity.', 450),
(9, 'Ferns', 'Adiantum Fragrans - Delta Maidenhair Fern', '09.jpg', 'With its arching, wiry, black stems and delicate, pale green, triangular fronds, Delta Maidenhair Fern is everything you would want from an elegant fern. Often grown in terrariums where humidity levels are high. This is a charming and graceful fern that also works well in bathrooms and kitchens.\r\n\r\nAdiantum raddianum Fragrans is also known as Adiantum cuneatum and Adiantum rubellum.', 990),
(10, 'Foliage plants', 'Maranta leuconeura var. erythroneura - Herringbone Plant', '10.jpg', 'Maranta are spectacularly variegated ornamental houseplants. Sometimes called Maranta leuconeura Fascinator Tricolour, the oval shaped leaves of the Herringbone Plant are incredibly unique.\r\n\r\nThe leaves are dark green in the centre melding to a lighter green at the margins and alternate light splotches down the centre line. The veins are an eye-catching red, running down the centre of the leaf and branching out in a herringbone pattern.\r\n\r\nOften referred to as Prayer Plants, along with their closely related cousins Calathea, Maranta leaves have the unusual characteristic of lying flat during the day and then closing upwards at night as if in prayer.', 990),
(11, 'Foliage plants', 'Tradescantia zebrina - Inch Plant', '11.jpg', 'Tradescantia zebrina is prized for its easy care nature and colourful foliage of silver, purple and green to brighten up any room as a hanging or trailing indoor plant.\r\n\r\nThe common name of Wandering Jew (or more recently Wandering Dude) is derived from the its ability to easily root and thrive in different environments. Tradescantia zebrina is part of the Spiderwort family and is also known as Zebrina pendula or the Inch Plant.\r\n\r\nPlease note, some stem and leaf loss is likely to occur during transit and should not cause concern. The plant is very fast growing and will quickly generate new growth.', 1100),
(12, 'Foliage plants', 'Monstera adansonii - Philodendron Monkey Mask', '12.jpg', 'A cute name for a cute plant and so called due to the (vague?) resemblance of the leaves to that of a cheeky monkey.\r\n\r\nA close relative of the Swiss Cheese Plant (Monstera deliciosa), the Philodendron Monkey Mask is often also referred to as Philodendron or Monstera Obliqua, however a true Obliqua is more hole than leaf and nowhere near as attractive as this little chap.\r\n\r\nMonstera adansonii is easy to care for so long as it has moist, warm conditions. The plant has a vining habit and often grows entwined in and around itself, with new leaves and vines sometimes growing through the holes in existing leaves. This can lead to leaves tearing which gives the plant a shabby chic rather that pristine appeal.', 1900),
(13, 'Foliage plants', 'Ficus elastica Robusta - Rubber Plant', '13.jpg', 'Owning a Rubber Plant is all about the retro-chic of broad, shiny leaves. Ficus elastica Robusta is a modern variety that is very close to the original species in appearance, but with leaves that are wider and more glossy.\r\n\r\nBeing one of the best air-filtering plants available, and low-maintenance too, Robusta is a great plant to add lush, tropical foliage to your interior spaces.', 890),
(14, 'Foliage plants', 'Polyscias Ming - Aralia Ming', '14.jpg', 'Polyscias are versatile, small, indoor, branching trees. They grow in an upright and compact manner, making them suitable even in smaller spaces. Polyscias translates from the Greek as \"many\" and \"shade\", a reference to their abundant foliage.\r\n\r\nPolyscias Ming has fine, elegant leaves that are made up of many leaflets. They may look fragile, but fortunately this is an adaptable plant so long as it is kept in a warm, humid environment. Perfect to add a touch of oriental style and beauty to your home.', 1100),
(15, 'Foliage plants', 'Epipremnum aureum - Golden Pothos', '15.jpg', 'Epipremnum aureum has large, glossy green leaves with irregular cream and yellow streaks and blotches that are valued for their air-purifying qualities. Golden Pothos also tolerates lower light levels without losing its variegation and looks best displayed as a hanging plant.\r\n\r\nOther common names include Devils Ivy, Ivy Arum and Ceylon Creeper. Latin synonyms are Epipremnum pinnatum Aureum (mainly US and Canada), Scindapsus aureus (Europe) or Phaphidophora aureu (previous botanical name).', 700);

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `feedback` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `feedback`) VALUES
(1, 'Ivan', 'ok'),
(7, 'Mary', 'like it!!!'),
(11, '1', '111');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `name` text NOT NULL,
  `phone` text NOT NULL,
  `id_session` varchar(200) NOT NULL,
  `status` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `name`, `phone`, `id_session`, `status`) VALUES
(3, 'Ivan', '1111', '14brlm8odaee11i2apfmdtsf0jfi3sm5', 0),
(4, 'Tom', '555', 'prk11b67kn3b35b9ttqf08a1d5m4jfrc', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `pass` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `hash`) VALUES
(2, 'admin', '$2y$10$2qMwxKY7nxxiFZFBP4yzrePkz5WVzb9F7dKO2xux5.XLbPLXkmBEC', '1572649475dfd0cabc8dc79.19440972');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT для таблицы `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
