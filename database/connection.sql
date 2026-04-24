CREATE DATABASE blog_websites;
USE blog_websites;

CREATE TABLE `category`(
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `category_name` VARCHAR(200) NOT NULL 
 ) AUTO_INCREMENT = 1;

CREATE TABLE `posts`(
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(100) NOT NULL,
    `description` VARCHAR(6000) NOT NULL,
    `category_id` INT NOT NULL,
    `status` VARCHAR(20) NOT NULL,
    `author_id` INT NOT NULL,
    `date` VARCHAR(11) NOT NULL,
    `post_img` VARCHAR(50) NOT NULL 
) AUTO_INCREMENT = 1;

CREATE TABLE `users`(
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `first_name` VARCHAR(200) NOT NULL,
    `last_name` VARCHAR(200) NOT NULL,
    `username` VARCHAR(200) NOT NULL,
    `password` VARCHAR(200) NOT NULL,
    `email` VARCHAR(200) NOT NULL,
    `role` VARCHAR(200) NOT NULL,
    `first_letter` VARCHAR(200) NOT NULL,
    `profile_img` VARCHAR(200) NOT NULL
) AUTO_INCREMENT = 1;

CREATE TABLE `setting`(
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `website_name` VARCHAR(200) NOT NULL,
    `sub_description` VARCHAR(500) NOT NULL, 
    `f_description` VARCHAR(500) NOT NULL, 
    `logo` VARCHAR(500) NOT NULL, 
) AUTO_INCREMENT = 1;