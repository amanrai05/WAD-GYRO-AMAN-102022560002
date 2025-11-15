-- SQL initial script to create database and sample data
CREATE DATABASE IF NOT EXISTS perpustakaan_ead;
USE perpustakaan_ead;

CREATE TABLE IF NOT EXISTS categories (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS books (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  author VARCHAR(255),
  year INT,
  category_id INT,
  FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL
);

INSERT INTO categories (name) VALUES ('Teknologi'), ('Sastra'), ('Sejarah'), ('Anak');
INSERT INTO books (title, author, year, category_id) VALUES 
('Belajar PHP','A. Programmer',2020,1),
('Cerita Rakyat','Various',2015,3);
