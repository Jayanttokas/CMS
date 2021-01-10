-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 10, 2021 at 05:44 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Chinese'),
(2, 'Italian'),
(3, 'Indian'),
(23, 'american');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_user` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_user`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(16, 64, 'abhinav', 'rdfagcgfv@gmail.com', 'Really Informative', 'approved', '2020-06-24'),
(17, 64, 'abhinav', 'rdfagcgfv@gmail.com', 'I will try making pasta today\r\n', 'approved', '2020-06-24');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_user` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL,
  `post_view_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_user`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_view_count`) VALUES
(64, 2, 'Pasta', 'abhinav', '2020-09-29', 'OnePotPasta-47b5b0a.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sed arcu erat. Cras et sagittis dolor, nec euismod felis. Aliquam ultricies sodales massa et tincidunt. Integer id urna enim. Sed varius risus a quam tincidunt, ac accumsan quam euismod. Mauris accumsan velit in enim convallis, id placerat eros volutpat. Nulla facilisi. Donec sed ex ultricies, ultrices dolor at, vulputate magna. Etiam blandit eros eget mattis venenatis. Pellentesque sed venenatis metus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aenean ante felis, gravida eget justo et, fringilla fermentum libero. Sed mattis, ipsum porttitor sollicitudin vulputate, ex tortor pretium tortor, ac euismod est ipsum id lorem. Nam euismod sem quis interdum semper.</p>', 'food,italian,pasta,abhinav', 3, 'published', 89),
(65, 1, 'Fried Rice', 'abhinav', '2020-06-25', 'Schezwan-Egg-Fried-Rice-3.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sed arcu erat. Cras et sagittis dolor, nec euismod felis. Aliquam ultricies sodales massa et tincidunt. Integer id urna enim. Sed varius risus a quam tincidunt, ac accumsan quam euismod. Mauris accumsan velit in enim convallis, id placerat eros volutpat. Nulla facilisi. Donec sed ex ultricies, ultrices dolor at, vulputate magna. Etiam blandit eros eget mattis venenatis. Pellentesque sed venenatis metus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aenean ante felis, gravida eget justo et, fringilla fermentum libero. Sed mattis, ipsum porttitor sollicitudin vulputate, ex tortor pretium tortor, ac euismod est ipsum id lorem. Nam euismod sem quis interdum semper.</p>', 'food,chinese,fried rice,abhinav', 0, 'published', 5),
(67, 3, 'Gol Gappe', 'abhinav', '2020-06-26', 'gol-gappa_650x400_71485331632.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sed arcu erat. Cras et sagittis dolor, nec euismod felis. Aliquam ultricies sodales massa et tincidunt. Integer id urna enim. Sed varius risus a quam tincidunt, ac accumsan quam euismod. Mauris accumsan velit in enim convallis, id placerat eros volutpat. Nulla facilisi. Donec sed ex ultricies, ultrices dolor at, vulputate magna. Etiam blandit eros eget mattis venenatis. Pellentesque sed venenatis metus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aenean ante felis, gravida eget justo et, fringilla fermentum libero. Sed mattis, ipsum porttitor sollicitudin vulputate, ex tortor pretium tortor, ac euismod est ipsum id lorem. Nam euismod sem quis interdum semper.</p>', 'food,indian,gol gappe,abhinav', 0, 'published', 1),
(99, 2, 'Pasta', 'abhinav', '2020-12-29', 'OnePotPasta-47b5b0a.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sed arcu erat. Cras et sagittis dolor, nec euismod felis. Aliquam ultricies sodales massa et tincidunt. Integer id urna enim. Sed varius risus a quam tincidunt, ac accumsan quam euismod. Mauris accumsan velit in enim convallis, id placerat eros volutpat. Nulla facilisi. Donec sed ex ultricies, ultrices dolor at, vulputate magna. Etiam blandit eros eget mattis venenatis. Pellentesque sed venenatis metus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aenean ante felis, gravida eget justo et, fringilla fermentum libero. Sed mattis, ipsum porttitor sollicitudin vulputate, ex tortor pretium tortor, ac euismod est ipsum id lorem. Nam euismod sem quis interdum semper.</p>', 'food,italian,pasta,abhinav', 0, 'published', 0),
(100, 1, 'Fried Rice', 'abhinav', '2020-12-29', 'Schezwan-Egg-Fried-Rice-3.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sed arcu erat. Cras et sagittis dolor, nec euismod felis. Aliquam ultricies sodales massa et tincidunt. Integer id urna enim. Sed varius risus a quam tincidunt, ac accumsan quam euismod. Mauris accumsan velit in enim convallis, id placerat eros volutpat. Nulla facilisi. Donec sed ex ultricies, ultrices dolor at, vulputate magna. Etiam blandit eros eget mattis venenatis. Pellentesque sed venenatis metus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aenean ante felis, gravida eget justo et, fringilla fermentum libero. Sed mattis, ipsum porttitor sollicitudin vulputate, ex tortor pretium tortor, ac euismod est ipsum id lorem. Nam euismod sem quis interdum semper.</p>', 'food,chinese,fried rice,abhinav', 0, 'published', 0),
(101, 3, 'Gol Gappe', 'abhinav', '2020-12-29', 'gol-gappa_650x400_71485331632.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sed arcu erat. Cras et sagittis dolor, nec euismod felis. Aliquam ultricies sodales massa et tincidunt. Integer id urna enim. Sed varius risus a quam tincidunt, ac accumsan quam euismod. Mauris accumsan velit in enim convallis, id placerat eros volutpat. Nulla facilisi. Donec sed ex ultricies, ultrices dolor at, vulputate magna. Etiam blandit eros eget mattis venenatis. Pellentesque sed venenatis metus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aenean ante felis, gravida eget justo et, fringilla fermentum libero. Sed mattis, ipsum porttitor sollicitudin vulputate, ex tortor pretium tortor, ac euismod est ipsum id lorem. Nam euismod sem quis interdum semper.</p>', 'food,indian,gol gappe,abhinav', 0, 'published', 0),
(102, 3, 'yasgiuahb', 'abhinav', '2021-01-04', '1733203.jpg', '<p>hjydgaiukhdbloaehfohaeiofheaoiuhfiaehofl</p>', 'abhi , abhinav ', 0, 'published', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`) VALUES
(20, 'abhinav', '$2y$12$PF6IyZs/vJ0.W.TfHmdl0eTrfNE1GKPq3IZxQs52bkx8DxobtBxWe', 'manny', 'tanwar', 'abhinav@123', '', 'admin'),
(21, 'akku', '$gAlPD.TWsTH6', '', '', 'akku@123', '', 'subscriber'),
(22, 'rohan', '$gyGmycUdOKdY', '', '', 'hbh@vgv', '', 'admin'),
(27, 'user', '$2y$12$oYIMJ2c5meoQyzs9xtZb2umI8vYlfQMUEzdyws.rltpc.bc7id2Em', 'user', 'uu', 'user@123', '', 'subscriber'),
(32, 'manny123', '$2y$12$qq/JFVHmRa/PqKahQJ0RLumaBiGDIbLk3xn8eXilcmzxEbYH/O.ey', '', '', 'manny123@gmail.com', '', 'subscriber'),
(65, 'akkuakku', '$2y$12$YxrBG.2KbEC/gYLfynV6cevneAJimnfsuLqSraYVw5BvioOoQ5Yoi', '', '', 'akkuakku@gmail.com', '', 'admin'),
(66, 'abhinav05', '$2y$12$qG8WpD2Hb2hifMZDJWMieeOGgBpBRyAyy0e2dKFgUnwrdcmldWnd2', 'abhinav ', 'tanwar', 'tabhinav300@gmail.com', '', 'admin'),
(67, 'kanan', '$2y$12$nOJKprnd3IBX1T.iqXRog.ujax6Uji19TxEbLj5l70RVqWIa.tVHa', '', '', 'kanan100@gmail.com', '', 'subscriber'),
(68, 'jayant', '$2y$12$0rNH2G9OedFZyF.umVDJ8eVBcKX22BGws74EVpD7QNxVDUhVCyoS.', '', '', 'jayant1@gmail.com', '', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

CREATE TABLE `users_online` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_online`
--

INSERT INTO `users_online` (`id`, `session`, `time`) VALUES
(6, 'gqikdi41j31j4buiqe72gidsva', 1592681710),
(7, 'mvbbfladfakhpl0ma1sk13gqfa', 1592679749),
(8, '2if2645bo461dh9u3k4fvbf381', 1592679831),
(9, 'ev0qc5o2g17en70na40856pbjq', 1592680520),
(10, 'qibnopjbl08go6ms5uqe7fpbk7', 1592711098),
(11, 'tahnnsr2prds96s0h4gnvlakla', 1592771590),
(12, '61rs9ivn55cga7hngmbjk5b5ib', 1592840241),
(13, '44bq4unbuqned37rv8hqtcebsv', 1592923729),
(14, 'mrb69ado7t1j47csfgvoleesih', 1592997891),
(15, 'vblgmnfkt5isjeennfprvuuff9', 1593026572),
(16, '4t98sg4rsjk282ensvlkv6jo7k', 1593227151),
(17, 'dh4ff7raqibfkcam22d7lte8s6', 1593287332),
(18, '52bf9n0c4s1p7ebsvk27or8h8q', 1593373249),
(19, '0gg6smcr1fmm9lr42i6dau0mjk', 1593443180),
(20, 'b6cmu17rn6tdcg56b17rlb9579', 1593455628),
(21, '6d13nktnilli0vq2u9mu04h15q', 1593530565),
(22, 'clh5mt870h4r451js29ohrb9t3', 1593528447),
(23, '9p2nrfob6l1pp2icgsv7oedodh', 1593549524),
(24, '9g5n039vj9heoocbqg30a4jfni', 1593674015),
(25, 'ugu6l45hr0q0k208pdmqadqs7s', 1593716699),
(26, 'eot5o95679t2fdd39j7v8es8ei', 1593759581),
(27, '9gubh2v9dqaeqk221en8vv244t', 1593833773),
(28, 'e2lb0joj7ot3cu5h9qiej7gm20', 1593955086),
(29, 'hsklt370d91fscn69ffoe8via6', 1594177069),
(30, 'q15o1ch5a7fv35hat8pnrc5qvt', 1594453075),
(31, 'qq7kp6tb10d4cv62l1l6fmlj90', 1595703437),
(32, 'rou2dfotljfpvrvdot6lblm2fs', 1599543540),
(33, 'r65ng11i547v06mcfn23n6jnus', 1601371074),
(34, 'ifdspacr5sm3l5elbsir5a0tpi', 1609234417),
(35, 'u5m8epj8mg90gt6tatdl0ks5cs', 1609232177),
(36, '90i6t8cp8j3itcd7p76gd6b02n', 1609764038),
(37, 'fg59frqm6p2hdbd4slvd5s7ba5', 1609762810),
(38, '07f83a2462e83bd854e3ed9c68fa0a45', 1609924751),
(39, 'daf5e69311f29ded179c5a2de4affa5f', 1610018681),
(40, '4547d7e3ef4b02cf5e6698e7cc213477', 1610176945);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_online`
--
ALTER TABLE `users_online`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `users_online`
--
ALTER TABLE `users_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
