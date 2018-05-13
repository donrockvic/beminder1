--
-- MySQL 5.6.17
-- Mon, 12 Sep 2016 07:38:49 +0000
--

CREATE DATABASE `beminder` DEFAULT CHARSET latin1;

USE `beminder`;

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


CREATE TABLE `comments` (
   `id` bigint(10) not null auto_increment,
   `productid` bigint(20) not null,
   `name` varchar(100) not null,
   `comment` varchar(500) not null,
   UNIQUE KEY (`id`),
   KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=18;


CREATE TABLE `ebook` (
   `id` bigint(10) not null auto_increment,
   `book_id` varchar(10) not null,
   `name` varchar(200) not null,
   PRIMARY KEY (`book_id`),
   UNIQUE KEY (`id`),
   UNIQUE KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=4;


CREATE TABLE `feedback` (
   `id` bigint(10) not null auto_increment,
   `name` varchar(200) not null,
   `email` varchar(40) not null,
   `feedback` varchar(2000) not null,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=2;


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


CREATE TABLE `seller` (
   `id` varchar(20) not null,
   `email` varchar(200) not null,
   `shopname` varchar(100) not null,
   PRIMARY KEY (`id`),
   UNIQUE KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


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


CREATE TABLE `userebook` (
   `enroll_id` varchar(100) not null,
   `ebook_id` varchar(20) not null,
   `email_id` varchar(200),
   UNIQUE KEY (`enroll_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;