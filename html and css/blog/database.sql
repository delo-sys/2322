CREATE DATABASE IF NOT EXISTS blog_db;
USE blog_db;

CREATE TABLE users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE ,
    email VARCHAR(200) NOT  NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin','author', 'user') DEFAULT 'user',
    create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE categories(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    slug VARCHAR(50) NOT NULL UNIQUE
);

CREATE TABLE posts(
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50) NOT NULL,
    content TEXT NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,
    user_id INT NOT NULL,
    category_id INT ,
    create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    update_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE CASCADE,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL
);

CREATE TABLE comment(
    id INT AUTO_INCREMENT PRIMARY KEY,
    content TEXT NOT NULL, 
    post_id INT  NOT NULL,
    user_id INT NOT NULL,
    create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (post_id) REFERENCES posts(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE,  
);

--Insert some initial data
INSERT INTO categories (name,slug) VALUES
('Technology','technology'),
('Travel','travel'), 
('Food','food') ,
('Lifestyle','lifestyle'); 
