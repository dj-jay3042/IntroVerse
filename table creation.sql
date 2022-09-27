/*User Table*/
-- Create table
create table tblUser
(
    user_id int primary key AUTO_INCREMENT,
    login_id varchar(50) not null unique,
    password varchar(70) not null,
    first_name varchar(50) not null,
    last_name varchar(50) not null,
    email varchar(100) not null,
    contact_no varchar(10) not null,
    date_of_birth date not null,
    gender varchar(6) not null,
    user_type int not null,
    FOREIGN KEY (user_type) REFERENCES tblSubscription(s_id),
    flat_no varchar(10) not null,
    building_name varchar(100) not null,
    area_name varchar(100) not null,
    pincode int not null,
    FOREIGN KEY (pincode) REFERENCES tblPincode(pincode),
    created_date date not null,
    is_deleted tinyint(1) not null default 1,
    updated_date date
);
-- Insert Into Table
Insert Into tblUser (login_id, password, first_name, last_name, email, contact_no, date_of_birth, gender, user_type, flat_no, building_name, area_name, pincode, created_date) values ('DJJay3042@', '$2y$10$7jX4q0rEOhLZ7y0uwMDMluA/wiIdLLeoE6YyWd0n5fsQ7Ak5vvR7m', 'Jay', 'Chauhan', 'cjay3042002@gmail.com', '9313440532', '2002-04-30', 'Male', 1, '1', 'Global Residency', 'Adajan', 395009, '2022-09-19');

ALTER TABLE tblUser CHANGE COLUMN is_deleted is_deleted tinyint(1) NOT NULL DEFAULT 0;


-- Table
+---------+----------+--------------------------------------------------------------+------------+-----------+-----------------------+------------+---------------+--------+-----------+---------+------------------+-----------+---------+--------------+------------+--------------+
| user_id | login_id | password                                                     | first_name | last_name | email                 | contact_no | date_of_birth | gender | user_type | flat_no | building_name    | area_name | pincode | created_date | is_deleted | updated_date |
+---------+----------+--------------------------------------------------------------+------------+-----------+-----------------------+------------+---------------+--------+-----------+---------+------------------+-----------+---------+--------------+------------+--------------+
|       1 | admin    | $2y$10$7jX4q0rEOhLZ7y0uwMDMluA/wiIdLLeoE6YyWd0n5fsQ7Ak5vvR7m | Jay        | Chauhan   | cjay3042002@gmail.com | 9313440532 | 2002-04-30    | Male   |         1 | 1       | Global Residency | Adajan    |  395009 | 2022-09-19   |          1 | NULL         |
+---------+----------+--------------------------------------------------------------+------------+-----------+-----------------------+------------+---------------+--------+-----------+---------+------------------+-----------+---------+--------------+------------+--------------+

/*Subscription Table*/
-- Create table
create table tblSubscription
(
    s_id int primary key AUTO_INCREMENT,
    s_type varchar(10) not null,
    s_price decimal(10,2) not null
);
-- Insert Into Table
Insert Into tblSubscription (s_type, s_price) values ('primium', '1000.00');

/*Country Table*/
-- Create table
create table tblCountry
(
    c_id int primary key AUTO_INCREMENT,
    c_name varchar(56) not null
);
-- Insert Into Table
Insert Into tblCountry (c_name) values ('India');

/*State Table*/
-- Create table
create table tblState
(
    s_id int primary key AUTO_INCREMENT,
    c_id int not null,
    FOREIGN KEY (c_id) REFERENCES tblCountry(c_id),
    s_name varchar(100) not null
);
-- Insert Into Table
Insert Into tblState (c_id, s_name) values (1, 'Gujarat');

/*District Table*/
-- Create table
create table tblDistrict
(
    d_id int primary key AUTO_INCREMENT,
    s_id int not null,
    FOREIGN KEY (s_id) REFERENCES tblState(s_id),
    d_name varchar(100) not null
);
-- Insert Into Table
Insert Into tblDistrict (s_id, d_name) values (1, 'Surat');

/*Pincode Table*/
-- Create table
create table tblPincode
(
    pincode int primary key,
    d_id int not null,
    FOREIGN KEY (d_id) REFERENCES tblDistrict(d_id),
    taluka_name varchar(100) not null
);
-- Insert Into Table
Insert Into tblPincode (pincode, d_id, taluka_name) values (395009, 1, 'Choriyasi');


/*Song Table*/
-- Create table
create table tblSong
(
    s_id int primary key AUTO_INCREMENT,
    s_title varchar(100) not null,
    s_singer varchar(500) not null,
    s_composer varchar(500) not null,
    s_location varchar(500) not null,
    upload_date date not null
);
insert into tblSong (s_title,s_singer,s_composer,s_location,upload_date) values ('Example','Example','Example','Example','2022-09-26');

/*Movie Table*/
-- Create table
create table tblMovie
(
    m_id int primary key AUTO_INCREMENT,
    m_title varchar(100) not null,
    m_actor varchar(500) not null,
    m_director varchar(500) not null,
    m_location varchar(500) not null,
    upload_date date not null
);
insert into tblMovie (m_title,m_actor,m_director,m_location,upload_date) values ('Example_Movie','Example_Movie','Example_Movie','Example_Movie','2022-09-26');


/*Book Table*/
-- Create table
create table tblBook
(
    b_id int primary key AUTO_INCREMENT,
    b_title varchar(100) not null,
    b_author varchar(500) not null,
    b_publisher varchar(500) not null,
    b_location varchar(500) not null,
    upload_date date not null
);
insert into tblBook (b_title,b_author,b_publisher,b_location,upload_date) values ('Example_Book','Example_Book','Example_Book','Example_Book','2022-09-26');


/*Book Table*/
-- Create table
create table tblGenre
(
    g_id int primary key AUTO_INCREMENT,
    g_title varchar(100) not null,
    g_type varchar(10) not null
);
insert into tblGenre (g_title,g_type) values ('Blues Music','song');
insert into tblGenre (g_title,g_type) values ('Jazz Music','song');
insert into tblGenre (g_title,g_type) values ('Rhythm and Blues Music','song'); 
insert into tblGenre (g_title,g_type) values ('Rock and Roll Music','song');
insert into tblGenre (g_title,g_type) values ('Rock Music','song');
insert into tblGenre (g_title,g_type) values ('Country Music','song');
insert into tblGenre (g_title,g_type) values ('Soul Music','song');
insert into tblGenre (g_title,g_type) values ('Dance Music','song');
insert into tblGenre (g_title,g_type) values ('Action','movie');
insert into tblGenre (g_title,g_type) values ('Comedy','movie');
insert into tblGenre (g_title,g_type) values ('Drama','movie');
insert into tblGenre (g_title,g_type) values ('Fantasy','movie');
insert into tblGenre (g_title,g_type) values ('Horror','movie');
insert into tblGenre (g_title,g_type) values ('Mystery','movie');
insert into tblGenre (g_title,g_type) values ('Romance','movie');
insert into tblGenre (g_title,g_type) values ('Thriller','movie');
insert into tblGenre (g_title,g_type) values ('Classics','book');
insert into tblGenre (g_title,g_type) values ('Tragedy','book');
insert into tblGenre (g_title,g_type) values ('Sci-Fi','book');
insert into tblGenre (g_title,g_type) values ('Fantasy','book');
insert into tblGenre (g_title,g_type) values ('Action and Adventure','book');
insert into tblGenre (g_title,g_type) values ('Crime and Mystery','book');
insert into tblGenre (g_title,g_type) values ('Romance','book');
insert into tblGenre (g_title,g_type) values ('Humor and Satire','book');