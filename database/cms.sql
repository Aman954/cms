-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 29, 2020 at 08:39 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

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
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(1, 'laptops'),
(2, 'books'),
(5, 'codings'),
(6, 'gamings');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `post_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `date`, `name`, `username`, `post_id`, `email`, `website`, `image`, `comment`, `status`) VALUES
(3, 1589971433, 'Akshay Sharma', 'amanagarwal925@gmail.com', 2, 'amanagarwal925@gmail.com', 'abcd.com', 'guru.png', 'Demo checking its working or not.', 'pending'),
(5, 1590434905, 'Lisa Rathod', 'rk954@', 2, 'akash925@gmail.com', 'not required', 'FB_IMG_1532676995896.jpg', 'hello iam aman', 'pending'),
(7, 1590660174, 'Akshay Sharma', 'akshay90@gmail.com', 9, 'akshay90@gmail.com', 'abcd.com', 'guru.png', 'hello there', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `image`) VALUES
(34, '_66518453_blast000701.jpg'),
(35, '_85483985_85483984.jpg'),
(36, '0.jpg'),
(38, 'Tokensjpg.jpg'),
(39, 'C-Keywords-1.1.png');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `author_image` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `post_data` text NOT NULL,
  `views` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `date`, `title`, `author`, `author_image`, `image`, `category`, `tags`, `post_data`, `views`, `status`) VALUES
(1, 1234567890, 'Learn PHP and MYSQL with Aman Agarwal', 'aman954@', 'happy.jpg', 'grey.jpg', 'books', 'programming,coding,skill,online-tutorials,books', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1003, 'publish'),
(2, 1345679890, 'How to make your website more beautifull and attractive', 'rk954@', 'icon1.jpg', 'men.jpg', 'laptops', 'programming,coding,laptops,tutorials', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 67, 'draft'),
(5, 1345679890, 'Education for all', 'karishma', 'icon1.jpg', 'grey.jpg', 'books', 'programming,coding,books,tutorials', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1013, 'publish'),
(6, 1234567890, 'Learn Python with Aman Agarwal', 'Aman Agarwal', 'happy.jpg', 'grey.jpg', 'books', 'programming,coding,skill,online-tutorials,books', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 10047, 'publish'),
(9, 1590660020, 'Identifiers in C', 'aman954@', 'FB_IMG_1532673985226.jpg', 'identifiers.jpg', 'codings', 'coding,programming,c language', '<h1 class=\"nil\">Identifiers In C</h1>\r\n<p>The smallest identifying unit in a programme is called&nbsp;<strong>identifiers</strong>.As from the word itself \'identifiers\' means something which can identify a particular thing. In a programme there are number of lines of code and each line have some words(identifier) and these each words are identifiers.<br /><br />Some basic category of identifiers are:</p>\r\n<ul>\r\n<li>Constant</li>\r\n<li>Variables</li>\r\n<li>Keywords</li>\r\n</ul>\r\n<h1>&nbsp;</h1>\r\n<h1><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"../media/Tokensjpg.jpg\" alt=\"Tokensjpg.jpg\" width=\"484\" height=\"253\" /></h1>\r\n<h1>&nbsp;</h1>\r\n<h1>Constant</h1>\r\n<p>Constants refer to fixed values. They are also called as literals. Constants may be belonging to any of the data type. Any information is constant.In simple word constant are those whose value cannot be changed w.r.t time right?</p>\r\n<h3>According to Programming:</h3>\r\n<p>Almost every software are used or create to manage the information eg:ATM software and these information is called constant or data.</p>\r\n<h3>Types of Constant</h3>\r\n<h4>Primary</h4>\r\n<div class=\"container go\">\r\n<ul>\r\n<li>Primary</li>\r\n<li>Integer</li>\r\n<li>Real</li>\r\n<li>Character</li>\r\n</ul>\r\n</div>\r\n<h4>Secondary</h4>\r\n<ul>\r\n<li>Array</li>\r\n<li>String</li>\r\n<li>Pointer</li>\r\n<li>Union</li>\r\n<li>Structure</li>\r\n<li>Enumerator</li>\r\n</ul>\r\n<h3>Primary constant</h3>\r\n<p>1.Integer:&nbsp;In simple words Integer are those values who does not contain any floating value.<br />eg:&nbsp;0,54,-54 etc.<br />Range:&nbsp;-32768 to 32767.<br />There are three types of integer constants based on diffrent number system(decimal,octal,hexadecimal).<br />Some invalid decimal integer constant are:<br />2.5,3#5,(8,345) etc.<br /><br />In Octal integer constant,First digit must be \"zero\".<br />eg:&nbsp;06,077,0354<br /><br />In Hexadecimal constants,first two character should be \"ox\" or \"OX\".<br />eg:&nbsp;OX23,ox515,OXA15B etc.</p>\r\n<p>&nbsp;</p>\r\n<p>2.Real:&nbsp;Floating point constants are the numeric constants that has either fractional form or exponent form.&nbsp;eg:&nbsp;0.0000234, -0.22E-5 etc.<br />Range:&nbsp;Range of real constants expressed in exponential for is -3.4e38 to 3.4e38.<br /><br />In order to express very large or very small real constants,exponential(scientific) form is used.Here the number is written in the form of mantissa and exponent,which are separated by \'e\' or \'E\'.<br />The Mantissa can be an integer or a real number,while the exponent can be only an integer(positive or negative).<br />eg:&nbsp; number<br />3500000000--&gt;3.5&times;10<sup>9</sup>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Exponent form:3.5e9<br />0.0000089--&gt;8.9&times;10<sup>-6</sup>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Exponent form:8.9e-6<br />-350000--&gt;-3.5&times;10<sup>5</sup>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Exponent form:-6.7E5</p>\r\n<p>&nbsp;</p>\r\n<p>3.Character:&nbsp;Character constant is a single symbol enclosed within single quotes .<br />eg:&nbsp;\'0\',\'D\',\'$\',\' \'etc.<br />Some invalid:<br />\'-2\':More than one character is not allowed.<br />\"A\":&nbsp;Double Quotes are not alowd.<br />&nbsp;&nbsp;q:&nbsp;Single quotes are missing.<br />Note:&nbsp;A string constants are enclosed within double quotes.</p>\r\n<p>&nbsp;</p>\r\n<h2>Variables</h2>\r\n<p>Whenever our programme runs it occupies some memory of ram.In memory programme is stored in the form of data and instructions.Here,instructions means command like adding of two numbers,multiply of two numbers etc. In addition we need some data to add numbers.In programme instruction uses this data to give the result.So,in every programme some data is required to perform the task.We need to write some special lines to tell compiler about storage we required to store a data.</p>\r\n<div class=\"container no\">\r\n<h5>eg:Addition of two numbers.</h5>\r\n</div>\r\n<p>In addition of two numbers we handle three numbers two numbers for addition and one number for result of these two numbers.</p>\r\n<p>For Addition we required 3 blocks(places) in memory let A,B and c where we stored these data so that means we reserved these blocks(places) in memory.for this we required to write some lines in a programme to tell compiler about these blocks(place) required for storage. like int a where int is data-type(for more about data-types go to data-type section)&nbsp;and a is the name of variable.<br /><br />To identify these blocks in memory we required to give some names to them.<br />eg:int a=10;int b; etc<br /><br />When a variable is declared it containes undefined value commonly known as garbage value(like in int b;)<br />If we want we can assign some initial value to the variable during the declaration itself, this is called initialization of variable(like in int a=10).<br /><br />So,c variable is a named location in a memory where a program can manipulate the data. This location is used to hold the value of the variable.</p>\r\n<p>&nbsp;</p>', 21, 'publish'),
(11, 1590662057, 'variables in c sharp', 'akshay', '82419354_2459604727633538_5640761209046171648_o.jpg', 'ear.jpg', 'codings', 'demo,check,lipsum', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>hbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbsdddddddddddddddddddddddddd</p>\r\n<p><strong><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"media/Tokensjpg.jpg\" alt=\"Tokensjpg.jpg\" width=\"464\" height=\"243\" /></strong></p>', 10, 'publish');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `salt` varchar(255) NOT NULL DEFAULT '$2y$10$quickbrownfoxjumpsover'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `date`, `first_name`, `last_name`, `username`, `mail`, `image`, `password`, `role`, `details`, `salt`) VALUES
(5, 1590145147, 'Lisa', 'Rathod', 'Rk954@', 'akash925@gmail.com', 'FB_IMG_1532676995896.jpg', '$2y$10$quickbrownfoxjumpsovee5Ix7/leVOx9APWXLkrlgub8yDZCZTzG', 'Author', 'hello iam Lisa you know that na.', '$2y$10$quickbrownfoxjumpsover'),
(8, 1590248084, 'Aman', 'Agarwal', 'aman954@', 'amanaggarwal925@gmail.com', 'FB_IMG_1532673985226.jpg', '$2y$10$quickbrownfoxjumpsoveeFZudn.Q8WXWXY1ahgMpR/2Um2.lHanW', 'Admin', 'hello iam aman', '$2y$10$quickbrownfoxjumpsover'),
(10, 1590661326, 'Ashish kr', 'Sharma', 'akshay', 'akshay90@gmail.com', 'FB_IMG_1532673938517.jpg', '$2y$10$quickbrownfoxjumpsoveeaV/gZmCxOatJT8wj2NYTU9wct2lrB0G', 'Admin', 'hello iam aman agarwal', '$2y$10$quickbrownfoxjumpsover');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
