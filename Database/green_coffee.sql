-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2024 at 05:02 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `green coffee`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `user_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `state` varchar(20) NOT NULL,
  `city` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `user_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`user_name`, `first_name`, `last_name`, `email`, `password`, `phone_number`, `address`, `state`, `city`, `gender`, `image`, `role`) VALUES
('surendra', 'surendra', 'mahato', 'xinghsurendra2@gmail.com', 'Pa$$word11', '7781827740', '360020,Rajkot gujarat,RK university', 'Madya Pradesh', 'Dindori', 'male', 'am.jpeg', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `brand_icon`
--

CREATE TABLE `brand_icon` (
  `brand_id` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand_icon`
--

INSERT INTO `brand_icon` (`brand_id`, `brand`, `status`) VALUES
(8, 'brand(4).jpg', 'Active'),
(9, 'brand(1).jpg', 'Active'),
(10, 'brand(3).jpg', 'Active'),
(11, 'brand(2).jpg', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `user_name` varchar(255) NOT NULL,
  `p_id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_price` int(11) NOT NULL,
  `t_price` int(11) NOT NULL,
  `p_image` varchar(255) NOT NULL,
  `p_status` varchar(255) NOT NULL DEFAULT 'Available',
  `p_details` longtext NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`user_name`, `p_id`, `p_name`, `p_price`, `t_price`, `p_image`, `p_status`, `p_details`, `quantity`) VALUES
('sumit', 1, 'Fukamushi Sencha Tea', 200, 1800, 'p1.jpg', 'Available', '', 9),
('sumit', 2, 'Lemon Green Tea', 123, 246, 'pr2.jpg', 'out of stock', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `username` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `landmark` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`username`, `first_name`, `last_name`, `email`, `address`, `state`, `city`, `zip`, `landmark`) VALUES
('surendra', 'surendra', '', '', 'dsddfdfs', '', '', '', ''),
('surendra', '', '', '', 'defwewferwrew', '', '', '', ''),
('surendra', '', '', '', '', '', '', '', ''),
('sumit', '', '', '', '', '', '', '', ''),
('sumit', '', '', '', 'Delhi', '', '', '', ''),
('sumit', '', '', '', 'rrreee', '', '', '', ''),
('sumit', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `message_id` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_email` varchar(255) NOT NULL,
  `c_phone` varchar(15) NOT NULL,
  `c_message` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`message_id`, `c_name`, `c_email`, `c_phone`, `c_message`) VALUES
(10, 'sumit', 'jaiswalsumit1010@gmail.com', '7323333222', 'hello'),
(11, 'sumit', 'schaudhary216@rku.ac.in', '8787878787', 'sachugcs');

-- --------------------------------------------------------

--
-- Table structure for table `healthy`
--

CREATE TABLE `healthy` (
  `image` varchar(255) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `save` varchar(255) NOT NULL,
  `description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `healthy`
--

INSERT INTO `healthy` (`image`, `image1`, `title`, `save`, `description`) VALUES
('about-us.jpg', 'download.png', 'Healthy Tea', 'save upto 50% off', 'Discover the rejuvenating power of our healthy tea blends, carefully crafted to invigorate your senses and nurture your well-being. With a harmonious fusion of premium ingredients, each sip offers a journey of taste and vitality. Experience the delightful synergy of natural flavors, coupled with the potent health benefits that our teas offer. And now, indulge in the goodness while enjoying exclusive savings of up to 50% off. Elevate your tea-drinking experience today and embark on a path to holistic wellness, all at an unbeatable value. Embrace the goodness, embrace savings.');

-- --------------------------------------------------------

--
-- Table structure for table `index_table`
--

CREATE TABLE `index_table` (
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `index_table`
--

INSERT INTO `index_table` (`image`, `title`, `description`) VALUES
('thumb2.jpg', 'Green Tea', 'Antioxidant-rich, soothing beverage, revered for its health benefits.'),
('thumb0.jpg', 'Lemon Tea', 'Refreshing blend of tea and lemon, zesty and invigorating.'),
('thumb1.jpg', 'Green Coffee', 'Unroasted coffee beans, touted for potential health benefits and flavor.'),
('thumb.jpg', 'Tea Beans', 'Unprocessed tea leaves, prized for their freshness and health properties');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `coupon_id` int(11) NOT NULL,
  `coupon_code` text NOT NULL,
  `create_time` datetime NOT NULL DEFAULT current_timestamp(),
  `expiry_time` int(11) DEFAULT NULL,
  `discount` int(255) NOT NULL,
  `minimum_order` int(11) NOT NULL,
  `coupon_status` varchar(255) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`coupon_id`, `coupon_code`, `create_time`, `expiry_time`, `discount`, `minimum_order`, `coupon_status`) VALUES
(1, 'NEWUSER15', '2024-04-15 09:18:47', NULL, 50, 1000, 'Active'),
(3, 'GRABIT', '2024-04-18 08:47:38', NULL, 20, 2000, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `user_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `order_id` bigint(255) NOT NULL,
  `p_names` mediumtext NOT NULL,
  `order_date` date NOT NULL,
  `quantity` varchar(11) NOT NULL DEFAULT '1',
  `total_price` bigint(20) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`user_name`, `first_name`, `last_name`, `order_id`, `p_names`, `order_date`, `quantity`, `total_price`, `payment_method`, `email`, `phone_number`, `address`, `order_status`) VALUES
('sumit', 'sumit', 'jaiswal', 1, 'Fukamushi Sencha Tea', '2024-04-24', '1', 200, '', 'jaiswalsumit1010@gmail.com', '2121212121', '', 'Delivered'),
('sumit', 'sumit', 'jaiswal', 2, 'Fukamushi Sencha Tea', '2024-04-24', '1', 200, '', 'jaiswalsumit1010@gmail.com', '2121212121', '', 'cancelled'),
('sumit', 'sumit', 'jaiswal', 3, 'Fukamushi Sencha Tea', '2024-04-24', '1', 200, '', 'jaiswalsumit1010@gmail.com', '2121212121', '', 'cancelled'),
('sumit', 'sumit', 'jaiswal', 4, 'Fukamushi Sencha Tea', '2024-04-24', '1', 200, '', 'jaiswalsumit1010@gmail.com', '2121212121', '', 'cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `otp`
--

CREATE TABLE `otp` (
  `otp` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `otp_create_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_price` int(11) NOT NULL,
  `p_image` varchar(255) NOT NULL,
  `p_status` varchar(255) NOT NULL DEFAULT 'Available',
  `p_details` longtext NOT NULL,
  `stock` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `p_name`, `p_price`, `p_image`, `p_status`, `p_details`, `stock`) VALUES
(1, 'Fukamushi Sencha Tea', 200, 'p1.jpg', 'Available', ' Fukamushi Sencha Tea is a unique and prized variety of Japanese green tea renowned for its distinctive flavor profile and deep emerald hue. What sets Fukamushi Sencha apart is its special processing method, which involves steaming the tea leaves for an extended period, typically twice as long as traditional Sencha. This extended steaming breaks down the leaf structure, resulting in smaller, finer leaves and a powdery appearance.\r\n\r\nThe prolonged steaming not only alters the physical characteristics of the leaves but also impacts the flavor and aroma of the tea. Fukamushi Sencha tends to have a richer, more robust taste compared to regular Sencha, with a slightly sweeter and more vegetal undertone. The infusion is often characterized by a vibrant green color and a pleasantly grassy aroma.\r\n\r\nIn addition to its unique taste, Fukamushi Sencha is prized for its health benefits. Like other green teas, it is rich in antioxidants and polyphenols, which are believed to promote overall well-being and may help reduce the risk of certain chronic diseases.\r\n\r\nFukamushi Sencha Tea is not only a beverage but also a reflection of Japanese tea culture and craftsmanship. Its intricate processing and nuanced flavor make it a beloved choice among tea enthusiasts worldwide, offering a sensory journey that celebrates tradition and excellence in every sip.tempore placeat vero!                                                                                                                                                                                                                                                                                                                                                              ', 69),
(2, 'Lemon Green Tea', 123, 'pr2.jpg', 'out of stock', '   Lemon Green Tea is a delightful fusion of two refreshing ingredients: green tea and lemon. This aromatic blend combines the grassy notes of green tea with the zesty tang of fresh lemon, resulting in a revitalizing beverage that is both invigorating and soothing.\r\n\r\nGreen tea, prized for its numerous health benefits, serves as the base for this infusion. Known for its high concentration of antioxidants and catechins, green tea is believed to support heart health, boost metabolism, and promote overall well-being. When paired with the bright citrus flavor of lemon, the result is a harmonious combination that delights the senses.\r\n\r\nThe addition of lemon not only enhances the taste of the tea but also contributes its own array of health-promoting properties. Lemons are rich in vitamin C, a powerful antioxidant that helps strengthen the immune system and aids in collagen production. The citric acid in lemon also lends a refreshing tartness to the tea, balancing the earthy undertones of the green tea leaves.\r\n\r\nLemon Green Tea can be enjoyed hot or cold, making it a versatile beverage suitable for any occasion. Whether sipped in the morning to kickstart the day or enjoyed as a refreshing pick-me-up in the afternoon, this citrus-infused green tea offers a burst of flavor and vitality with each sip.\r\n\r\nWith its refreshing taste and potential health benefits, Lemon Green Tea has become a popular choice among tea enthusiasts seeking a flavorful and rejuvenating beverage that nourishes both body and soul.                                                                                                         ', 0),
(3, 'Kabusecha Green Tea', 160, 'pr3.png', 'out of stock', 'Kabusecha Green Tea, often referred to as \"covered tea,\" is a premium Japanese green tea with a unique cultivation method that sets it apart from other varieties. The name \"Kabusecha\" derives from the Japanese word \"kabuseru,\" meaning \"to cover.\" This tea is produced by shading the tea bushes for a short period before harvest, typically about one to two weeks.\r\n\r\nThis shading process causes the tea leaves to develop a rich, complex flavor profile and a vibrant green color. By limiting the exposure to sunlight, the tea plants produce higher levels of chlorophyll and amino acids, particularly L-theanine, which contributes to Kabusecha\'s distinctive taste and aroma.\r\n\r\nKabusecha is prized for its delicate balance of umami sweetness and refreshing astringency. It offers a smooth, mellow taste with subtle vegetal notes and a hint of sweetness, making it a favorite among tea connoisseurs.\r\n\r\nIn addition to its exceptional flavor, Kabusecha is also valued for its health benefits. Like other green teas, it is rich in antioxidants and polyphenols, which are believed to have various health-promoting properties, including boosting the immune system and supporting cardiovascular health.\r\n\r\nTraditionally, Kabusecha is enjoyed in Japan as a high-quality everyday tea or served on special occasions. Its nuanced flavor and elegant aroma make it a beloved choice for tea enthusiasts seeking a refined and authentic Japanese tea experience. Whether enjoyed hot or cold, Kabusecha Green Tea offers a moment of tranquility and indulgence with each sip, inviting drinkers to savor the essence of Japanese tea culture.', 0),
(5, 'Lemon Verbena Tea', 180, 'pr5.jpg', 'out of stock', 'Lemon Verbena Tea is a fragrant herbal infusion made from the leaves of the lemon verbena plant (Aloysia citrodora). This tea offers a refreshing and citrusy flavor profile with delicate floral undertones, making it a popular choice for those seeking a light and aromatic beverage.\r\n\r\nLemon verbena is native to South America but is now cultivated in various regions around the world for its culinary and medicinal uses. The plant\'s leaves are prized for their strong lemon scent and flavor, which is released when steeped in hot water to create a soothing and flavorful tea.\r\n\r\nTo brew Lemon Verbena Tea, simply steep a few dried or fresh lemon verbena leaves in hot water for several minutes. The resulting infusion boasts a bright yellow-green color and a vibrant aroma that instantly uplifts the senses. The taste is reminiscent of fresh lemon with a subtle sweetness and a hint of herbal complexity.\r\n\r\nIn addition to its delightful taste and aroma, Lemon Verbena Tea is believed to offer a range of health benefits. It is often used in traditional herbal medicine for its digestive properties, helping to soothe stomach discomfort and alleviate bloating. Lemon verbena is also valued for its calming effects, making it a popular choice for promoting relaxation and reducing stress.\r\n\r\nWhether enjoyed hot or cold, Lemon Verbena Tea is a versatile beverage that can be savored throughout the day. It is caffeine-free, making it a suitable option for those looking to reduce their caffeine intake or enjoy a soothing drink before bedtime.\r\n\r\nWith its invigorating citrus flavor and potential health benefits, Lemon Verbena Tea offers a refreshing and rejuvenating experience that delights the palate and soothes the soul. Whether enjoyed on its own or blended with other herbs and botanicals, it is a delightful choice for tea enthusiasts seeking a flavorful and aromatic infusion.', 0),
(6, 'Sweet Lemon Iced Tea', 218, 'pr6.jpg', 'out of stock', 'Sweet Lemon Iced Tea is a delightful and refreshing beverage that combines the classic flavors of iced tea with a burst of tangy sweetness from fresh lemon. This thirst-quenching concoction is perfect for hot summer days or any time you crave a cool and flavorful drink.\r\n\r\nTo make Sweet Lemon Iced Tea, start by brewing a strong batch of black tea or your favorite tea blend. Allow the tea to steep for the recommended time to extract maximum flavor. While the tea is still hot, add a generous amount of sugar or your preferred sweetener to taste, stirring until completely dissolved.\r\n\r\nNext, squeeze fresh lemon juice into the sweetened tea, adjusting the amount to achieve your desired level of tartness. The lemon juice not only adds a refreshing citrus flavor but also enhances the overall brightness of the drink.\r\n\r\nOnce the tea has cooled to room temperature, transfer it to a pitcher and refrigerate until thoroughly chilled. When ready to serve, fill tall glasses with ice cubes and pour the sweetened lemon tea over the ice. Garnish each glass with a slice of fresh lemon for an extra touch of freshness and visual appeal.\r\n\r\nThe result is a crisp and invigorating beverage with the perfect balance of sweetness and tanginess. Each sip is a burst of flavor that tantalizes the taste buds and provides instant relief from the heat.\r\n\r\nSweet Lemon Iced Tea is incredibly versatile and can be customized to suit your preferences. You can experiment with different tea varieties, such as green tea or herbal tea, and adjust the sweetness and lemon intensity to create your perfect summer drink.\r\n\r\nWhether enjoyed as a refreshing pick-me-up during a backyard barbecue or as a relaxing treat on a lazy afternoon, Sweet Lemon Iced Tea is sure to become a favorite beverage for any occasion.', 0),
(7, 'Premimum Green Cofee Bean Powders', 140, 'card0.jpg', 'out of stock', 'Premium Green Coffee Bean Powder is a high-quality product derived from unroasted coffee beans. Unlike traditional coffee, which is made from roasted beans, green coffee beans are raw and retain higher levels of chlorogenic acid, a natural compound believed to offer various health benefits.\r\n\r\nThe process of roasting coffee beans reduces the chlorogenic acid content, so green coffee bean powder is often marketed as a dietary supplement for its potential health-promoting properties. Some of the claimed benefits of green coffee bean powder include weight management support, improved metabolism, and antioxidant effects.\r\n\r\nTo produce premium green coffee bean powder, high-quality beans are carefully selected and processed to preserve their natural compounds. The beans are typically harvested from organic or sustainably grown coffee plants to ensure purity and quality.\r\n\r\nOnce harvested, the green coffee beans are dried and ground into a fine powder. This powder can be consumed in various ways, such as mixing it into smoothies, shakes, or beverages, or encapsulated for convenient consumption as a dietary supplement.\r\n\r\nWhen choosing a premium green coffee bean powder, it\'s essential to look for products that are sourced from reputable suppliers and undergo rigorous testing for purity and quality. Organic certification and third-party testing can provide assurance of the product\'s authenticity and safety.\r\n\r\nWhile green coffee bean powder is generally considered safe for most people when consumed in moderation, it\'s essential to consult with a healthcare professional before adding any new dietary supplement to your routine, especially if you have underlying health conditions or are taking medications.\r\n\r\nOverall, premium green coffee bean powder offers a convenient and versatile way to incorporate the potential health benefits of green coffee into your daily routine. Whether used as a dietary supplement or as an ingredient in culinary creations, it provides a natural and flavorful option for those seeking to support their overall health and wellness.', 0),
(8, 'Green Coffee Beans', 120, 'card2.jpg', 'out of stock', 'Green coffee beans are raw, unroasted seeds of the coffee plant, scientifically known as Coffea. Unlike the familiar brown coffee beans used to brew coffee, green coffee beans have not been subjected to the roasting process, which is what gives traditional coffee its characteristic flavor, aroma, and dark color.\r\n\r\nGreen coffee beans retain higher levels of certain compounds, most notably chlorogenic acid, which is believed to have potential health benefits. Chlorogenic acid is thought to contribute to the antioxidant properties of green coffee beans, and some research suggests it may aid in weight loss, improve blood sugar levels, and support heart health.\r\n\r\nThe taste of green coffee beans is quite different from roasted coffee beans. While roasted coffee beans have a rich, complex flavor with notes of bitterness and acidity, green coffee beans have a more vegetal and grassy taste, with a slight astringency.\r\n\r\nGreen coffee beans are often used for home roasting, as some coffee enthusiasts prefer to roast their beans to their desired level of darkness and flavor. Home roasting allows for experimentation with different roast profiles and the opportunity to experience the nuances of different coffee varietals.\r\n\r\nAdditionally, green coffee beans have gained popularity as a dietary supplement in the form of green coffee bean extract. This extract is derived from green coffee beans and is often standardized to contain specific levels of chlorogenic acid. It is marketed for its potential weight loss and health benefits, although scientific evidence supporting these claims is still emerging.\r\n\r\nOverall, green coffee beans offer a unique and versatile option for coffee enthusiasts and individuals interested in exploring their potential health benefits. Whether used for home roasting or consumed as a dietary supplement, green coffee beans provide an intriguing alternative to traditional roasted coffee.', 0),
(12, 'Organic Green Coffee Beans(Unroasted)', 169, 'card3.jpg', 'out of stock', 'Organic green coffee beans, also known as unroasted coffee beans, are raw coffee seeds harvested from Coffea plants grown using organic farming practices. These beans are cultivated without the use of synthetic pesticides, herbicides, or fertilizers, and are processed in accordance with organic certification standards.\r\n\r\nThe organic certification ensures that the coffee beans are produced in an environmentally friendly and sustainable manner, promoting soil health, biodiversity, and natural resource conservation. Organic farming practices also prioritize the well-being of farm workers and minimize harm to surrounding ecosystems.Unroasted organic green coffee beans retain higher levels of beneficial compounds compared to their roasted counterparts, including chlorogenic acid, antioxidants, and other phytonutrients. Chlorogenic acid, in particular, is believed to offer various health benefits, such as supporting weight management, improving blood sugar levels, and promoting heart health.\r\nOrganic green coffee beans have a mild, slightly grassy flavor compared to roasted coffee beans. They lack the complex flavor profiles and aromas developed during the roasting process but offer a fresh and clean taste that some coffee enthusiasts enjoy.Home roasting is a popular way to unlock the flavors of organic green coffee beans. Roasting at home allows individuals to experiment with different roast profiles and customize their coffee to their preferences. It\'s an opportunity to experience the nuances of different coffee varietals and enjoy freshly roasted coffee at its peak flavor.Organic green coffee beans are also used to produce green coffee bean extract, a dietary supplement marketed for its potential health benefits. Green coffee bean extract is typically standardized to contain specific levels of chlorogenic acid and is consumed in capsule or liquid form.Whether used for home roasting or as a dietary supplement, organic green coffee beans offer a natural and sustainable option for coffee enthusiasts seeking high-quality, environmentally conscious products that align with their values and support their well-being.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `state` varchar(20) NOT NULL,
  `city` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT '''user-solid.svg''',
  `role` varchar(10) NOT NULL DEFAULT 'user',
  `status` varchar(255) NOT NULL DEFAULT 'inactive',
  `create_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`first_name`, `last_name`, `user_name`, `email`, `phone_number`, `state`, `city`, `address`, `password`, `gender`, `image`, `role`, `status`, `create_time`) VALUES
('sumit', 'jaiswal', 'sumit', 'jaiswalsumit1010@gmail.com', '2121212121', 'Uttarakhand', 'Dehradun', 'Dehradun main market near krishna colony', 'Pa$$word11', 'male', 'sumit.jpg', 'user', 'active', '2024-04-15 22:08:03');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `review_description` longtext NOT NULL,
  `name` varchar(255) NOT NULL,
  `profession` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `image`, `review_description`, `name`, `profession`) VALUES
(2, 'sumit.jpg', 'Stepping into the serene ambiance of Green Tea, I was greeted by the tantalizing aroma of freshly brewed Green Tea. The staff\'s expertise guided me through their extensive selection, and I settled on their premium Green Tea blend. From the moment the first sip touched my lips, I knew I was in for a treat. The tea\'s delicate flavor profile danced on my taste buds, offering a perfect balance of grassy notes and subtle sweetness. Each cup was a moment of pure bliss, transporting me to a state of tranquility. [Shop Name] truly offers a Green Tea experience like no other, and I can\'t wait to return for more.', 'sumit jaiswal', 'Media Analyst'),
(4, 'sumit.jpg', 'hgdhvcfdgfd', 'sumit jaiswal', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `caption1` varchar(255) NOT NULL,
  `caption2` longtext NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slider_id`, `image`, `caption1`, `caption2`, `status`) VALUES
(6, 'Pic1.jpg', 'Welcome to Green Coffee', 'Indulge in nature\'s brew at Green Coffee: where freshness meets sustainability.', 'Active'),
(7, 'p2.jpg', 'Sip the future, brew the planet.', 'Discover eco-friendly blends at Green Coffee, your sustainable caffeine haven.', 'Active'),
(8, 'p3.jpg', 'Awaken your senses, nurture the Earth.', 'Experience organic delights at Green Coffee, where every sip supports sustainability.', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `trending_products`
--

CREATE TABLE `trending_products` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_price` int(11) NOT NULL,
  `p_image` varchar(255) NOT NULL,
  `p_status` varchar(255) NOT NULL DEFAULT 'Available',
  `p_details` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trending_products`
--

INSERT INTO `trending_products` (`p_id`, `p_name`, `p_price`, `p_image`, `p_status`, `p_details`) VALUES
(2, 'Lemon Green Tea', 123, 'pr2.jpg', 'Available', ' Lemon Green Tea is a delightful fusion of two refreshing ingredients: green tea and lemon. This aromatic blend combines the grassy notes of green tea with the zesty tang of fresh lemon, resulting in a revitalizing beverage that is both invigorating and soothing.\r\n\r\nGreen tea, prized for its numerous health benefits, serves as the base for this infusion. Known for its high concentration of antioxidants and catechins, green tea is believed to support heart health, boost metabolism, and promote overall well-being. When paired with the bright citrus flavor of lemon, the result is a harmonious combination that delights the senses.\r\n\r\nThe addition of lemon not only enhances the taste of the tea but also contributes its own array of health-promoting properties. Lemons are rich in vitamin C, a powerful antioxidant that helps strengthen the immune system and aids in collagen production. The citric acid in lemon also lends a refreshing tartness to the tea, balancing the earthy undertones of the green tea leaves.\r\n\r\nLemon Green Tea can be enjoyed hot or cold, making it a versatile beverage suitable for any occasion. Whether sipped in the morning to kickstart the day or enjoyed as a refreshing pick-me-up in the afternoon, this citrus-infused green tea offers a burst of flavor and vitality with each sip.\r\n\r\nWith its refreshing taste and potential health benefits, Lemon Green Tea has become a popular choice among tea enthusiasts seeking a flavorful and rejuvenating beverage that nourishes both body and soul.                                   '),
(3, 'Kabusecha Green Tea', 160, 'pr3.png', 'out of stock', 'Kabusecha Green Tea, often referred to as \"covered tea,\" is a premium Japanese green tea with a unique cultivation method that sets it apart from other varieties. The name \"Kabusecha\" derives from the Japanese word \"kabuseru,\" meaning \"to cover.\" This tea is produced by shading the tea bushes for a short period before harvest, typically about one to two weeks.\r\n\r\nThis shading process causes the tea leaves to develop a rich, complex flavor profile and a vibrant green color. By limiting the exposure to sunlight, the tea plants produce higher levels of chlorophyll and amino acids, particularly L-theanine, which contributes to Kabusecha\'s distinctive taste and aroma.\r\n\r\nKabusecha is prized for its delicate balance of umami sweetness and refreshing astringency. It offers a smooth, mellow taste with subtle vegetal notes and a hint of sweetness, making it a favorite among tea connoisseurs.\r\n\r\nIn addition to its exceptional flavor, Kabusecha is also valued for its health benefits. Like other green teas, it is rich in antioxidants and polyphenols, which are believed to have various health-promoting properties, including boosting the immune system and supporting cardiovascular health.\r\n\r\nTraditionally, Kabusecha is enjoyed in Japan as a high-quality everyday tea or served on special occasions. Its nuanced flavor and elegant aroma make it a beloved choice for tea enthusiasts seeking a refined and authentic Japanese tea experience. Whether enjoyed hot or cold, Kabusecha Green Tea offers a moment of tranquility and indulgence with each sip, inviting drinkers to savor the essence of Japanese tea culture.'),
(5, 'Lemon Verbena Tea', 180, 'pr5.jpg', 'Available', 'Lemon Verbena Tea is a fragrant herbal infusion made from the leaves of the lemon verbena plant (Aloysia citrodora). This tea offers a refreshing and citrusy flavor profile with delicate floral undertones, making it a popular choice for those seeking a light and aromatic beverage.\r\n\r\nLemon verbena is native to South America but is now cultivated in various regions around the world for its culinary and medicinal uses. The plant\'s leaves are prized for their strong lemon scent and flavor, which is released when steeped in hot water to create a soothing and flavorful tea.\r\n\r\nTo brew Lemon Verbena Tea, simply steep a few dried or fresh lemon verbena leaves in hot water for several minutes. The resulting infusion boasts a bright yellow-green color and a vibrant aroma that instantly uplifts the senses. The taste is reminiscent of fresh lemon with a subtle sweetness and a hint of herbal complexity.\r\n\r\nIn addition to its delightful taste and aroma, Lemon Verbena Tea is believed to offer a range of health benefits. It is often used in traditional herbal medicine for its digestive properties, helping to soothe stomach discomfort and alleviate bloating. Lemon verbena is also valued for its calming effects, making it a popular choice for promoting relaxation and reducing stress.\r\n\r\nWhether enjoyed hot or cold, Lemon Verbena Tea is a versatile beverage that can be savored throughout the day. It is caffeine-free, making it a suitable option for those looking to reduce their caffeine intake or enjoy a soothing drink before bedtime.\r\n\r\nWith its invigorating citrus flavor and potential health benefits, Lemon Verbena Tea offers a refreshing and rejuvenating experience that delights the palate and soothes the soul. Whether enjoyed on its own or blended with other herbs and botanicals, it is a delightful choice for tea enthusiasts seeking a flavorful and aromatic infusion.'),
(6, 'Sweet Lemon Iced Tea', 218, 'pr6.jpg', 'Available', 'Sweet Lemon Iced Tea is a delightful and refreshing beverage that combines the classic flavors of iced tea with a burst of tangy sweetness from fresh lemon. This thirst-quenching concoction is perfect for hot summer days or any time you crave a cool and flavorful drink.\r\n\r\nTo make Sweet Lemon Iced Tea, start by brewing a strong batch of black tea or your favorite tea blend. Allow the tea to steep for the recommended time to extract maximum flavor. While the tea is still hot, add a generous amount of sugar or your preferred sweetener to taste, stirring until completely dissolved.\r\n\r\nNext, squeeze fresh lemon juice into the sweetened tea, adjusting the amount to achieve your desired level of tartness. The lemon juice not only adds a refreshing citrus flavor but also enhances the overall brightness of the drink.\r\n\r\nOnce the tea has cooled to room temperature, transfer it to a pitcher and refrigerate until thoroughly chilled. When ready to serve, fill tall glasses with ice cubes and pour the sweetened lemon tea over the ice. Garnish each glass with a slice of fresh lemon for an extra touch of freshness and visual appeal.\r\n\r\nThe result is a crisp and invigorating beverage with the perfect balance of sweetness and tanginess. Each sip is a burst of flavor that tantalizes the taste buds and provides instant relief from the heat.\r\n\r\nSweet Lemon Iced Tea is incredibly versatile and can be customized to suit your preferences. You can experiment with different tea varieties, such as green tea or herbal tea, and adjust the sweetness and lemon intensity to create your perfect summer drink.\r\n\r\nWhether enjoyed as a refreshing pick-me-up during a backyard barbecue or as a relaxing treat on a lazy afternoon, Sweet Lemon Iced Tea is sure to become a favorite beverage for any occasion.'),
(7, 'Premimum Green Cofee Bean Powders', 140, 'card0.jpg', 'Available', 'Premium Green Coffee Bean Powder is a high-quality product derived from unroasted coffee beans. Unlike traditional coffee, which is made from roasted beans, green coffee beans are raw and retain higher levels of chlorogenic acid, a natural compound believed to offer various health benefits.\r\n\r\nThe process of roasting coffee beans reduces the chlorogenic acid content, so green coffee bean powder is often marketed as a dietary supplement for its potential health-promoting properties. Some of the claimed benefits of green coffee bean powder include weight management support, improved metabolism, and antioxidant effects.\r\n\r\nTo produce premium green coffee bean powder, high-quality beans are carefully selected and processed to preserve their natural compounds. The beans are typically harvested from organic or sustainably grown coffee plants to ensure purity and quality.\r\n\r\nOnce harvested, the green coffee beans are dried and ground into a fine powder. This powder can be consumed in various ways, such as mixing it into smoothies, shakes, or beverages, or encapsulated for convenient consumption as a dietary supplement.\r\n\r\nWhen choosing a premium green coffee bean powder, it\'s essential to look for products that are sourced from reputable suppliers and undergo rigorous testing for purity and quality. Organic certification and third-party testing can provide assurance of the product\'s authenticity and safety.\r\n\r\nWhile green coffee bean powder is generally considered safe for most people when consumed in moderation, it\'s essential to consult with a healthcare professional before adding any new dietary supplement to your routine, especially if you have underlying health conditions or are taking medications.\r\n\r\nOverall, premium green coffee bean powder offers a convenient and versatile way to incorporate the potential health benefits of green coffee into your daily routine. Whether used as a dietary supplement or as an ingredient in culinary creations, it provides a natural and flavorful option for those seeking to support their overall health and wellness.'),
(8, 'Green Coffee Beans', 120, 'card2.jpg', 'Available', 'Green coffee beans are raw, unroasted seeds of the coffee plant, scientifically known as Coffea. Unlike the familiar brown coffee beans used to brew coffee, green coffee beans have not been subjected to the roasting process, which is what gives traditional coffee its characteristic flavor, aroma, and dark color.\r\n\r\nGreen coffee beans retain higher levels of certain compounds, most notably chlorogenic acid, which is believed to have potential health benefits. Chlorogenic acid is thought to contribute to the antioxidant properties of green coffee beans, and some research suggests it may aid in weight loss, improve blood sugar levels, and support heart health.\r\n\r\nThe taste of green coffee beans is quite different from roasted coffee beans. While roasted coffee beans have a rich, complex flavor with notes of bitterness and acidity, green coffee beans have a more vegetal and grassy taste, with a slight astringency.\r\n\r\nGreen coffee beans are often used for home roasting, as some coffee enthusiasts prefer to roast their beans to their desired level of darkness and flavor. Home roasting allows for experimentation with different roast profiles and the opportunity to experience the nuances of different coffee varietals.\r\n\r\nAdditionally, green coffee beans have gained popularity as a dietary supplement in the form of green coffee bean extract. This extract is derived from green coffee beans and is often standardized to contain specific levels of chlorogenic acid. It is marketed for its potential weight loss and health benefits, although scientific evidence supporting these claims is still emerging.\r\n\r\nOverall, green coffee beans offer a unique and versatile option for coffee enthusiasts and individuals interested in exploring their potential health benefits. Whether used for home roasting or consumed as a dietary supplement, green coffee beans provide an intriguing alternative to traditional roasted coffee.');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `user_name` varchar(255) NOT NULL,
  `p_id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_price` int(11) NOT NULL,
  `p_image` varchar(255) NOT NULL,
  `p_status` varchar(255) NOT NULL,
  `p_details` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand_icon`
--
ALTER TABLE `brand_icon`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`user_name`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `trending_products`
--
ALTER TABLE `trending_products`
  ADD PRIMARY KEY (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand_icon`
--
ALTER TABLE `brand_icon`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `trending_products`
--
ALTER TABLE `trending_products`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
