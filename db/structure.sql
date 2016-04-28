drop table if exists t_comments;
drop table if exists t_users;
drop table if exists t_hotels;


create table t_hotels (
  hot_id integer not null primary key auto_increment,
  hot_name varchar(100) not null,
  hot_address varchar(500) not null,
  hot_class integer not null
) engine=innodb character set utf8 collate utf8_unicode_ci;

create table t_users (
    usr_id integer not null primary key auto_increment,
    usr_name varchar(50) not null,
    usr_password varchar(88) not null,
    usr_salt varchar(23) not null,
    usr_role varchar(50) not null
) engine=innodb character set utf8 collate utf8_unicode_ci;

create table t_comments (
  com_id integer not null primary key auto_increment,
  com_content varchar(500) not null,
  hot_id integer not null,
  usr_id integer not null,
  constraint fk_com_hot foreign key(hot_id) references t_hotels(hot_id),
  constraint fk_com_usr foreign key(usr_id) references t_users(usr_id)
) engine=innodb character set utf8 collate utf8_unicode_ci;
