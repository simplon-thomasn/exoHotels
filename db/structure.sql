drop table if exists t_comments;
drop table if exists t_hotels;

create table t_hotels (
  hot_id integer not null primary key auto_increment,
  hot_name varchar(100) not null,
  hot_address varchar(500) not null,
  hot_class integer not null
) engine=innodb character set utf8 collate utf8_unicode_ci;

create table t_comments (
  com_id integer not null primary key auto_increment,
  com_author varchar(100) not null,
  com_content varchar(500) not null,
  hot_id integer not null,
  constraint fk_com_hot foreign key(hot_id) references t_hotels(hot_id)
) engine=innodb character set utf8 collate utf8_unicode_ci;
