
DROP DATABASE TEMP_DB_NAME;

CREATE DATABASE TEMP_DB_NAME CHARACTER SET = utf8 COLLATE utf8_general_ci;
SET collation_connection = 'utf8_general_ci';
SET default_collation_for_utf8mb4 = 'utf8mb4_general_ci';
SET collation_server = 'utf8_general_ci';
SET collation_database = 'utf8_general_ci';
SET NAMES utf8;

GRANT ALL PRIVILEGES ON TEMP_DB_NAME.* TO 'TEMP_DB_USER'@'%';





USE TEMP_DB_NAME;

CREATE TABLE IF NOT EXISTS messages (
    message_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(100) NOT NULL,
    brief_content TEXT NOT NULL,
    full_content TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS comments (
    comment_id INT AUTO_INCREMENT PRIMARY KEY,
    message_id INT,
    author VARCHAR(100) NOT NULL,
    comment_text TEXT NOT NULL,
    FOREIGN KEY (message_id) REFERENCES messages(message_id) ON DELETE CASCADE
);

INSERT INTO messages (title, author, brief_content, full_content) 
VALUES 
('Привет, мир!', 'user1', 'Краткое содержание первого сообщения', 'Полное содержание первого сообщения'),
('Второе сообщение', 'user2', 'Краткое содержание второго сообщения', 'Полное содержание второго сообщения');

INSERT INTO comments (message_id, author, comment_text) 
VALUES 
(1, 'user3', 'Комментарий к первому сообщению'),
(1, 'user4', 'Еще один комментарий к первому сообщению');



