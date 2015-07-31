load data local infile `/home/wuxu/dbip-city.csv` into table ip_lookup fields terminated by `,` enclosed by`"` lines terminated by `\r\n` (@col1, @col2, @col3, @col4, @col5) set ip_start=@col1, ip_end=@col2, country=@col3, stateprov=@col4, city=@col5;

load data local infile `/home/wuxu/IP2LOCATION-LITE-DB11.CSV` into table ip_lookup_db11 fields terminated by `,` enclosed by `"` lines terminated by `\r\n` ignore 0 lines;

CREATE TABLE `ip_lookup` (
  `ipversion` enum(`4`,`6`) COLLATE utf8_bin NOT NULL DEFAULT `4`,
  `ip_start` varbinary(40) NOT NULL,
  `ip_end` varbinary(40) NOT NULL,
  `country` char(2) COLLATE utf8_bin NOT NULL,
  `stateprov` varchar(80) COLLATE utf8_bin NOT NULL,
  `city` varchar(80) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`ip_start`),
  KEY `idx_ip_start` (`ip_start`),
  KEY `idx_ip_end` (`ip_end`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

CREATE TABLE `ip_lookup_db11` (
  `ip_from` int(10) unsigned DEFAULT NULL,
  `ip_to` int(10) unsigned DEFAULT NULL,
  `country_code` char(2) COLLATE utf8_bin DEFAULT NULL,
  `country_name` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `region_name` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `city_name` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `zip_code` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `time_zone` varchar(8) COLLATE utf8_bin DEFAULT NULL,
  KEY `idx_ip_from` (`ip_from`),
  KEY `idx_ip_to` (`ip_to`),
  KEY `idx_ip_from_to` (`ip_from`,`ip_to`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

create TABLE if not exists `city_lookup` (
  `country` char(2) COLLATE utf8_bin default null,
  `city` varchar(128) COLLATE utf8_bin default null,
  `accentcity` varchar(128) COLLATE utf8_bin default null,
  `region` int(10) default null,
  `population` int(10) unsigned default null,
  `latitude` double default null,
  `longitude` double default null,
  key `city` (`city`(5)),
  key `latitude` (`latitude`),
  key `longitude` (`longitude`)
) engine=MyISAM default CHARSET=utf8 COLLATE=utf8_bin;