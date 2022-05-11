

create table contact(
	fullname varchar(255) not null,
    email varchar(255) not null,
    message varchar(400) not null,
	CONSTRAINT contact CHECK (email like '%@gmail.com')
);
create table appointment(
	fullname varchar(255) not null,
    email varchar(255) not null,
    phoneNumber char(20) ,
    appointment_at datetime not null,
    message varchar(400) ,
    CONSTRAINT appointment CHECK (email like '%@gmail.com')
);

insert into contact values('sadfasdf','sadgadsg@gmail.com','adsgdfg');
insert into appointment values('trung','phung@gmail.com',NULL,'2021-06-14 14:00:05',NULL);