\c mysql
DROP DATABASE TEMP_DB_NAME;

CREATE DATABASE TEMP_DB_NAME WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'en_US.UTF-8';
GRANT ALL PRIVILEGES ON DATABASE TEMP_DB_NAME TO TEMP_DB_USER;
ALTER DATABASE TEMP_DB_NAME OWNER TO TEMP_DB_USER;

CREATE TABLE messages (
    message_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(100) NOT NULL,
    brief_content TEXT NOT NULL,
    full_content TEXT NOT NULL
);

CREATE TABLE comments (
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


\connect TEMP_DB_NAME

