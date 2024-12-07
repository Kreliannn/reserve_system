create table customer(
    customer_id int primary key auto_increment,
    customer_name varchar(255),
    username varchar(255),
    password varchar(255)
)


create table reserve_drinks(
    reserve_id int primary key auto_increment,
    customer_name varchar(255),
    customer_student_id varchar(255),
    date varchar(255),
    time varchar(255),
    total int,
    status varchar(255)
);


create table reserve_drinks_items(
    id int primary key auto_increment,
    reserve_id int,
    price int,
    quantity int,
    food_name varchar(255)
)



    