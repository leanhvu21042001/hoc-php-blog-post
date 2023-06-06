CREATE DATABASE IF NOT EXISTS phpblog CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE phpblog;

CREATE TABLE IF NOT EXISTS posts (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title TEXT,
    author TEXT,
    body TEXT,
    created_at DATETIME DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;