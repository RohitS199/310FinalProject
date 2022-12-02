DROP DATABASE IF EXISTS final_project;
CREATE DATABASE final_project CHARSET utf8mb4;
-- drop all tables
DROP TABLE IF EXISTS `Users`;
DROP TABLE IF EXISTS `Professors`;
DROP TABLE IF EXISTS `Comment`;
DROP TABLE IF EXISTS `Class`;
DROP TABLE IF EXISTS `Course`;

USE final_project;
CREATE TABLE Users (
    user_id    		int      			not null primary key auto_increment,
    firstName		varchar(256)	    not null,
    email 	        varchar(256)       	null,
    lastName		varchar(256)	    not null,
    phone_number    varchar(256)	    null,
    gradYear        int					null,
    major           varchar(256)	    null,
    classifications varchar(256)	    null,
    password        varchar(256)	    not null,
    userType        varchar(256)	    not null,
    userName        varchar(256)	    not null UNIQUE,
);

create table Professor (
    professor_id    int      			not null primary key auto_increment,
    firstName		varchar(256)	    not null,
    email 	        varchar(256)       	null,
    lastName		varchar(256)	    not null,
    phone_number    varchar(256)	    null,
    password        varchar(256)	    not null,
    officeLocation  varchar(256)        null,
    yearsatSchool   int                 null
);

create table Class (
    class_id        int                 not null primary key auto_increment,
    course_name     varchar(256)        not null,
    professor_id    int                 not null,
    course_description varchar(256)      not null,
    FOREIGN KEY (professor_id) REFERENCES Professor(professor_id)
);

create table Comment(
    comment_id      int                 not null primary key auto_increment,
    user_id         int                 not null,
    course_name     varchar(256)        not null,
    class_id        int                 not null,
    letterGrade     varchar(1)          not null,
    comment         varchar(256)        not null,
    professor_id    int                 not null,
    FOREIGN KEY (user_id) REFERENCES Users(user_id),
    FOREIGN KEY (class_id) REFERENCES Class(class_id),
    FOREIGN KEY (professor_id) REFERENCES Professor(professor_id)
);

create table Course (
    couse_id       int                 not null primary key auto_increment,
    crn            int                 not null,
    class_id       int                 not null,
    professor_id   int                 not null,
    FOREIGN KEY (professor_id) REFERENCES Professor(professor_id),
    FOREIGN KEY (class_id) REFERENCES Class(class_id)
);


-- add a new column to the user table called userName and make it unique
ALTER TABLE Users ADD COLUMN userName varchar(256) not null UNIQUE;

-- add a new column to comment called professor_id and make it a foreign key
ALTER TABLE Comment ADD COLUMN professor_id int not null;
ALTER TABLE Comment ADD FOREIGN KEY (professor_id) REFERENCES Professor(professor_id);