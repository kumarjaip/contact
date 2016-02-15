CREATE TABLE `contactus_user_level` (
  `level_id` INT(5) NOT NULL AUTO_INCREMENT,
  `level_name` VARCHAR(45) NOT NULL DEFAULT '0',
  `level_point` VARCHAR(120) NOT NULL,
  `isActive` INT(1) UNSIGNED NOT NULL DEFAULT '0',
  `createdDate` DATETIME DEFAULT NULL,
  PRIMARY KEY (`level_id`),
  KEY `level_name_idx` (`level_name`)
) ENGINE=INNODB DEFAULT CHARSET=utf8;

CREATE TABLE `contactus_user_badges` (
  `badges_id` INT(5) NOT NULL AUTO_INCREMENT,
  `badges_name` VARCHAR(45) NOT NULL DEFAULT '0',
  `level_id` INT(5) NOT NULL,
  `isActive` INT(1) UNSIGNED NOT NULL DEFAULT '0',
  `createdDate` DATETIME DEFAULT NULL,
  PRIMARY KEY (`badges_id`),
  KEY `badges_name_idx` (`badges_name`)
) ENGINE=INNODB DEFAULT CHARSET=utf8;

CREATE TABLE `contactus_user_points` (
  `cashback_id` INT(5) NOT NULL AUTO_INCREMENT,
  `user_id` VARCHAR(45) NOT NULL DEFAULT '0',
  `total_cashback_points` INT(5) NOT NULL,
  `isActive` INT(1) UNSIGNED NOT NULL DEFAULT '0',
  `updateDate` DATETIME DEFAULT NULL,
  PRIMARY KEY (`cashback_id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8;

CREATE TABLE `contactus_stores` (
  `store_id` INT(5) NOT NULL AUTO_INCREMENT,
  `store_name` VARCHAR(100) NOT NULL DEFAULT '0',
  `store_description` VARCHAR(255) NOT NULL,
  `store_url` VARCHAR(200) NOT NULL,
  `store_image` VARCHAR(200) NOT NULL,
  `store_category` INT(5) NOT NULL,
  `isActive` INT(1) UNSIGNED NOT NULL DEFAULT '0',
  `updateDate` DATETIME DEFAULT NULL,
  PRIMARY KEY (`store_id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8;

CREATE TABLE `contactus_stores_category` (
  `category_id` INT(5) NOT NULL AUTO_INCREMENT,
  `category_name` VARCHAR(100) NOT NULL DEFAULT '0',
  `category_description` VARCHAR(255) NOT NULL,
  `category_image` VARCHAR(200) NOT NULL,
  `main_category` INT(5) NOT NULL,
  `isActive` INT(1) UNSIGNED NOT NULL DEFAULT '0',
  `updateDate` DATETIME DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8;

CREATE TABLE `contactus_feature_stores` (
  `id` INT(5) NOT NULL AUTO_INCREMENT,
  `store_id` INT(5) NOT NULL DEFAULT '0',
  `isActive` INT(1) UNSIGNED NOT NULL DEFAULT '0',
  `updateDate` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8;

CREATE TABLE `contactus_cash_back_rules` (
  `rules_id` INT(5) NOT NULL AUTO_INCREMENT,
  `store_id` INT(5) NOT NULL DEFAULT '0',
  `cash_back_rules` VARCHAR(255) NOT NULL DEFAULT '0',
  `isActive` INT(1) UNSIGNED NOT NULL DEFAULT '0',
  `updateDate` DATETIME DEFAULT NULL,
  PRIMARY KEY (`rules_id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8;

CREATE TABLE `contactus_order_history` (
  `order_id` INT(5) NOT NULL AUTO_INCREMENT,
  `item_details` VARCHAR(200) NOT NULL DEFAULT '0',
  `store_details` VARCHAR(200) NOT NULL DEFAULT '0',  
  `total_cost` INT(5) NOT NULL DEFAULT '0',
  `billing_info` VARCHAR(255) NOT NULL DEFAULT '0',
  `orderDate` DATETIME DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8;

CREATE TABLE `contactus_customer_review` (
  `review_id` MEDIUMINT(8) NOT NULL AUTO_INCREMENT,
  `user_id` MEDIUMINT(8) UNSIGNED NOT NULL,
  `item_id` INT(5) NOT NULL,
  `reviews` VARCHAR (255) NOT NULL,
  `isActive` INT(1) UNSIGNED NOT NULL DEFAULT '0',
  `updateDate` DATETIME DEFAULT NULL,
  PRIMARY KEY (`review_id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8;

CREATE TABLE `contactus_admin_settings` (
  `id` INT(5) NOT NULL AUTO_INCREMENT,
  `website_title` VARCHAR(100) NULL,
  `meta_title` VARCHAR(100) NULL,
  `meta_description` VARCHAR (250) NULL,
  `meta_keywords` VARCHAR(200) NULL,
  `from_email_name` VARCHAR(100) NULL,
  `from_email_id` VARCHAR(100) NULL,
  `show_per_page` INT(3) NOT NULL DEFAULT '10',
  `updateDate` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8;

CREATE TABLE `contactus_user_cash_back` (
  `ucb_id` MEDIUMINT(8) NOT NULL AUTO_INCREMENT,
  `visit_url` VARCHAR(200) NOT NULL,
  `visit_item` INT(5) NOT NULL,
  `visit_cash_back` VARCHAR (100) NULL,
  `user_id` MEDIUMINT (8) UNSIGNED NOT NULL,
  `create_date` DATETIME DEFAULT NULL,
  PRIMARY KEY (`ucb_id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8;

ALTER TABLE `contactus_user_cash_back`
ADD CONSTRAINT FK_user_cash_back FOREIGN KEY (user_id)
    REFERENCES contactus_users(id);


ALTER TABLE `contactus_user_badges`
ADD CONSTRAINT FK_level_badges FOREIGN KEY (level_id)
    REFERENCES contactus_user_level(level_id);
    
ALTER TABLE `contactus_stores`
ADD CONSTRAINT FK_store_category FOREIGN KEY (store_category)
    REFERENCES `contactus_stores_category` (category_id);    
    
ALTER TABLE `contactus_cash_back_rules`
ADD CONSTRAINT FK_store_rules FOREIGN KEY (store_id)
    REFERENCES `contactus_stores` (store_id);
    
ALTER TABLE `contactus_order_history`
ADD CONSTRAINT FK_user_order FOREIGN KEY (user_id)
    REFERENCES `contactus_users` (id);
 
ALTER TABLE `contactus_user_points`
ADD CONSTRAINT FK_user_level FOREIGN KEY (level_id)
    REFERENCES `contactus_user_level` (level_id);
    

ALTER TABLE `contactus_sessions`
ADD CONSTRAINT FK_user_session FOREIGN KEY (user_id)
    REFERENCES `contactus_users` (id);
    
ALTER TABLE `contactus_customer_review`
ADD CONSTRAINT FK_customer_review FOREIGN KEY (user_id)
    REFERENCES `contactus_users` (id);
    
ALTER TABLE `contactus_feature_stores`
ADD CONSTRAINT FK_feature_stores FOREIGN KEY (store_id)
    REFERENCES `contactus_stores` (store_id);    