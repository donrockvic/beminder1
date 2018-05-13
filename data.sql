 --
-- MySQL 5.6.17
-- Mon, 12 Sep 2016 07:47:20 +0000
--

 

USE `1224158`;

CREATE TABLE `admin` (
   `id` bigint(10) not null auto_increment,
   `username` varchar(40) not null,
   `password` varchar(100) not null,
   `fullname` varchar(100) not null,
   `email` varchar(200) not null,
   PRIMARY KEY (`username`),
   UNIQUE KEY (`id`),
   UNIQUE KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=10006;

INSERT INTO `admin` (`id`, `username`, `password`, `fullname`, `email`) VALUES 
('10001', 'admin', '$2y$10$NjI2MjRlZjlmNmQ1NTUxOO.4F6HhoM264l0peazwdCfn1jFj9PhZW', 'ankit kumar', 'ankit@gmail.com'),
('10005', 'rocvic', '$2y$10$ODdjNGQwNWQyODU5OGExMeU72MWfkQAr7T97iXGwC8K7PXEfXW9i6', 'vicky kumar', 'vicky123kumar22@gmail.com');

CREATE TABLE `books` (
   `id` bigint(100) not null auto_increment,
   `title` varchar(200) not null,
   `author` varchar(100) not null,
   `publisher` varchar(100) not null,
   `dess` varchar(400) not null,
   `image` varchar(200) not null,
   `amount` bigint(10) not null,
   `price` bigint(10),
   `rent` bigint(10),
   `sprice` bigint(10),
   `erent` bigint(10),
   `discount` bigint(5) not null,
   `ISBN1` varchar(40) not null,
   `ISBN2` varchar(40),
   `type` varchar(50) not null,
   `subtype` varchar(50),
   `lasttype` varchar(40),
   `dates` date not null,
   `uploader` varchar(20) not null,
   `skeys` varchar(1000) not null,
   PRIMARY KEY (`id`),
   UNIQUE KEY (`title`),
   UNIQUE KEY (`image`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1000014;

INSERT INTO `books` (`id`, `title`, `author`, `publisher`, `dess`, `image`, `amount`, `price`, `rent`, `sprice`, `erent`, `discount`, `ISBN1`, `ISBN2`, `type`, `subtype`, `lasttype`, `dates`, `uploader`, `skeys`) VALUES 
('1000001', 'The definite guide to netbeans 7', 'heiko bock', 'apress', 'the netbeans ide developer guide  ', 'book1.PNG', '0', '100', '0', '50', '30', '15', '12345', '123456', 'e', 'cse', 'English', '2016-09-06', 'beminder', 'netbeans ide developer guide   computer science  engineering heiko bock apress'),
('1000002', 'microsoft ASP  MVC', 'Dino Esposito', 'Professional', 'this book of asp shows more about the details of asp ', 'book2.PNG', '21', '52', '25', '20', '15', '10', '12563', '343435353', 'e', 'cse', 'English', '2016-09-02', 'beminder', 'microsoft ASP  MVC Dino Esposito Professional  computer science  engineering'),
('1000003', 'Orgnisational Behaviour', 'v G kondalkar', 'new age', ' this book give us the details about the behaviour of a poeple in a society', 'book3.PNG', '6', '300', '250', '200', '100', '10', '124563', '36363366363', 'e', 'ece', 'English', '2016-09-02', 'beminder', ' computer science  engineering'),
('1000004', 'netbens ide cookbook 7', ' rhawi dantas', 'pack open source', ' a other netbeans book', 'book4.PNG', '2', '600', '300', '300', '200', '10', '1245631', '335353522', 'e', 'cse', 'English', '2016-09-02', 'beminder', ' computer science  engineering'),
('1000005', 'a big book of windows hack', 'preston gralla', 'oreilly', 'a hack book ', 'book6.PNG', '12', '500', '300', '250', '100', '10', '7894566', '456444222', 'e', 'cse', 'English', '2016-09-02', 'beminder', ' computer science  engineering'),
('1000006', 'html and css', 'john ducket', 'oreilly', 'a hhtml best book ', 'book10.PNG', '5', '1000', '100', '125', '122', '10', '10001', '34545654432', 'e', 'cse', 'English', '2016-09-02', 'beminder', ' computer science  engineering'),
('1000007', 'html xhtml tutoril', 'john ducket', 'oreilly', ' another html books', 'book13.PNG', '34', '145', '12', '124', '14', '10', '11212545', '1232365465', 'e', 'cse', 'English', '2016-09-05', 'beminder', ' computer science  engineering'),
('1000008', 'one indian girl', 'chetan bhagat', 'astro', ' description of a indian girl life', '51VxnQD7kpL._SL500_SR88,135_.jpg', '4', '500', '200', '250', '100', '10', '7412589631234', '6152631478', 'lt', 'fr', 'English', '2016-09-06', 'beminder', ''),
('1000009', 'who will cry when u die', 'robin sharma', 'astro', 'this book describe that who will cry when u die  ', '51LWolxDRDL._SL500_SR99,135_.jpg', '123', '500', '250', '200', '200', '12', '4152632136', '451263', 'lt', 'play', 'English', '2016-09-06', 'beminder', ' computer science  engineering'),
('1000010', 'You are the best wife', 'asker', 'wiley', 'a good wife book ', '51aHUIrSlSL._SL500_SR89,135_.jpg', '3', '500', '152', '123', '125', '10', '1478522', '1225466', 'gh', 'gr', 'English', '2016-09-06', 'beminder', ' computer science  engineering'),
('1000011', 'complete atlas of the world', 'dk', 'atlas', 'a book of a lot of maps  of the world world', 'book8.PNG', '10', '1000', '500', '250', '120', '10', '1245632', '12245633', 'e', 'cse', 'English', '2016-09-07', 'beminder', ' computer science  engineering'),
('1000013', 'hemingway', 'me', 'uou', ' dghddf sgs ', '51jNxxdgyjL._SL500_SR83,135_.jpg', '123', '12', '0', '0', '0', '10', ' 124-5656 ', ' 65-565 ', 'e', 'civil', 'English', '2016-09-09', 'beminder', 'hemingway me uou Engineering Civil Engineering English');

CREATE TABLE `comments` (
   `id` bigint(10) not null auto_increment,
   `productid` bigint(20) not null,
   `name` varchar(100) not null,
   `comment` varchar(500) not null,
   UNIQUE KEY (`id`),
   KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=18;

INSERT INTO `comments` (`id`, `productid`, `name`, `comment`) VALUES 
('8', '1000010', 'vicky kumar', 'kharab hai'),
('9', '1000013', 'vicky kumar', ''),
('10', '1000013', 'vicky kumar', ''),
('11', '1000013', 'vicky kumar', ''),
('12', '1000013', 'vicky kumar', ''),
('13', '1000013', 'vicky kumar', ''),
('14', '1000013', 'vicky kumar', ''),
('15', '1000013', 'vicky kumar', ''),
('16', '1000013', 'vicky kumar', ''),
('17', '1000013', 'vicky kumar', 'cgdgdhfh');

CREATE TABLE `ebook` (
   `id` bigint(10) not null auto_increment,
   `book_id` varchar(10) not null,
   `name` varchar(200) not null,
   PRIMARY KEY (`book_id`),
   UNIQUE KEY (`id`),
   UNIQUE KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=4;

INSERT INTO `ebook` (`id`, `book_id`, `name`) VALUES 
('2', '1000005', 'books_5284_0.pdf'),
('1', '1000006', 'duckett.pdf'),
('3', '3000001', 'Head First HTML with CSS &amp; XHTML.pdf');

CREATE TABLE `feedback` (
   `id` bigint(10) not null auto_increment,
   `name` varchar(200) not null,
   `email` varchar(40) not null,
   `feedback` varchar(2000) not null,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=2;

INSERT INTO `feedback` (`id`, `name`, `email`, `feedback`) VALUES 
('1', 'vicky', 'vicky123kumar22@gmail.com', 'accha site hai');

CREATE TABLE `orders` (
   `order_id` varchar(100) not null,
   `user_email` varchar(200) not null,
   `product_id` varchar(400) not null,
   `book_name` varchar(200) not null,
   `quantity` varchar(30) not null,
   `price` bigint(10) not null,
   `order_date` date not null,
   `order_time` time not null,
   `status` varchar(20) not null,
   `ofor` varchar(500) not null,
   `too` varchar(500) not null,
   PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `orders` (`order_id`, `user_email`, `product_id`, `book_name`, `quantity`, `price`, `order_date`, `order_time`, `status`, `ofor`, `too`) VALUES 
('beminder1296', 'vicky123kumar22@gmail.com', '1000013', 'hemingway', '1', '12', '2016-09-11', '16:32:25', 'Active', 'new book', 'beminder'),
('beminder2683', 'vicky123kumar22@gmail.com', '1000010', 'You are the best wife', '1', '500', '2016-09-11', '16:35:16', 'Active', 'new book', 'beminder'),
('beminder7663', 'vicky123kumar22@gmail.com', '3000003', 'Professional node js', '1', '500', '2016-09-11', '18:22:00', 'Active', 'new book', 'hare ram store'),
('order100', 'vicky123kumar22@gmail.com', '1000002', 'microsoft ASP  MVC', '1', '52', '2016-09-10', '16:34:31', 'Canceled', 'new book', 'beminder'),
('order1467', 'vicky123kumar22@gmail.com', '1000001', 'The definite guide to netbeans 7', '1', '85', '2016-09-10', '12:24:20', 'Canceled', 'new book', 'beminder'),
('order2107', 'vicky123kumar22@gmail.com', '1000001', 'The definite guide to netbeans 7', '1', '100', '2016-09-10', '12:44:05', 'Canceled', 'new book', 'beminder'),
('order2420', 'vicky123kumar22@gmail.com', '1000004', 'netbens ide cookbook 7', '1', '600', '2016-09-10', '16:34:59', 'Completed', 'new book', 'beminder'),
('order256', 'vicky123kumar22@gmail.com', '1000003', 'Orgnisational Behaviour', '1', '270', '2016-09-10', '16:36:10', 'Canceled', 'new book', 'beminder'),
('order3336', 'vicky123kumar22@gmail.com', '3000005', 'html ad js for ios', '1', '450', '2016-09-10', '16:34:20', 'Canceled', 'new book', 'hare ram store'),
('order3646', 'vicky123kumar22@gmail.com', '1000008', 'one indian girl', '1', '450', '2016-09-10', '16:42:22', 'Active', 'new book', 'beminder'),
('order4060', 'vicky123kumar22@gmail.com', '1000007', 'html xhtml tutoril', '1', '145', '2016-09-10', '16:35:16', 'Active', 'new book', 'beminder'),
('order4530', 'vicky123kumar22@gmail.com', '3000001', 'head first html', '1', '160', '2016-09-10', '12:44:43', 'Active', 'new book', 'hare ram store'),
('order4597', 'vicky123kumar22@gmail.com', '1000013', 'hemingway', '10', '108', '2016-09-11', '03:07:49', 'Active', 'new book', 'beminder'),
('order4875', 'vicky123kumar22@gmail.com', '1000002', 'microsoft ASP  MVC', '1', '52', '2016-09-10', '12:44:09', 'Active', 'new book', 'beminder'),
('order5690', 'vicky123kumar22@gmail.com', '1000013', 'hemingway', '1', '12', '2016-09-10', '16:36:02', 'Active', 'new book', 'beminder'),
('order5933', 'vicky123kumar22@gmail.com', '1000005', 'a big book of windows hack', '1', '500', '2016-09-10', '16:35:14', 'Active', 'new book', 'beminder'),
('order682', 'vicky123kumar22@gmail.com', '1000003', 'Orgnisational Behaviour', '20', '5000', '2016-09-11', '03:08:21', 'Active', 'rent', 'beminder'),
('order7443', 'vicky123kumar22@gmail.com', '1000011', 'complete atlas of the world', '1', '1000', '2016-09-10', '16:35:10', 'Canceled', 'new book', 'beminder');

CREATE TABLE `sbooks` (
   `id` bigint(100) not null auto_increment,
   `title` varchar(200) not null,
   `author` varchar(100) not null,
   `publisher` varchar(100) not null,
   `dess` varchar(400) not null,
   `image` varchar(200) not null,
   `amount` bigint(10) not null,
   `price` bigint(10) not null,
   `rent` bigint(10) not null,
   `sprice` bigint(10) not null,
   `erent` bigint(10) not null,
   `discount` bigint(5) not null,
   `ISBN1` varchar(40) not null,
   `ISBN2` varchar(40),
   `type` varchar(50) not null,
   `subtype` varchar(50),
   `lasttype` varchar(40),
   `dates` date not null,
   `uploader` varchar(20) not null,
   `skeys` varchar(1000),
   PRIMARY KEY (`id`),
   UNIQUE KEY (`title`),
   UNIQUE KEY (`image`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=3000007;

INSERT INTO `sbooks` (`id`, `title`, `author`, `publisher`, `dess`, `image`, `amount`, `price`, `rent`, `sprice`, `erent`, `discount`, `ISBN1`, `ISBN2`, `type`, `subtype`, `lasttype`, `dates`, `uploader`, `skeys`) VALUES 
('3000001', 'head first html', 'elisabath', 'oriley', ' a html next book  ', 'book14.PNG', '20', '200', '121', '1422', '545', '20', '12345678 ', '564212 ', 'e', 'cse', '', '2016-09-10', 'hare ram store', ' computer science  engineering'),
('3000002', 'the love that feels right', 'unknown', 'unknown', ' the desciprion of a love that feels right', '51Uo7eijT9L._SL500_SR88,135_.jpg', '7', '400', '250', '200', '120', '10', '141424242', '42522442', 'lt', 'str', 'English', '2016-09-06', 'hare ram store', ' computer science  engineering'),
('3000003', 'Professional node js', 'pedro teixeira', 'wrox', 'a node book for javascript developer ', 'book9.PNG', '0', '500', '250', '200', '100', '10', '12125636115', '1254566212', 'e', 'cse', 'English', '2016-09-06', 'hare ram store', ' computer science  engineering'),
('3000004', 'windows app development', 'roberto brunetti', 'microsoft', 'a win apps book ', 'book12.PNG', '0', '4000', '2000', '2500', '1000', '20', '1234563254', '22985441', 'e', 'cse', 'English', '2016-09-06', 'hare ram store', ' computer science  engineering'),
('3000005', 'html ad js for ios', 'scott preston', 'apress', 'a ios html and javascript book ', 'book11.PNG', '5', '500', '215', '125', '211', '10', '12145212', '54556', 'e', 'cse', 'English', '2016-09-06', 'hare ram store', ' computer science  engineering'),
('3000006', 'calculas for computer graphics', 'jhon vince', 'springer', 'a book for graphics designer ', 'book7.PNG', '4', '500', '240', '123', '122', '10', '7412589632', '159885', 'e', 'cse', 'English', '2016-09-06', 'hare ram store', ' computer science  engineering');

CREATE TABLE `seller` (
   `id` varchar(20) not null,
   `email` varchar(200) not null,
   `shopname` varchar(100) not null,
   PRIMARY KEY (`id`),
   UNIQUE KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `seller` (`id`, `email`, `shopname`) VALUES 
('beminder47', 'vicky123kumar22@gmail.com', 'hare ram store'),
('beminder7600', 'shippu@gmail.in', 'sds');

CREATE TABLE `shops` (
   `id` varchar(10) not null,
   `address` varchar(200) not null,
   `landmark` varchar(100),
   `city` varchar(100) not null,
   `state` varchar(100) not null,
   `zip` bigint(20) not null,
   `shop_phone` bigint(15),
   `shop_email` varchar(200),
   UNIQUE KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `shops` (`id`, `address`, `landmark`, `city`, `state`, `zip`, `shop_phone`, `shop_email`) VALUES 
('beminder47', 'new vip colony', 'behind iti ', 'dhanbad', 'JHARKHAND', '826001', '7870632543', 'vicky123kumar22@yahoo.in');

CREATE TABLE `user` (
   `id` bigint(14) not null auto_increment,
   `fullname` varchar(100) not null,
   `email` varchar(100) not null,
   `password` varchar(100) not null,
   `phone` bigint(20) not null,
   `landmark` varchar(100) not null,
   `addr` varchar(200) not null,
   `city` varchar(40) not null,
   `state` varchar(40) not null,
   `zip` bigint(12) not null,
   `aupdate` date not null,
   PRIMARY KEY (`email`),
   UNIQUE KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=15;

INSERT INTO `user` (`id`, `fullname`, `email`, `password`, `phone`, `landmark`, `addr`, `city`, `state`, `zip`, `aupdate`) VALUES 
('14', 'gopu', 'gopu@gmail.com', '$2y$10$MTMyZGIwOTM5MjBhYTY0Z.T73GmtB7XP/qbOL7iYvOe59fDIwRa8a', '7412589632', 'near hanuman mndir', 'behind gaya singh litti dukan, sahid chawk', 'dhanbad', 'JHARKHAND', '826001', '2016-09-08'),
('3', 'shippu ranjan', 'shippu@gmail.in', '$2y$10$MTUwNGQ0NWIwNGVkNzBkN.ZeyNcFYB6o/c9IwHU.qlV1QNjY8Yfwi', '9471191827', 'behind itit', 'sabka lo mer', 'barak', 'ASSAM', '14785', '2016-08-29'),
('5', 'vicky kumar', 'vicky123kumar22@gmail.com', '$2y$10$NjI2MjRlZjlmNmQ1NTUxOO.4F6HhoM264l0peazwdCfn1jFj9PhZW', '7870632543', 'near talab', 'new vip colony, polytechnic road', 'dhanbad', 'BIHAR', '826001', '2016-08-29');

CREATE TABLE `userebook` (
   `enroll_id` varchar(100) not null,
   `ebook_id` varchar(20) not null,
   `email_id` varchar(200),
   UNIQUE KEY (`enroll_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `userebook` (`enroll_id`, `ebook_id`, `email_id`) VALUES 
('sdsdsds', '3000001', 'vicky123kumar22@gmail.com'),
('sedd', '1000005', 'vicky123kumar22@gmail.com');