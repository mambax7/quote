
#
# Structure table for `quote_quotes` (7 fields)
#

CREATE TABLE  `quote_quotes` (
`id` INT (11)  NOT NULL  AUTO_INCREMENT,
`cid` INT (8)  NOT NULL DEFAULT 0,
`quote` TEXT  NOT NULL ,
`author` VARCHAR (255)  NOT NULL ,
`online` INT (10)  NOT NULL DEFAULT 1,
`created` TIMESTAMP  NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`author_id` INT  NOT NULL ,
PRIMARY KEY (`id`)
) 
  ENGINE = MyISAM;
#
# Structure table for `quote_category` (8 fields)
#

CREATE TABLE  `quote_category` (
`id` INT (8)  NOT NULL  AUTO_INCREMENT,
`pid` INT (8)  NOT NULL DEFAULT 0,
`title` VARCHAR (255)  NOT NULL ,
`description` TEXT  NULL ,
`image` VARCHAR (255)  NULL ,
`weight` INT (5)  NOT NULL DEFAULT 0,
`color` VARCHAR (10)  NOT NULL DEFAULT '0',
`online` TINYINT (2)  NOT NULL DEFAULT 1,
PRIMARY KEY (`id`)
) 
  ENGINE = MyISAM;
#
# Structure table for `quote_authors` (6 fields)
#

CREATE TABLE  `quote_authors` (
`id` INT (8)  NOT NULL  AUTO_INCREMENT,
`name` VARCHAR (50)  NOT NULL ,
`country` VARCHAR (2)  NOT NULL ,
`bio` TEXT  NOT NULL ,
`photo` VARCHAR (50)  NOT NULL ,
`created` DATE  NOT NULL ,
PRIMARY KEY (`id`)
) 
  ENGINE = MyISAM;