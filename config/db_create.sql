-- To get started run the following SQL commands:

drop database if exists php_blog;
create database php_blog;
use php_blog;


CREATE TABLE posts (
  id INT NOT NULL AUTO_INCREMENT,
  title VARCHAR(255) NOT NULL, 
  author VARCHAR(255) NOT NULL, 
  content LONGTEXT NOT NULL, 
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, 
  PRIMARY KEY (id)
) ENGINE=InnoDB CHARSET=utf8;
