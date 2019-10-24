/*
MySQL Data Transfer
Source Host: localhost
Source Database: fish-firm
Target Host: localhost
Target Database: fish-firm
Date: 12/7/2018 6:18:52 PM
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for bid_board
-- ----------------------------
DROP TABLE IF EXISTS `bid_board`;
CREATE TABLE `bid_board` (
  `bid_id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `fish_name` varchar(50) DEFAULT NULL,
  `start_date` varchar(20) DEFAULT NULL,
  `end_date` varchar(20) DEFAULT NULL,
  `start_price` int(10) DEFAULT NULL,
  `quantity` int(10) DEFAULT NULL,
  PRIMARY KEY (`bid_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for blog
-- ----------------------------
DROP TABLE IF EXISTS `blog`;
CREATE TABLE `blog` (
  `blog_id` int(10) NOT NULL AUTO_INCREMENT,
  `img` varchar(200) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` varchar(5000) DEFAULT NULL,
  PRIMARY KEY (`blog_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for buy_food
-- ----------------------------
DROP TABLE IF EXISTS `buy_food`;
CREATE TABLE `buy_food` (
  `buy_id` int(10) NOT NULL AUTO_INCREMENT,
  `food_name` varchar(50) DEFAULT NULL,
  `price` int(10) DEFAULT NULL,
  `quantity` int(10) DEFAULT NULL,
  `total_price` int(10) DEFAULT NULL,
  `in_date` varchar(20) DEFAULT NULL,
  `add_stock` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`buy_id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for comments
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `comment_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) DEFAULT NULL,
  `bid_id` int(10) DEFAULT NULL,
  `price` int(10) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  `time` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `FK_2` (`bid_id`),
  CONSTRAINT `FK_2` FOREIGN KEY (`bid_id`) REFERENCES `bid_board` (`bid_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for feed_food
-- ----------------------------
DROP TABLE IF EXISTS `feed_food`;
CREATE TABLE `feed_food` (
  `ff_id` int(10) NOT NULL AUTO_INCREMENT,
  `staff_id` int(10) DEFAULT NULL,
  `pond_id` int(10) DEFAULT NULL,
  `fdate` varchar(20) DEFAULT NULL,
  `psq` int(10) DEFAULT NULL,
  `brq` int(10) DEFAULT NULL,
  `fq` int(10) DEFAULT NULL,
  `maq` int(10) DEFAULT NULL,
  `bq` int(10) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ff_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for fish
-- ----------------------------
DROP TABLE IF EXISTS `fish`;
CREATE TABLE `fish` (
  `fish_id` int(10) NOT NULL AUTO_INCREMENT,
  `fish_name` varchar(50) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`fish_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for food
-- ----------------------------
DROP TABLE IF EXISTS `food`;
CREATE TABLE `food` (
  `food_id` int(10) NOT NULL AUTO_INCREMENT,
  `food_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`food_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for manager
-- ----------------------------
DROP TABLE IF EXISTS `manager`;
CREATE TABLE `manager` (
  `manager_id` int(10) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(50) DEFAULT NULL,
  `user_name` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phn_no` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`manager_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for manager_payment
-- ----------------------------
DROP TABLE IF EXISTS `manager_payment`;
CREATE TABLE `manager_payment` (
  `mp_id` int(10) NOT NULL AUTO_INCREMENT,
  `manager_id` int(10) DEFAULT NULL,
  `payment_date` varchar(20) DEFAULT NULL,
  `payment_month` varchar(30) DEFAULT NULL,
  `salary` int(10) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`mp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for owner
-- ----------------------------
DROP TABLE IF EXISTS `owner`;
CREATE TABLE `owner` (
  `owner_id` int(10) NOT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `img` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`owner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for pond
-- ----------------------------
DROP TABLE IF EXISTS `pond`;
CREATE TABLE `pond` (
  `pond_id` int(10) NOT NULL AUTO_INCREMENT,
  `location` varchar(100) DEFAULT NULL,
  `length` int(10) DEFAULT NULL,
  `width` int(10) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`pond_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for pond_details
-- ----------------------------
DROP TABLE IF EXISTS `pond_details`;
CREATE TABLE `pond_details` (
  `pd_id` int(10) NOT NULL AUTO_INCREMENT,
  `pond_id` int(10) DEFAULT NULL,
  `fish_name` varchar(50) DEFAULT NULL,
  `price` int(10) DEFAULT NULL,
  `quantity` int(10) DEFAULT NULL,
  `total` int(10) DEFAULT NULL,
  `season_name` varchar(50) DEFAULT NULL,
  `staff_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`pd_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for season
-- ----------------------------
DROP TABLE IF EXISTS `season`;
CREATE TABLE `season` (
  `season_id` int(10) NOT NULL AUTO_INCREMENT,
  `season_name` varchar(30) DEFAULT NULL,
  `duration` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`season_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for sell_fish
-- ----------------------------
DROP TABLE IF EXISTS `sell_fish`;
CREATE TABLE `sell_fish` (
  `sell_id` int(10) NOT NULL AUTO_INCREMENT,
  `fish_name` varchar(50) DEFAULT NULL,
  `price` int(10) DEFAULT NULL,
  `quantity` int(10) DEFAULT NULL,
  `total` int(10) DEFAULT NULL,
  `sold_to` varchar(50) DEFAULT NULL,
  `sold_by` varchar(50) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL,
  `payment_status` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`sell_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for staff
-- ----------------------------
DROP TABLE IF EXISTS `staff`;
CREATE TABLE `staff` (
  `staff_id` int(10) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(50) DEFAULT NULL,
  `user_name` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `phn_no` int(15) DEFAULT NULL,
  `nid_no` int(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`staff_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for staff_payment
-- ----------------------------
DROP TABLE IF EXISTS `staff_payment`;
CREATE TABLE `staff_payment` (
  `sp_id` int(10) NOT NULL AUTO_INCREMENT,
  `staff_id` int(10) DEFAULT NULL,
  `payment_date` varchar(20) DEFAULT NULL,
  `payment_month` varchar(30) DEFAULT NULL,
  `salary` int(10) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`sp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for stock
-- ----------------------------
DROP TABLE IF EXISTS `stock`;
CREATE TABLE `stock` (
  `stock_id` int(10) NOT NULL AUTO_INCREMENT,
  `psq` int(10) DEFAULT NULL,
  `brq` int(10) DEFAULT NULL,
  `fq` int(10) DEFAULT NULL,
  `maq` int(10) DEFAULT NULL,
  `bq` int(10) DEFAULT NULL,
  PRIMARY KEY (`stock_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `fname` varchar(30) DEFAULT NULL,
  `lname` varchar(30) DEFAULT NULL,
  `user_name` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phn_no` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `img` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `bid_board` VALUES ('9', 'Big Fish', 'Elish', '12/07/2018', '12/06/2018', '200', '50');
INSERT INTO `bid_board` VALUES ('10', 'Elish', 'Elish', '12/07/2018', '12/10/2018', '300', '25');
INSERT INTO `blog` VALUES ('9', 'upload/download.jpg', '12/07/2018', 'rayhan_mahmud', 'Big Fish', 'dfhgjdh djhgdfjg jhdfgjdhg ');
INSERT INTO `buy_food` VALUES ('41', 'Paddy shell', '100', '40', '4000', '12/06/2018', 'Done');
INSERT INTO `buy_food` VALUES ('42', 'Boil rice', '100', '20', '2000', '12/04/2018', 'Done');
INSERT INTO `buy_food` VALUES ('43', 'Flour', '200', '30', '6000', '12/06/2018', 'Done');
INSERT INTO `buy_food` VALUES ('44', 'Megavit Aqua', '200', '11', '2200', '12/03/2018', 'Done');
INSERT INTO `buy_food` VALUES ('45', 'Bargafat', '400', '15', '6000', '12/03/2018', 'Done');
INSERT INTO `comments` VALUES ('30', 'ray_han', '9', '250', '12/07/2018', '05:06:50 pm');
INSERT INTO `comments` VALUES ('31', 'lipi-hasan', '9', '300', '12/07/2018', '05:17:24 pm');
INSERT INTO `comments` VALUES ('32', 'Samir', '9', '280', '12/07/2018', '05:22:02 pm');
INSERT INTO `feed_food` VALUES ('12', '8', '13', '12/07/2018', '1', '1', '1', '1', '1', 'Done');
INSERT INTO `fish` VALUES ('5', 'Elish', 'upload/download.jpg');
INSERT INTO `manager` VALUES ('5', 'Rayhan Mahmud', 'rayhan_mahmud', '123456', 'rayhan35@diit.info', '01742857306', 'mirpur10', 'upload/154554.jpg');
INSERT INTO `owner` VALUES ('1', 'Admin', 'admin', '123456789', '../admin/upload/jnhbgv.jpg');
INSERT INTO `pond` VALUES ('13', 'east west', '250', '250', 'upload/logo.png');
INSERT INTO `pond_details` VALUES ('3', '13', 'Elish', '200', '50', '10000', 'Fall-2018', '8');
INSERT INTO `season` VALUES ('5', 'Fall-2018', 'September - December');
INSERT INTO `sell_fish` VALUES ('11', 'Elish', '300', '35', '10500', 'lipi-hasan', 'rayhan_mahmud', '12/07/2018', 'Paid');
INSERT INTO `staff` VALUES ('8', 'Lipi', 'lipi', '123456', '1742857306', '87451208', 'dhanmondi', 'images/16265399_1845568209065416_6901805655121722699_n.jpg');
INSERT INTO `staff_payment` VALUES ('4', '8', '12/07/2018', 'December', '10000', 'Confirm');
INSERT INTO `stock` VALUES ('1', '39', '19', '29', '10', '14');
INSERT INTO `user` VALUES ('3', 'Rayhan', 'Mahmud', 'ray_han', '123456', '1000157@daffodil.ac', '01742857306', 'mirpur', 'admin/upload/jnhbgv.jpg');
INSERT INTO `user` VALUES ('4', 'lipi', 'hasan', 'lipi-hasan', '123456', 'johnvi0077@gmail.com', '01742857306', 'Farmgate', 'admin/upload/16265399_1845568209065416_6901805655121722699_n.jpg');
INSERT INTO `user` VALUES ('5', 'Samir', 'Mahmud', 'Samir', '123456', '1000157@daffodil.ac', '01742857306', 'Farmgate', 'admin/upload/rr.jpg');
