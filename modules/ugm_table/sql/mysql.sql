CREATE TABLE ugm_table_column (
  `sn` int(10) unsigned NOT NULL auto_increment,
  `main_sn` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL default '' comment '標題',
  `enable` enum('1','0') NOT NULL default '1' comment '狀態',
  `sort` int(10) unsigned NOT NULL comment '排序',
  PRIMARY KEY  (`sn`)
);


CREATE TABLE ugm_table_main (
  `sn` int(10) unsigned NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '' comment '標題',
  `enable` enum('1','0') NOT NULL default '1' comment '狀態',
  `sort` int(10) unsigned NOT NULL comment '排序',
  `order` enum('1','0') NOT NULL default '1' comment '排序方序',
  `page_count` smallint(5) unsigned NOT NULL comment '每頁筆數',
  `date` int(10) unsigned NOT NULL comment '日期',
  `counter` smallint(5) unsigned NOT NULL comment '人氣',
  PRIMARY KEY  (`sn`)
);


CREATE TABLE ugm_table_record (
  `sn` int(10) unsigned NOT NULL auto_increment,
  `main_sn` int(10) unsigned NOT NULL,
  `enable` enum('1','0') NOT NULL default '1' comment '狀態',
  `sort` int(10) unsigned NOT NULL comment '排序',
  PRIMARY KEY  (`sn`)
);


CREATE TABLE ugm_table_value (
  `sn` int(10) unsigned NOT NULL auto_increment,
  `column_sn` int(10) unsigned NOT NULL,
  `record_sn` int(10) unsigned NOT NULL,
  `value` varchar(255) NOT NULL default '' comment '值',
  PRIMARY KEY  (`sn`)
);


