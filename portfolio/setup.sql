CREATE DATABASE IF NOT EXISTS portfolio;

USE portfolio;

CREATE TABLE IF NOT EXISTS projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    image VARCHAR(255),
    link VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    message TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert sample project data
INSERT INTO projects (title, description, image, link) VALUES
('Project 1', 'A brief description of Project 1', '/placeholder.svg?height=200&width=300', '#'),
('Project 2', 'A brief description of Project 2', '/placeholder.svg?height=200&width=300', '#'),
('Project 3', 'A brief description of Project 3', '/placeholder.svg?height=200&width=300', '#');

