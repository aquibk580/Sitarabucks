create database sitarabucks;
use sitarabucks;
create table orders(
order_no int primary key auto_increment,
phone varchar(50)
);
 
create table order_items(
id int primary key auto_increment,
order_no int,
pname varchar(50),
place enum('dineIn','takeAway') default 'dineIn',
qty int,
amount int,
Foreign key (order_no) references orders(order_no)
); 

ALTER TABLE orders AUTO_INCREMENT = 23145;  

drop table order_items;
drop table orders;

truncate table orders;
truncate table order_items;
 
 select * from orders;
 select * from order_items;
 

 