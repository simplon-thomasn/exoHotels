drop table if exists t_hotels;

create table t_hotels (
hot_id integer not null primary key auto_increment,
hot_name varchar(100) not null,
hot_address varchar(500) not null,
hot_class integer not null
) engine=innodb character set utf8 collate utf8_unicode_ci;
