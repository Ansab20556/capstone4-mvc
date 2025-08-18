-- Database: capstone4_mvc
CREATE DATABASE IF NOT EXISTS capstone4_mvc CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE capstone4_mvc;

CREATE TABLE IF NOT EXISTS users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(150) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    role ENUM('admin','staff','volunteer','donor') NOT NULL DEFAULT 'volunteer',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- password hash for '123456' (bcrypt)
INSERT INTO users (email, password_hash, role)
VALUES
('admin@example.com', '$2y$10$QPKbqv7O9lTnP9oVwRr3Ou2YwR9yZg2gU9TjvX4q0vXJp8o0d0j8a', 'admin');
