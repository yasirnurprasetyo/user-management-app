create table users(
    id int not null primary key auto_increment,
    name varchar(50) not null,
    email varchar(50) not null,
    password varchar(50) not null,
    gender enum('L','P'),
    phone varchar(13),
    no_ktp int(16) not null,
    date_birth datetime,
    photo varchar(200),
    is_active enum("1","0") not null default "1",
    role enum("admin","user") not null,
    created_at datetime not null default current_timestamp,
    updated_at datetime default null,
    unique(email),
    unique(no_ktp)
);